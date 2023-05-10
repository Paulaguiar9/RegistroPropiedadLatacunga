<?php

namespace App\DataTables;

use App\Devolucion;
use Yajra\DataTables\Services\DataTable;

class DevolucionesDataTable extends DataTable
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
            ->editColumn('prestamo_id',function($d){
                return $d->prestamo->libro->tipo.' '.$d->prestamo->libro->numeroTomo;
            })


            ->addColumn('usuario',function($d){
              return $d->prestamo->usuario->nombres.' '.$d->prestamo->usuario->apellidos;  
            })
            ->addColumn('action', '');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Devolucion $model)
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
            'prestamo_id',
            'observacion',
            'created_at',
            'updated_at'
        ];
    }


    protected function getColumnsTable()
    {
        return [
            // 'id',
            'prestamo_id'=>['title'=>'Prestamo','data'=>'prestamo_id'],
            'usuario',
            'observacion'=>['title'=>'Observación'],
            'created_at'=>['title'=>'Fecha creada'],
            'updated_at'=>['title'=>'Última actualización'],
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Devoluciones_' . date('YmdHis');
    }
}
