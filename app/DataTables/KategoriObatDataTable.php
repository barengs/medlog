<?php

namespace App\DataTables;

use App\Models\KategoriObat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KategoriObatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($data) {
                $edit = '<a class="btn btn-sm btn-warning icon-left" href="ubah/' . $data->id . '"><i class="ti-pencil-alt"></i>Ubah</a>';
                $delete = '<a class="btn btn-sm btn-danger icon-left" id="delete" data-url="hapus/' . $data->id . '" data-id="' . $data->id . '" href="javascript:void(0)"><i class="ti-trash"></i>Hapus</a>';

                return '<div class="btn-group">' . $edit . $delete . '</div>';
            })
            ->editColumn('created_at', function ($data) {
                return date('d M Y', strtotime($data->created_at));
            })
            ->editColumn('updated_at', function ($data) {
                return date('d M Y h:m:s', strtotime($data->created_at));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KategoriObat $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kategoriobat-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('DT_RowIndex')
                ->title('#')
                ->searchable(false),
            Column::make('nama')
                ->title('Nama Kategori Obat'),
            Column::make('created_at')
                ->title('Tanggal Pencatatan'),
            Column::make('updated_at')
                ->title('Tanggal Perubahan'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'KategoriObat_' . date('YmdHis');
    }
}
