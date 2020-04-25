<?php

namespace App\Http\Controllers\Admin;
use App\Model\Weight;
use App\DataTables\WeightDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WeightDatatable $weight)
    {
       return $weight->render('back.weight.index',['title'=>trans('admin.weight')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $weight = Weight::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($weight)
            ->addColumn('action', function ($weight) {
                return '<a href="#edit-'.$weight->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.weight.create',['title'=>trans('admin.create-weight')]);

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
                        'path'        =>'weight',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Weight::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/weights');

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
                        'path'        =>'weight',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Weight::Create($data);
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

        $weight = Weight::find($id);
        $title = trans('admin.edit');
         return view('back.weight.edit',compact('weight','title'));
    }
        public function show($id)
    {
        $weight = Weight::find($id);
//       return dd ($weight);
        $title = trans('admin.show');
         return view('back.weight.edit',compact('weight','title'));
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
                        'path'        =>'weight',
                        'upload_type' =>'single',
                        'delete_file' =>Weight::find($id)->icon,
                    ]);
                }

        Weight::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/weights');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Weight::find($id)->delete();
         $weight =  Weight::find($id);
         Storage::delete($weight->icon);
         $weight->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/weights');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Weight::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $weight =  Weight::find($id);
                Storage::delete($weight->icon);
                $weight->delete();
            }

        }/*if*/ else{
            // Weight::find(request('item'))->delete();
              $weight =  Weight::find(request('item'));
                Storage::delete($weight->icon);
                $weight->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/weights');
    }
}
