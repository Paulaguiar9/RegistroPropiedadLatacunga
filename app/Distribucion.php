<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Certificado;

class Distribucion extends Model
{
    protected  $table='distribucion';


    public function usuario()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function certificado()
    {
        return $this->belongsTo(Certificado::class,'certificado_id');
    }

}
