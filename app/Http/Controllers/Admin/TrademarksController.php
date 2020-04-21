<?php

namespace App\Http\Controllers\Admin;
use App\Model\Trademark;
use App\DataTables\TrademarkDatatable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
class TrademarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TrademarkDatatable $trademarks)
    {
       return $trademarks->render('back.trademarks.index',['title'=>trans('admin.trademarks')]);
    }


    public function getAddEditRemoveColumn()
    {
        return view('datatables.eloquent.add-edit-remove-column');
    }

    public function getAddEditRemoveColumnData()
    {
        // $trademarks = Trademark::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($trademarks)
            ->addColumn('action', function ($trademarks) {
                return '<a href="#edit-'.$trademarks->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
       return view('back.trademarks.create',['title'=>trans('admin.create-trademarks')]);

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
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable',
            'logo'                  =>v_image(),

         ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
        ],[

        ]);
        if(request()->hasFile('logo')){
                    $data['logo']  = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'trademarks',
                        'upload_type' =>'single',
                        'delete_file' =>'',
                     ]);
                }
        Trademark::Create($data);
        session()->flash('success', trans('admin.record_added') );
         return redirect('admin/trademarks');

    }
    public function quick_store(Request $request)
    {
       $data =$this->validate(request(),[
            'name_ar'         =>'required',
            'name_en'         =>'required',
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable',
            'logo'                    =>v_image(),

         ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
        ],[

        ]);
        if(request()->hasFile('logo')){
                    $data['logo']  = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'trademarks',
                        'upload_type' =>'single',
                        'delete_file' =>'',

                     ]);
                }
        Trademark::Create($data);

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

        $trademarks = Trademark::find($id);
        $title = trans('admin.edit');
         return view('back.trademarks.edit',compact('trademarks','title'));
    }
        public function show($id)
    {
        $trademarks = Trademark::find($id);
       return dd ($trademarks);
        $title = trans('admin.show');
         return view('back.trademarks.edit',compact('trademarks','title'));
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
            'mob'                     =>'sometimes|nullable',
            'code'                    =>'sometimes|nullable',
            'logo'                    =>'sometimes|nullable|'.v_image(),

         ],[
            'name_ar'         =>trans('admin.name_ar'),
            'name_en'         =>trans('admin.name_en'),
            'mob'                     =>trans('admin.mob'),
            'code'                    =>trans('admin.code'),
            'logo'                    =>trans('admin.logo'),
        ],[

        ]);
        if(request()->hasFile('logo')){
                    $data['logo']  = Up()->Upload([
                        'file'        =>'logo',
                        'path'        =>'trademarks',
                        'upload_type' =>'single',
                        'delete_file' =>Trademark::find($id)->logo,
                    ]);
                }

        Trademark::where('id',$id)->update($data);
        session()->flash('success', trans('admin.updated_record') );
        return redirect('admin/trademarks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trademark::find($id)->delete();
         $trademarks =  Trademark::find($id);
         Storage::delete($trademarks->logo);
         $trademarks->delete();
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/trademarks');
    }

    public function multi_delete()
    {
        if(is_array(request('item'))){
            // Trademark::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $trademarks =  Trademark::find($id);
                Storage::delete($trademarks->logo);
                $trademarks->delete();
            }

        }/*if*/ else{
            // Trademark::find(request('item'))->delete();
              $trademarks =  Trademark::find(request('item'));
                Storage::delete($trademarks->logo);
                $trademarks->delete();
        }
        session()->flash('success', trans('admin.deleted_record') );
        return redirect('admin/trademarks');
    }
}
