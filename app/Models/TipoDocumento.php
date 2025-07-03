<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $table = 'tipo_documento';
    protected $primaryKey = 'id_tipo_documento';
    protected $fillable = [
        'nombre_documento',
        'codigo',
        'estado',
        'orden'
    ];
}
