<?php

namespace App\DataTables;

use App\Libro;
use Yajra\DataTables\Services\DataTable;

class PrestamoLibrosDataTable extends DataTable
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
            ->editColumn('estado',function($l){
                if ($l->estado) {
                    return '<span class="badge badge-success">Disponible</span>';
                }else{
                    return '<span class="badge badge-warning">Prestado</span>';
                }

            })
            ->addColumn('action', function($li){
                if ($li->estado) {
                    return '<button type="button" data-i="'.$li->id.'" data-t="'.$li->tipo.'" data-n="'.$li->numeroTomo.'" data-a="'.$li->anio.'" data-p="'.$li->partidaInicio.'" onclick="prestar(this);" class="btn btn-primary">Selecionar</button>';
                }else{
                    return 'Prestado';
                }
            })->rawColumns(['action','estado']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Libro $model)
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
                    ->ajax(['data' => 'function(d) { d.table = "libros"; }'])
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
            'tipo',
            'numeroTomo',
            'anio',
            'partidaInicio',
            'estado'
        ];
    }


    protected function getColumnsTable()
    {
        return [
            // 'id',
            'tipo',
            'numeroTomo'=>['title'=>'N° de tomo'],
            'anio'=>['title'=>'Año'],
            'partidaInicio',
            'estado'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Libros_' . date('YmdHis');
    }
}
