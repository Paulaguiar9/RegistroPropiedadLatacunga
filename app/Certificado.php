<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Distribucion;
use Carbon\Carbon;
class Certificado extends Model
{
    protected $table="certificado";


    public function distribuciones()
    {
        return $this->hasMany(Distribucion::class);
    }


}
