<?php

namespace App\DataTables;

use App\Certificado;
use Yajra\DataTables\Services\DataTable;

class ConsultaCertificadosDataTable extends DataTable
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
            ->addColumn('action', function($c){
                // distribuciones
                return view('certificados.infoDistribucion', ['c'=>$c])->render();

            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Certificado $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumnsTable())
                    ->minifiedAjax()
                    ->addAction(['width' => '80px','title'=>''])
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
            'id',
            'numeroEmision',
            'cliente',
            'created_at',
            'updated_at',
        ];
    }

    protected function getColumnsTable()
    {
        return [
            // 'id',
            'numeroEmision'=>['title'=>'Número de emisión'],
            'cliente',
            'created_at'=>['title'=>'Creado el'],
            'updated_at'=>['title'=>'Actualizado el'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ConsultaCertificados_' . date('YmdHis');
    }
}
