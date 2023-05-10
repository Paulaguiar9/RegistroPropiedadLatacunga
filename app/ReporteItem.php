<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Certificado;
use App\Reporte;
use App\Distribucion;

class ReporteItem extends Model
{
    protected $table='itemreporte';


    public function certificado()
	{
	    return $this->belongsTo(Certificado::class, 'certificado_id');
	}


	public function reporte()
	{
	    return $this->belongsTo(Reporte::class, 'reporte_id');
	}

	public function distribucion()
	{
	    return $this->belongsTo(Distribucion::class, 'distribucion_id');
	}
}
