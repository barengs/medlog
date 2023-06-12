<?php

namespace App\DataTables;

use App\Models\Checkup;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CheckupsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('no_pasien', function ($data) {
                return $data->pasien->no_pasien;
            })
            ->addColumn('nama', function ($data) {
                $nama_lengkap = $data->pasien->nama_depan;
                return $nama_lengkap;
            })
            ->addColumn('no_ktp', function ($data) {
                return $data->pasien->no_ktp;
            })
            ->addColumn('status', function ($data) {
                if ($data->status == 'open') {
                    return $data->status;
                }
            })
            ->addColumn('action', function ($data) {
                $show = '<a class="btn btn-sm btn-info icon-left" href="lihat/' . $data->id . '"><i class="ti-eye"></i> Proses</a>';

                return '<div class="btn-group">' . $show . '</div>';
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Checkup $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('checkups-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
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
            Column::make('no_pasien')->title('Nomor Pasien'),
            Column::make('nama')->title('Nama Lengkap'),
            Column::make('no_ktp')->title('Nomor KTP'),
            Column::make('status')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                // ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Checkups_' . date('YmdHis');
    }
}
