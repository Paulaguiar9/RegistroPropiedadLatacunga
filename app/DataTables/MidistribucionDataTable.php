<?php

namespace App\DataTables;

use App\Distribucion;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;

class MidistribucionDataTable extends DataTable
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
            ->editColumn('certificado_id',function($d){
                return $d->certificado->numeroEmision.' <small>'.$d->certificado->cliente.'</small>';
            })
            
            ->filterColumn('certificado_id', function($query, $keyword) {
                $query->whereRaw("(select count(1) from certificado where certificado.id = certificado_id and CONCAT(certificado.numeroEmision ,' ',certificado.cliente ) like ?) >= 1", ["%{$keyword}%"]);
            })

            ->editColumn('created_at',function($d){
                return $d->created_at.' <small>'.$d->created_at->diffForHumans().'</small>';
            })
            ->editColumn('updated_at',function($d){
                return $d->updated_at.' <small>'.$d->updated_at->diffForHumans().'</small>';
            })
            ->editColumn('estado',function($d){
                if($d->estado==1){
                    return '<span class="badge badge-warning">Enviado</span>';
                }


                if($d->estado==2){
                    return '<span class="badge badge-success">Aprobado</span>';
                }


                if($d->estado==3){
                    return '<span class="badge badge-danger">Reprobado</span>';
                }


            })
            ->addColumn('action', function($d){
                
                  


                    $a='<a href="'.route('aprobarDistribucion',['id'=>$d->id,'es'=>2]).'" class="btn btn-success">Aprobar</a>';
                    $r='<a href="'.route('aprobarDistribucion',['id'=>$d->id,'es'=>3]).'" class="btn btn-danger">Reprobar</a>';
                    return $a.$r;
            })
            ->rawColumns(['certificado_id','action','created_at','updated_at','estado']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Distribucion $model)
    {
        return $model->newQuery()->where('user_id',Auth::id())->select($this->getColumns());
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
            'certificado_id',
            'created_at',
            'updated_at',
             'estado',
        ];
    }


    protected function getColumnsTable()
    {
        return [
            
            'certificado_id'=>['title'=>'N° de Tomo & Cliente','data'=>'certificado_id'],
            'created_at'=>['title'=>'Fecha creado'],
            'updated_at'=>['title'=>'Última actualización'],
            'estado'=>['title'=>'Estado']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Midistribucion_' . date('YmdHis');
    }
}
