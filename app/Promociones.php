<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    //
    protected $table = 'promocion';

    protected $fillable =['producto','activo','promo'];
}
