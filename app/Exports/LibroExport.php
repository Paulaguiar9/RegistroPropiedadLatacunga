<?php

namespace App\Exports;

use App\Libro;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class LibroExport implements FromQuery
{
     use Exportable;

    public function __construct(int $anio)
    {
        $this->anio = $anio;
    }

    public function query()
    {
    	$data=[
    		'tipo',
    		'anio',
    		'numeroTomo',
    		'fechaPartidaInicio',
    		'fechaPartidaFin',
    		'fechaPartidaFin',
    		'partidaFin',
    		'fojaInicio',
    		'fojaFin',
    		'observacion'
    	];
        return Libro::query()->where('anio', $this->anio)->select($data);
    }
}
