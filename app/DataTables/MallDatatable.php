<?php
namespace App\DataTables;
use App\Model\Mall;
use Yajra\DataTables\Services\DataTable;

class MallDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query) {
        return datatables($query)
            ->addColumn('checkbox', 'back.mall.btn.checkbox')
            ->addColumn('edit', 'back.mall.btn.edit')
            ->addColumn('delete', 'back.mall.btn.delete')
            ->addColumn('show', 'back.mall.btn.show')
            ->addColumn('image', 'back.mall.btn.image')
            ->rawColumns([
                'checkbox',
                'edit',
                'delete',
                'show',
                'image'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
         return Mall::query()->with('country_id')->select('malls.*');

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
          //  ->addAction(['width' => '80px'])
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'=>'Blfrtip',
                'lengthMenu'=>[[5,10,25,50,100,-1],[5,10,25,50,trans('admin.all_record')]],
                'buttons'=>[
                    [ 'text'=>' <i class="fa fa-trash"></i> ','className'=>'btn btn-danger delBtn'],

                    ['text' => '</i><i class="fa fa-plus"></i> ' .trans('admin.create_new_mall').'<i class="fa fa-cube"> ', 'className' => 'btn 
                    btn_crete_new_row_mall btn-info'],


							


                    datatable_buttons_include(),
                ]
              ,//buttons
                    'initComplete'=>" function () {
                    this.api().columns([2,1]).every(function () {
                    var column = this;
                    var input = document.createElement(\"input\");
                    $(input).appendTo($(column.footer()).empty())
                    .on('keyup', function () {
                    column.search($(this).val(), false, false, true).draw();
                    });
                    });
                    }",
              'language'=>datatable_lang(),

            ]);//parameters
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            [
                'name'       => 'checkbox',
                'data'       => 'checkbox',
                'title'      => '<input type="checkbox" class="check_all" onclick="check_all()" />',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], [
                'name'  => 'name_'.session('lang'),
                'data'  => 'name_'.session('lang'),
                'title' => trans('admin.name_'.session('lang')),
            ],
//            [
//                'name'  => 'contact_name',
//                'data'  => 'contact_name',
//                 'title' => trans('admin.contact_name'),
//            ],
            [
                'name'  => 'country_id.country_name_'.session('lang'),
                'data'  => 'country_id.country_name_'.session('lang'),
                 'title' => trans('admin.country_id'),
            ],
//            [
//                'name'  => 'mob',
//                'data'  => 'mob',
//                 'title' => trans('admin.mob'),
//            ],
            [
                'name'  => 'image',
                'data'  => 'image',
                 'title' => trans('admin.logo_mall'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => trans('admin.edit'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],[
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => trans('admin.delete'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
//            [
//                'name'       => 'show',
//                'data'       => 'show',
//                'title'      => trans('admin.show'),
//                'exportable' => false,
//                'printable'  => false,
//                'orderable'  => false,
//                'searchable' => false,
//            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ], [
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.updated_at'),
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Mall_' . date('YmdHis');
    }
}
