<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfertaLaboral extends Model
{
    protected $table = 'oferta_laboral';
    protected $primaryKey = 'id_oferta_laboral';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'empresa_nit_empresa',
        'tipo_contrato_id_tipo_contrato',
        'nombre_oferta_laboral',
        'descripcion_oferta_laboral',
        'direccion_oferta_laboral',
        'intensidad_horaria',
        'requisitos_oferta_laboral',
        'salario_oferta_laboral',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_nit_empresa', 'nit_empresa');
    }

    public function tipoContrato()
    {
        return $this->belongsTo(TipoContrato::class, 'tipo_contrato_id_tipo_contrato', 'id_tipo_contrato');
    }
}
