<?php

namespace App\Http\Controllers\Admin;
use App\Model\Manufact;
use App\DataTables\ManufactDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class ManufactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManufactDatatable $manufacts)
    {
       return $manufacts->render('back.manufacts.index',['title'=>trans('admin.manufacts')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $manufacts = Manufact::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($manufacts)
            ->addColumn('action', function ($manufacts) {
                return '<a href="#edit-'.$manufacts->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.manufacts.create',['title'=>trans('admin.create-manufacts')]);

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
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'manufacts',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Manufact::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/manufacts');

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
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'manufacts',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Manufact::Create($data);

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

        $manufacts = Manufact::find($id);
        $title = trans('admin.edit');
         return view('back.manufacts.edit',compact('manufacts','title'));
    }
        public function show($id)
    {
        $manufacts = Manufact::find($id);
       return dd ($manufacts);
        $title = trans('admin.show');
         return view('back.manufacts.edit',compact('manufacts','title'));
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
        ],[
        ]);
        if(request()->hasFile('logo')){
                 $data['logo']        = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'manufacts',
                        'upload_type' =>'single',
                        'delete_file' =>Manufact::find($id)->logo,
                     ]);
                }

        Manufact::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/manufacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Manufact::find($id)->delete();
         $manufacts =  Manufact::find($id);
         Storage::delete($manufacts->logo);
         $manufacts->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/manufacts');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Manufact::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $manufacts =  Manufact::find($id);
                Storage::delete($manufacts->logo);
                $manufacts->delete();
            }

        }/*if*/ else{
            // Manufact::find(request('item'))->delete();
              $manufacts =  Manufact::find(request('item'));
                Storage::delete($manufacts->logo);
                $manufacts->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/manufacts');
    }
}
