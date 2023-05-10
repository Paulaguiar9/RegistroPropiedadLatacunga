<?php

namespace App\DataTables;

use App\Libro;
use Yajra\DataTables\Services\DataTable;

class ConsultaLibrosDataTable extends DataTable
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
          
            ->addColumn('action', function($l){           
                $di='img/libros/'.$l->archivo;
                if($l->archivo){
                    $link='<a href="'.$di.'" class="btn btn-link btn-sm">Pdf</a>';    
                }else{
                    $link='';
                }
                return $link;
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
                    ->addAction(['width' => '80px','title'=>'Acción' ])
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
            'fojaInicio',
            'fechaPartidaInicio',
            'partidaFin',
            'fojaFin',
            'fechaPartidaFin',
            'observacion',
            'archivo',
            // 'created_at',
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
            'fojaInicio',
            'fechaPartidaInicio',
            'partidaFin',
            'fojaFin',
            'fechaPartidaFin',
            'observacion'=>['title'=>'Observación'],
            //'archivo',
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
        return 'ConsultaLibros_' . date('YmdHis');
    }
}
