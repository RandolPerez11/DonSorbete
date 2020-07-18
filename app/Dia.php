<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    //
    protected $table = 'dia';

    protected $fillable =['producto','precio','promocion','usuario','sucursal','fecha'];
}
