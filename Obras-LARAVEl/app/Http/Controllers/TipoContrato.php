<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $table = 'tipo_contrato';
    protected $primaryKey = 'id_tipo_contrato';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id_tipo_contrato',
        'nombre_tipo_contrato',
    ];
}
