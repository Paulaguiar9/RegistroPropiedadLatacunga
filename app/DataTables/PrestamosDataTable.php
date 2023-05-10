<?php

namespace App\DataTables;

use App\Prestamo;
use App\Libro;
use Yajra\DataTables\Services\DataTable;

class PrestamosDataTable extends DataTable
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
            ->editColumn('libro_id',function($p){
                return view('libros.info', ['p'=>$p])->render();
            })

            ->editColumn('estado',function($p){
                if ($p->estado) {
                    return '<span class="badge badge-success">Prestado <i class="fas fa-arrow-right"></i></span>';
                }
                return '<span class="badge badge-warning"><i class="fas fa-arrow-left"></i>Devuelto</span>';
            })
            
            ->filterColumn('libro_id', function($query, $keyword) {
                $query->whereRaw("(select count(1) from libro where libro.id = libro_id and CONCAT(libro.tipo ,' ',libro.numeroTomo ) like ?) >= 1", ["%{$keyword}%"]);
            })

            ->editColumn('user_id',function($p){
                return view('usuarios.info', ['p'=>$p])->render();
            })
            ->filterColumn('user_id', function($query, $keyword) {
                $query->whereRaw("(select count(1) from users where users.id = user_id and CONCAT(users.nombres ,' ',users.apellidos,' ',users.cedula ) like ?) >= 1", ["%{$keyword}%"]);
            })


            ->editColumn('created_at',function($p){
                return $p->created_at.'<small> '.$p->created_at->diffForHumans().'</small>';
            })
            ->editColumn('updated_at',function($p){
                return $p->updated_at.'<small> '.$p->updated_at->diffForHumans().'</small>';
            })
            ->addColumn('action', function($p){
                if ($p->estado) {
                    return '<button type="button" data-id="'.$p->id.'" onclick="devolver(this);" class="btn btn-primary">Devolver</button>';
                }else{
                    return view('devoluciones.info', ['p'=>$p])->render();
                }
            })->rawColumns(['user_id','action','created_at','updated_at','libro_id','estado']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Prestamo $model)
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
            'user_id',
            'libro_id',
            'observacion',
            'estado',
            'created_at',
            'updated_at'
        ];
    }

    protected function getColumnsTable()
    {
        return [
            // 'id',
            'user_id'=>['title'=>'Cliente','data'=>'user_id'],
            'libro_id'=>['title'=>'Libro & N° Tomo','data'=>'libro_id'],
            'observacion'=>['title'=>'Observación'],
            'estado',
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
        return 'Prestamos_' . date('YmdHis');
    }
}
