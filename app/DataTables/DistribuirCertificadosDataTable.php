<?php

namespace App\DataTables;

use App\Certificado;
use Yajra\DataTables\Services\DataTable;

class DistribuirCertificadosDataTable extends DataTable
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
            ->editColumn('created_at',function($c){
                return $c->created_at.' <small>'.$c->created_at->diffForHumans().'</small>';
            })
            ->editColumn('updated_at',function($c){
                return $c->updated_at.' <small>'.$c->updated_at->diffForHumans().'</small>';
            })
            ->addColumn('action', function($c){
                return '<a href="'.route('usuariosDistrucucionCertificado',['id'=>$c->id]).'" class="btn-link">Distribuir</a>';
            })->rawColumns(['created_at','action','updated_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Certificado $model)
    {
        return $model->newQuery()->orderBy('created_at','desc')->select($this->getColumns());
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
                    ->addAction(['width' => '80px','title'=>'Acción'])
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
            'updated_at'
        ];
    }

    protected function getColumnsTable()
    {
        return [
            // 'id',
            'numeroEmision'=>['title'=>'Número de emisión'],
            'cliente',
            'created_at'=>['title'=>'Fecha creada'],
            'updated_at'=>['title'=>'Fecha actualizada']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Certificados_' . date('YmdHis');
    }
}
