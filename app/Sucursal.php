<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    //
    protected $table = 'sucursales';

    protected $fillable =['name','direccion','telefono'];

    public function scopeSearch($query,$name){
        if($name){

            return $query->where('name','LIKE',"%$name%");
        }else {
            return $query;
        }

    }
}
