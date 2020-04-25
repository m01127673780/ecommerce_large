<?php

namespace App\Http\Controllers\Admin;
use App\Model\Color;
use App\DataTables\ColorDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorDatatable $color)
    {
       return $color->render('back.color.index',['title'=>trans('admin.color')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $color = Color::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($color)
            ->addColumn('action', function ($color) {
                return '<a href="#edit-'.$color->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.color.create',['title'=>trans('admin.create-color')]);

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
            'icon'            =>'sometimes|nullable|'.v_image(),

        ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
        ],[

        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'color',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Color::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/color');

    }
    public function quick_store(Request $request)
    {
        $data =$this->validate(request(),[
            'name_ar'         =>'required',
            'name_en'         =>'required',
            'color'           =>'sometimes|nullable',
            'icon'            =>'sometimes|nullable|'.v_image(),
        ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
        ],[

        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'color',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Color::Create($data);
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

        $color = Color::find($id);
        $title = trans('admin.edit');
         return view('back.color.edit',compact('color','title'));
    }
        public function show($id)
    {
        $color = Color::find($id);
//       return dd ($color);
        $title = trans('admin.show');
         return view('back.color.edit',compact('color','title'));
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
            'icon'            =>'sometimes|nullable|'.v_image(),

         ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'icon'            =>trans('admin.icon'),
            'color'           =>trans('admin.color'),
        ],[

        ]);
        if(request()->hasFile('icon')){
                    $data['icon']  = Up()->Upload([
                        'file'        =>'icon',
                        'path'        =>'color',
                        'upload_type' =>'single',
                        'delete_file' =>Color::find($id)->icon,
                    ]);
                }

        Color::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Color::find($id)->delete();
         $color =  Color::find($id);
         Storage::delete($color->icon);
         $color->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/color');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Color::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $color =  Color::find($id);
                Storage::delete($color->icon);
                $color->delete();
            }

        }/*if*/ else{
            // Color::find(request('item'))->delete();
              $color =  Color::find(request('item'));
                Storage::delete($color->icon);
                $color->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/color');
    }
}
