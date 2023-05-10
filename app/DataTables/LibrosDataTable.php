<?php

namespace App\DataTables;

use App\Libro;
use Yajra\DataTables\Services\DataTable;

class LibrosDataTable extends DataTable
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
                    return 'Disponible';

                }
                else {
                    return'Prestado';
                }
            })
            ->addColumn('action', function($l){

                $ed='<a href="'.route('editarLibro',['id'=>$l->id]).'" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-pen-alt"></i></a>';
                $el='<button type="button" data-url="'.route('eliminarLibro',['id'=>$l->id]).'" onclick="eliminar(this)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Eliminar"><i class="fas fa-trash"></i></button>';

                $di='img/libros/'.$l->archivo;
                if($l->archivo){
                    $link='<a href="'.$di.'" class="btn btn-link btn-sm">Pdf</a>';    
                }else{
                    $link='';
                }
                

                return $ed.$el.$link;
            });
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
            'estado',
            'archivo'
            // 'updated_at'
        ];
    }

     protected function getColumnsTable()
    {
        return [
            // 'id',
            'tipo',
            'numeroTomo'=>['title'=>'Número de tomo'],
            'anio'=>['title'=>'Año'],
            'partidaInicio',
            'estado'
            // 'created_at',
            // 'updated_at'
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
