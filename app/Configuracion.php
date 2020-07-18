<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //
    protected $table = 'configuracion';

    protected $fillable =[
      'p_mini','p_chico','p_mediano','p_grande','p_medio','p_litro','p_cono',
      'p_cono2','p_cazuela','p_cazuela2','url_mini','url_chico','url_mediano',
      'url_grande','url_medio','url_litro','url_cono','url_cono2','url_cazuela',
      'url_cazuela2',
    ];
}
