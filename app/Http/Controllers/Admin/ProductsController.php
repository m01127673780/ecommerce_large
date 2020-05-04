<?php

namespace App\Http\Controllers\Admin;
use App\Model\OtherData;
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
            $sizes = Size::Where('is_public','yes')
                ->WhereIn('department_id', $dep_list)
                ->orWhere('department_id',request('dep_id'))
                ->pluck('name_' . session('lang'), 'id');

           // $sizes = array_merge(json_decode($size_1,true),json_decode($size_2,true));
            // return  $sizes ;
            $weights = Weight::pluck('name_'.session('lang'), 'id');
            return view('back.products.ajax.size_weight', [
                'sizes'=> $sizes,
                'weights' => $weights,
                'products' => Product::find(request('product_id')),
            ])->render();
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

    public function update($id)
    {
             $data =$this->validate(request(),[

                 'product_name_ar'          =>'required',
                 'product_name_en'          =>'required',
                 'description_ar'           =>'required',
                 'description_en'           =>'required',
                 'department_id'            =>'sometimes|nullable',
                 'add_by_ar'                =>'sometimes|nullable',
                 'add_by_en'                =>'sometimes|nullable',
                 'discount'                 =>'sometimes|nullable',
                 'price_offer'              =>'sometimes|nullable',
                 'price_old'                =>'sometimes|nullable',
                 'add_by_photo'             =>'sometimes|nullable|'.v_image(),
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
                  'other_data'               =>'sometimes|nullable',
                 'weight'                   =>'sometimes|nullable',
                 'weight_id'                =>'sometimes|nullable',
                 'status'                   =>'sometimes|nullable|in:pending,refused,active',
                 'reason'                   =>'sometimes|nullable',

                 'price'                    =>'required',
                 'stock'                    =>'required',
         ],[],[
         ]);
        if(request()->has('input_value') && request()->has('input_key'))
        {
            $i = 0;
            $other_data = '';
            OtherData::where('product_id',$id)->delete();
            foreach (request('input_key') as $key) {
                $data_value = !empty(request('input_value')[$i])?request('input_value')[$i]:'';
                OtherData::create([
                    'product_id'                 =>$id,
                    'data_key'                  =>$key,
                    'data_value'                =>$data_value,
                ]);
                 $i++;
            }
            $data['other_data']=rtrim($other_data,'|');
         }
          Product::where('id',$id)->update($data);
           return response(['status'=>true,'message'=>trans('admin.updated_record')],200);
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
         Storage::delete($products->photo);
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
                Storage::delete($products->photo);
                $products->delete();
            }

        }/*if*/ else{
               $products =  Product::find(request('item'));
                Storage::delete($products->photo);
                $products->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/products');
    }
}
