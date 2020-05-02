<?php

namespace App\Http\Controllers\Admin;
use App\Model\Product;
use App\Model\Size;
use App\Model\Weight;
use App\DataTables\ProductsDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatable $products)
    {
       return $products->render('back.products.index',['title'=>trans('admin.products')]);
    }
    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $products = Product::select(['id', 'product_name_ar', 'product_name_en', 'description_ar', 'description_en']);

        return Datatables::of($products)
            ->addColumn('action', function ($products) {
                return '<a href="#edit-'.$products->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products =  Product::create([
        'product_name_ar'=>'',
         ]);

        if(!empty($products))
        {

            return redirect(aurl('products/'.$products->id.'/edit'));
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =$this->validate(request(),[
            'product_name_ar'          =>'required',
            'product_name_en'          =>'required',
            'description_ar'           =>'required',
            'description_en'           =>'required',
            'department_id'            =>'required',
            'add_by_ar'                =>'sometimes|nullable',
            'add_by_en'                =>'sometimes|nullable',
            'discount'                 =>'sometimes|nullable',
            'price_offer'              =>'sometimes|nullable',
            'price_old'                =>'sometimes|nullable',
            'price'                    =>'sometimes|nullable',
            'add_by_photo'             =>'sometimes|nullable|'.v_image(),
            'photo'                    =>'required|'.v_image(),


         ],[
            'product_name_ar'          =>trans('admin.product_name_ar'),
            'product_name_en'          =>trans('admin.product_name_en'),
            'description_ar'           =>trans('admin.description_ar'),
            'description_en'           =>trans('admin.description_en'),
            'department_id'            =>trans('admin.department_id'),
            'add_by_ar'                =>trans('admin.add_by_ar'),
            'add_by_en'                =>trans('admin.add_by_en'),
            'add_by_photo'             =>trans('admin.add_by_photo'),
            'discount'                 =>trans('admin.discount'),
            'price_offer'              =>trans('admin.price_offer'),
            'price_old'                =>trans('admin.price_old'),
            'price'                    =>trans('admin.price'),
            'photo'                    =>trans('admin.photo'),

        ],[

        ]);
        if(request()->hasFile('photo')){
                        $data['photo']    = Up()->Upload([
                        'file'            =>'photo',
                        'path'            =>'products',
                        'upload_type'     =>'single',
                        'delete_file'     =>'',
                     ]);
                }
                  if(request()->hasFile('add_by_photo')){
                        $data['add_by_photo']  = Up()->Upload([
                        'file'                 =>'add_by_photo',
                        'path'                 =>'products',
                        'upload_type'          =>'single',
                        'delete_file'          =>'',
                     ]);
                }
        Product::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/products');

    }


    public function edit($id)
    {
         $products = Product::find($id);
         return view('back.products.product',['title'=>trans('admin.create_or_edit_product'),'products'=>$products]);
    }
        public function show($id)
    {
        $products = Product::find($id);
       return dd ($products);
        $title = trans('admin.show');
         return view('back.products.edit',compact('products','title'));
    }

//prepare_wight_size
    public function prepare_wight_size()
    {
        if(request()->ajax() and request()->has('dep_id')){
            $dep_list = array_diff( explode(',', get_parent(request('dep_id'))), [request('dep_id')]);
            $size_1 = Size::Where('is_public','yes')->WhereIn('department_id', $dep_list)->pluck('name_' . session('lang'), 'id');
            $size_2 = Size::Where('department_id',request('dep_id'))->pluck('name_' . session('lang'), 'id');
            $sizes = array_merge(json_decode($size_1,true),json_decode($size_2,true));
// return  $sizes ;
            $weights = Weight::pluck('name_'.session('lang'), 'id');
            return view('back.products.ajax.size_weight', ['sizes'=> $sizes,'weights' => $weights])->render();
        }else{
            return trans('admin.please_choose_a_section');
        }
    }


    //-----------------------------------Upload  main img
    public function update_Product_image ($id) {
        $products = Product::where('id',$id)->update([
            'photo'=> up()->upload([
                'file'        => 'file',
                'path'        => 'products/'.$id.'/main_image',
                'upload_type' => 'single',
                'delete_file' => '',
            ]),
        ]);
        //'photo' => $products->photo
        return response(['status' => true, ], 200);
    }
    //---------------------------------------- delete main img
    public function delete_main_image($id) {
        $products = Product::find($id);
        Storage::delete($products->photo);
        $products->photo = null;
        $products->save();
        // 'id' => $fid],
        return response(['status' => true], 200);
    }
//---------------------------------------- upload
    public function upload_file($id) {
        if (request()->hasFile('file')) {
             $fid =    up()->upload([
                'file'        => 'file',
                'path'        => 'products/'.$id,
                'upload_type' => 'files',
                'file_type'   => 'product',
                'relation_id' =>  $id ,
            ]);
            return response(['status' => true, 'id' => $fid], 200);

        }
    }//End upload
//----------------------------------------  delete
    public function delete_file() {
        if (request()->has('id')) {
            up()->delete(request('id'));
        }
    }//End delete_file
//----------------------------------------

/*
   
            //--------------start virgin two
           
            'trade_id',
            'manu_id',
            'flavor_id',
            'flavor',
            'color',
            'color_id',
            'size_id',
            'size',
            'currency_id',
            'price',
            'stock',
            'start_at',
            'end_at',
            'start_offer_at',
            'end_offer_at',
            'price_offer',
            'other_data',
            'weight',
            'weight_id',
            'status',
            'reason',
*/
    public function update(Request $request, $id)
    {
             $data =$this->validate(request(),[
            'product_name_ar'          =>'required',
            'product_name_en'          =>'required',
            'description_ar'           =>'required',
            'description_en'           =>'required',
            'department_id'            =>'required',
            'add_by_ar'                =>'sometimes|nullable',
            'add_by_en'                =>'sometimes|nullable',
            'discount'                 =>'sometimes|nullable',
            'price_offer'              =>'sometimes|nullable',
            'price_old'                =>'sometimes|nullable',
            'price'                    =>'sometimes|nullable',
            'add_by_photo'             =>'sometimes|nullable|'.v_image(),
            'photo'                    =>'required|'.v_image(),
            // ----------
            'trade_id'                 =>'sometimes|nullable',
            'manu_id'                  =>'sometimes|nullable',
            'flavor_id'                =>'sometimes|nullable',
            'flavor'                   =>'sometimes|nullable',
            'color'                    =>'sometimes|nullable',
            'color_id'                 =>'sometimes|nullable',
            'size_id'                  =>'sometimes|nullable',
            'size'                     =>'sometimes|nullable',
            'currency_id'              =>'sometimes|nullable',
            'start_at'                 =>'sometimes|nullable|date',
            'end_at'                   =>'sometimes|nullable|date',
            'start_offer_at'           =>'sometimes|nullable|date',
            'end_offer_at'             =>'sometimes|nullable|date',
            'price_offer'              =>'sometimes|nullable',
            'other_data'               =>'sometimes|nullable',
            'weight'                   =>'sometimes|nullable',
            'weight_id'                =>'sometimes|nullable',
            'status'                   =>'sometimes|nullable|in:pending,refused,active',
            'reason'                   =>'sometimes|nullable',

            'price'                    =>'required',
            'stock'                    =>'required',

         ],[
            'product_name_ar'          =>trans('admin.product_name_ar'),
            'product_name_en'          =>trans('admin.product_name_en'),
            'description_ar'           =>trans('admin.description_ar'),
            'description_en'           =>trans('admin.description_en'),
            'department_id'            =>trans('admin.department_id'),
            'add_by_ar'                =>trans('admin.add_by_ar'),
            'add_by_en'                =>trans('admin.add_by_en'),
            'add_by_photo'             =>trans('admin.add_by_photo'),
            'discount'                 =>trans('admin.discount'),
            'price_offer'              =>trans('admin.price_offer'),
            'price_old'                =>trans('admin.price_old'),
            'price'                    =>trans('admin.price'),
            'photo'                    =>trans('admin.photo'),
            // ----------
            'trade_id'                 =>trans('admin.trade_id'),
            'manu_id'                  =>trans('admin.manu_id'),
            'flavor_id'                =>trans('admin.flavor_id'),
            'flavor'                   =>trans('admin.flavor'),
            'color'                    =>trans('admin.color'),
            'color_id'                 =>trans('admin.color_id'),
            'size_id'                  =>trans('admin.size_id'),
            'size'                     =>trans('admin.size'),
            'currency_id'              =>trans('admin.currency_id'),
            'start_at'                 =>trans('admin.start_at'),
            'end_at'                   =>trans('admin.end_at'),
            'start_offer_at'           =>trans('admin.start_offer_at'),
            'end_offer_at'             =>trans('admin.end_offer_at'),
            'price_offer'              =>trans('admin.price_offer'),
            'other_data'               =>trans('admin.other_data'),
            'weight'                   =>trans('admin.weight'),
            'weight_id'                =>trans('admin.weight_id'),
            'status'                   =>trans('admin.status'),
            'reason'                   =>trans('admin.reason'),
            'stock'                    =>trans('admin.stock'),
  


        ],[
        ]);
        if(request()->hasFile('photo')){
                        $data['photo']    = Up()->Upload([
                        'file'            =>'photo',
                        'path'            =>'products',
                        'upload_type'     =>'single',
                        'delete_file'     =>Product::find($id)->photo,
                     ]);
                }
                  if(request()->hasFile('add_by_photo')){
                        $data['add_by_photo']  = Up()->Upload([
                        'file'                 =>'add_by_photo',
                        'path'                 =>'products',
                        'upload_type'          =>'single',
                        'delete_file' =>Product::find($id)->add_by_photo,
                     ]);
                }
         Product::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/products');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $products =  Product::find($id);
         Storage::delete($products->logo);
         $products->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/products');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Product::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $products =  Product::find($id);
                Storage::delete($products->logo);
                $products->delete();
            }

        }/*if*/ else{
               $products =  Product::find(request('item'));
                Storage::delete($products->logo);
                $products->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/products');
    }
}
