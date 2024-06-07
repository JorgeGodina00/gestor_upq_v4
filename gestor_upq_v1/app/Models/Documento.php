<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';
    protected $primaryKey = 'id_documento'; // Definir la clave primaria personalizada
    
    protected $fillable = [
        'clave_profesor',
        'periodo',
        'clave_categoria',
        'clave_subcategoria',
        'consecutivo',
        'nombre_archivo',
        'ubicacion_archivo',
    ];
}
