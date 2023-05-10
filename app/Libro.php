<?php

namespace App;
use App\Prestamo;


use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table='libro';

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }





}
