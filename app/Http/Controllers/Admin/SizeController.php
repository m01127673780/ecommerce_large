<?php

namespace App\Http\Controllers\Admin;
use App\Model\Size;
use App\DataTables\SizeDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SizeDatatable $size)
    {
       return $size->render('back.sizes.index',['title'=>trans('admin.size')]);
    }
    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }
    public function getAddEditRemoveColumnData()
    {
        // $size = Size::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);
        return Datatables::of($size)
            ->addColumn('action', function ($size) {
                return '<a href="#edit-'.$size->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.sizes.create',['title'=>trans('admin.create-size')]);

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
                        'path'        =>'size',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Size::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/sizes');

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
                        'path'        =>'size',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Size::Create($data);
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

        $size = Size::find($id);
        $title = trans('admin.edit');
         return view('back.sizes.edit',compact('size','title'));
    }
        public function show($id)
    {
        $size = Size::find($id);
//       return dd ($size);
        $title = trans('admin.show');
         return view('back.sizes.show',compact('size','title'));
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
                        'path'        =>'size',
                        'upload_type' =>'single',
                        'delete_file' =>Size::find($id)->icon,
                    ]);
                }

        Size::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/sizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Size::find($id)->delete();
         $size =  Size::find($id);
         Storage::delete($size->icon);
         $size->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/sizes');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Size::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $size =  Size::find($id);
                Storage::delete($size->icon);
                $size->delete();
            }

        }/*if*/ else{
            // Size::find(request('item'))->delete();
                $size =  Size::find(request('item'));
                Storage::delete($size->icon);
                $size->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/sizes');
    }
}
