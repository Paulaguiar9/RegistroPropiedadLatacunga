<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class UsuariosDataTable extends DataTable
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
            ->addColumn('action', function($u){

                $ed='<a href="'.route('editarUser',['id'=>$u->id]).'" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fas fa-pen-alt"></i></a>';
                $el='<button type="button" data-url="'.route('eliminarUser',['id'=>$u->id]).'" onclick="eliminar(this)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="left" title="Eliminar"><i class="fas fa-trash"></i></button>';
                return $ed.$el;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
                    ->ajax(['data' => 'function(d) { d.table = "usuarios"; }'])
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
            'email',
            'perfil',
            'nombres',
            'apellidos',
            'cedula'
        ];
    }


    protected function getColumnsTable()
    {
        return [
            // 'id',
            'email',
            'perfil',
            'nombres',
            'apellidos',
            'cedula'=>['title'=>'Cédula']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Usuarios_' . date('YmdHis');
    }
}
