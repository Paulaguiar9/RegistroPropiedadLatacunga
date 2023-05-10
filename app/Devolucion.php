<?php

namespace App;
use App\Prestamo;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    protected $table='devolucion';


    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
