<?php
namespace App\DataTables;
use App\Model\Flavor;
use Yajra\DataTables\Services\DataTable;

class FlavorDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query) {
        return datatables($query)
            ->addColumn('checkbox', 'back.flavors.btn.checkbox')
            ->addColumn('edit', 'back.flavors.btn.edit')
            ->addColumn('delete', 'back.flavors.btn.delete')
            ->addColumn('show', 'back.flavors.btn.show')
            ->addColumn('image', 'back.flavors.btn.image')
            ->addColumn('color', 'back.flavors.btn.color')
            ->addColumn('is_public', 'back.flavors.btn.is_public')
            ->rawColumns([
                'checkbox',
                'edit',
                'delete',
                'show',
                'image',
                'color'
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
         return Flavor::query()->with('department_id')->select('flavors.*');

        //return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
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


                    ['text' => '</i><i class="fa fa-plus"></i> ' .trans('admin.create_new_flavor').'<i class="fa fa-cube"> ', 'className' => 'btn 
                    btn_crete_new_row_flavor btn-info'],


                    datatable_buttons_include(),
                ]
              ,//buttons
                    'initComplete'=>" function () {
                    this.api().columns([3,1]).every(function () {
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
            ],[
                'name'  => 'image',
                'data'  => 'image',
                 'title' => trans('admin.icon_flavor'),
            ],  [
                'name'  => 'is_public',
                'data'  => 'is_public',
                 'title' => trans('admin.is_public'),
            ], [
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
            ],[
                'name'       => 'show',
                'data'       => 'show',
                'title'      => trans('admin.show'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],[
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
        return 'Flavor_' . date('YmdHis');
    }
}
