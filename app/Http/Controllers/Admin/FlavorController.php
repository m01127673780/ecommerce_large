<?php

namespace App\Http\Controllers\Admin;
use App\Model\Flavor;
use App\DataTables\FlavorDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class FlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FlavorDatatable $flavor)
    {
       return $flavor->render('back.flavors.index',['title'=>trans('admin.flavor')]);
    }
    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }
    public function getAddEditRemoveColumnData()
    {
        // $flavor = Flavor::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);
        return Datatables::of($flavor)
            ->addColumn('action', function ($flavor) {
                return '<a href="#edit-'.$flavor->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.flavors.create',['title'=>trans('admin.create-flavor')]);

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
            'name_ar'         =>'required',
            'name_en'         =>'required',
            'color'           =>'sometimes|nullable',
            'is_public'       =>'sometimes|nullable',
            'department_id'   =>'sometimes|nullable',
            'icon'            =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
            'is_public'       =>trans('admin.is_public'),
            'department_id'       =>trans('admin.department_id'),
        ],[
        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'flavor',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Flavor::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/flavors');

    }
    public function quick_store(Request $request)
    {
        $data =$this->validate(request(),[
            'name_ar'         =>'required',
            'name_en'         =>'required',
            'color'           =>'sometimes|nullable',
            'is_public'       =>'sometimes|nullable',
            'department_id'   =>'sometimes|nullable',
            'icon'            =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
            'is_public'       =>trans('admin.is_public'),
            'department_id'       =>trans('admin.department_id'),
        ],[
        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'flavor',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Flavor::Create($data);
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

        $flavor = Flavor::find($id);
        $title = trans('admin.edit');
         return view('back.flavors.edit',compact('flavor','title'));
    }
        public function show($id)
    {
        $flavor = Flavor::find($id);
//       return dd ($flavor);
        $title = trans('admin.show');
         return view('back.flavors.show',compact('flavor','title'));
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
            'name_ar'         =>'required',
            'name_en'         =>'required',
            'color'           =>'sometimes|nullable',
            'is_public'       =>'sometimes|nullable',
            'department_id'   =>'sometimes|nullable',
            'icon'            =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
            'is_public'       =>trans('admin.is_public'),
            'department_id'       =>trans('admin.department_id'),
        ],[
        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'flavor',
                        'upload_type' =>'single',
                        'delete_file' =>Flavor::find($id)->icon,
                    ]);
                }

        Flavor::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/flavors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Flavor::find($id)->delete();
         $flavor =  Flavor::find($id);
         Storage::delete($flavor->icon);
         $flavor->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/flavors');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Flavor::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $flavor =  Flavor::find($id);
                Storage::delete($flavor->icon);
                $flavor->delete();
            }

        }/*if*/ else{
            // Flavor::find(request('item'))->delete();
                $flavor =  Flavor::find(request('item'));
                Storage::delete($flavor->icon);
                $flavor->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/flavors');
    }
}
