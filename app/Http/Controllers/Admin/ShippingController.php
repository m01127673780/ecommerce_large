<?php

namespace App\Http\Controllers\Admin;
use App\Model\Shipping;
use App\DataTables\ShippingDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ShippingDatatable $shipping)
    {
        return $shipping->render('back.shipping.index',['title'=>trans('admin.shipping')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $shipping = Shipping::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($shipping)
            ->addColumn('action', function ($shipping) {
                return '<a href="#edit-'.$shipping->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
        return view('back.shipping.create',['title'=>trans('admin.create-shipping')]);

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
            'name_ar'                 =>'required',
            'name_en'                 =>'required',
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable|numeric',
            'facebook'                =>'sometimes|nullable',
            'twitter'                 =>'sometimes|nullable',
            'website'                 =>'sometimes|nullable',
            'insta'                   =>'sometimes|nullable',
            'email'                   =>'sometimes|nullable|email',
            'contact_name'            =>'sometimes|nullable|string',
            'user_id'                 =>'sometimes|nullable|numeric',
            'lat'                     =>'sometimes|nullable',
            'lng'                     =>'sometimes|nullable',
            'address'                 =>'sometimes|nullable',
            'logo'                    =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'                 =>trans('admin.name_ar'),
            'name_en'                 =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
            'facebook'                =>trans('admin.facebook'),
            'twitter'                 =>trans('admin.twitter'),
            'website'                 =>trans('admin.website'),
            'lat'                     =>trans('admin.lat'),
            'lng'                     =>trans('admin.lng'),
            'address'                 =>trans('admin.address'),
            'insta'                   =>trans('admin.instagram'),
            'email'                   =>trans('admin.email'),
            'user_id'                   =>trans('admin.user_id'),
            'contact_name'                   =>trans('admin.email'),
        ],[
        ]);
        if(request()->hasFile('logo')){
            $data['logo']        = Up()->Upload([
                'file'        =>'logo',
                'path'        =>'shipping',
                'upload_type' =>'single',
                'delete_file' =>'',
            ]);
        }
        Shipping::Create($data);
        session()->flash('success', trans('admin.record_added') );
        return redirect('admin/shipping');

    }
    public function quick_store(Request $request)
    {
        $data =$this->validate(request(),[
            'name_ar'                 =>'required',
            'name_en'                 =>'required',
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable|numeric',
            'facebook'                =>'sometimes|nullable',
            'twitter'                 =>'sometimes|nullable',
            'website'                 =>'sometimes|nullable',
            'insta'                   =>'sometimes|nullable',
            'email'                   =>'sometimes|nullable|email',
            'contact_name'            =>'sometimes|nullable|string',
            'user_id'                 =>'sometimes|nullable|numeric',
            'lat'                     =>'sometimes|nullable',
            'lng'                     =>'sometimes|nullable',
            'address'                 =>'sometimes|nullable',
            'logo'                    =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'                 =>trans('admin.name_ar'),
            'name_en'                 =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
            'facebook'                =>trans('admin.facebook'),
            'twitter'                 =>trans('admin.twitter'),
            'website'                 =>trans('admin.website'),
            'lat'                     =>trans('admin.lat'),
            'lng'                     =>trans('admin.lng'),
            'address'                 =>trans('admin.address'),
            'insta'                   =>trans('admin.instagram'),
            'email'                   =>trans('admin.email'),
            'user_id'                   =>trans('admin.user_id'),
            'contact_name'                   =>trans('admin.email'),
        ],[
        ]);
        if(request()->hasFile('logo')){
            $data['logo']        = Up()->Upload([
                'file'        =>'logo',
                'path'        =>'shipping',
                'upload_type' =>'single',
                'delete_file' =>'',
            ]);
        }
        Shipping::Create($data);

        session()->flash('successhome', trans('admin.record_added') );
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $shipping = Shipping::find($id);
        $title = trans('admin.edit');
        return view('back.shipping.edit',compact('shipping','title'));
    }
    public function show($id)
    {
        $shipping = Shipping::find($id);
        return dd ($shipping);
        $title = trans('admin.show');
        return view('back.shipping.edit',compact('shipping','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =$this->validate(request(),[
            'name_ar'                 =>'required',
            'name_en'                 =>'required',
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable|numeric',
            'facebook'                =>'sometimes|nullable',
            'twitter'                 =>'sometimes|nullable',
            'website'                 =>'sometimes|nullable',
            'insta'                   =>'sometimes|nullable',
            'email'                   =>'sometimes|nullable|email',
            'contact_name'            =>'sometimes|nullable|string',
            'user_id'                 =>'sometimes|nullable|numeric',
            'lat'                     =>'sometimes|nullable',
            'lng'                     =>'sometimes|nullable',
            'address'                 =>'sometimes|nullable',
            'logo'                    =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'                 =>trans('admin.name_ar'),
            'name_en'                 =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
            'facebook'                =>trans('admin.facebook'),
            'twitter'                 =>trans('admin.twitter'),
            'website'                 =>trans('admin.website'),
            'lat'                     =>trans('admin.lat'),
            'lng'                     =>trans('admin.lng'),
            'address'                 =>trans('admin.address'),
            'insta'                   =>trans('admin.instagram'),
            'email'                   =>trans('admin.email'),
            'user_id'                 =>trans('admin.user_id'),
            'contact_name'            =>trans('admin.contact_name'),
        ],[
        ]);
        if(request()->hasFile('logo')){
            $data['logo']        = Up()->Upload([
                'file'        =>'logo',
                'path'        =>'shipping',
                'upload_type' =>'single',
                'delete_file' =>Shipping::find($id)->logo,
            ]);
        }

        Shipping::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/shipping');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Shipping::find($id)->delete();
        $shipping =  Shipping::find($id);
        Storage::delete($shipping->logo);
        $shipping->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/shipping');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Shipping::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $shipping =  Shipping::find($id);
                Storage::delete($shipping->logo);
                $shipping->delete();
            }

        }/*if*/ else{
            // Shipping::find(request('item'))->delete();
            $shipping =  Shipping::find(request('item'));
            Storage::delete($shipping->logo);
            $shipping->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/shipping');
    }
}
