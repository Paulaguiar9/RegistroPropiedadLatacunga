<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ReporteItem;
class Reporte extends Model
{
    protected $table='reporte';

    public function itemsReporte()
    {
        return $this->hasMany(ReporteItem::class);
    }
}
