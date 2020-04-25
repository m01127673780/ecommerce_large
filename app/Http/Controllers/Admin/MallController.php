<?php

namespace App\Http\Controllers\Admin;
use App\Model\Mall;
use App\DataTables\MallDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class MallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MallDatatable $mall)
    {
       return $mall->render('back.mall.index',['title'=>trans('admin.mall')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $mall = Mall::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($mall)
            ->addColumn('action', function ($mall) {
                return '<a href="#edit-'.$mall->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.mall.create',['title'=>trans('admin.create-mall')]);

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
            'country_id'              =>'sometimes|nullable|numeric',
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
            'country_id'              =>trans('admin.country_id'),
            'contact_name'            =>trans('admin.contact_name'),
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'mall',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Mall::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/mall');

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
            'country_id'              =>'sometimes|nullable|numeric',
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
            'country_id'              =>trans('admin.country_id'),
            'contact_name'            =>trans('admin.contact_name'),
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'mall',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Mall::Create($data);

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

        $mall = Mall::find($id);
        $title = trans('admin.edit');
         return view('back.mall.edit',compact('mall','title'));
    }
        public function show($id)
    {
        $mall = Mall::find($id);
       return dd ($mall);
        $title = trans('admin.show');
         return view('back.mall.edit',compact('mall','title'));
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
            'country_id'              =>'sometimes|nullable|numeric',
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
            'country_id'              =>trans('admin.country_id'),
            'contact_name'            =>trans('admin.contact_name'),
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'mall',
                        'upload_type' =>'single',
                        'delete_file' =>Mall::find($id)->logo,
                     ]);
                }

        Mall::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/mall');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Mall::find($id)->delete();
         $mall =  Mall::find($id);
         Storage::delete($mall->logo);
         $mall->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/mall');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Mall::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $mall =  Mall::find($id);
                Storage::delete($mall->logo);
                $mall->delete();
            }

        }/*if*/ else{
            // Mall::find(request('item'))->delete();
              $mall =  Mall::find(request('item'));
                Storage::delete($mall->logo);
                $mall->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/mall');
    }
}
