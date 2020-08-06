<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caja extends Model
{
    //
    protected $table = 'caja';
    protected $fillable =['sucursal','inicio'];
}

