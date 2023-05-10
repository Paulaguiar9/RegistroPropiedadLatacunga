<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;

class PrestamoUsuariosDataTable extends DataTable
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
                return '<button data-id="'.$u->id.'" data-email="'.$u->email.'" data-cedula="'.$u->cedula.'" data-nombres="'.$u->nombres.'" data-apellidos="'.$u->apellidos.'" type="button" class="btn btn-info btn-sm" onclick="selecionar(this)">Selecionar</button>';
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
                    // ->minifiedAjax()
                    ->ajax(['data' => 'function(d) { d.table = "usuarios"; }'])
                    ->addAction(['width' => '80px','title'=>'Selecionar'])
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
            'cedula',
            'nombres',
            'apellidos'
        ];
    }


    protected function getColumnsTable()
    {
        return [
            // 'id',
            'email',
            'perfil',
            'cedula'=>['title'=>'Cédula'],
            'nombres',
            'apellidos'
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
