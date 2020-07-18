<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresos extends Model
{
    //
    protected $table = 'egresos';

    protected $fillable =['sucursal','producto','precio','fecha','usuario'];
}
