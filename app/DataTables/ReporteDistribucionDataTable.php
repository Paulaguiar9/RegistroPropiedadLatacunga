<?php

namespace App\DataTables;

use App\Reporte;
use Yajra\DataTables\Services\DataTable;

class ReporteDistribucionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
             ->addColumn('action', function($r){
                return '<a href="'.route('descargarReporteDistribucionPdf',['id'=>$r->id]).'" target="_blank">PDF</a>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Reporte $model)
    {
        return $model->newQuery()->where('tipo','Distribucion')->select('id', 'fecha', 'created_at');
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
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'id',
            'fecha'=>['title'=>'Fecha ingresada'],
            'created_at'=>['title'=>'Fecha guardada']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ReporteDistribucion_' . date('YmdHis');
    }
}
