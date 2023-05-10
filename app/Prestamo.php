<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Libro;
use App\User;
use App\Devolucion;

class Prestamo extends Model
{
    protected $table="prestamo";




    public function libro()
	{
	    return $this->belongsTo(Libro::class, 'libro_id');
	}

	public function usuario()
	{
	    return $this->belongsTo(User::class, 'user_id');
	}

	public function devolucion()
    {
        return $this->hasOne(Devolucion::class);
    }

    public function libroXid($id)
    {
    	$p=Libro::find($id);
    	return $p->tipo.' '.$p->numeroTomo;
    }


}
