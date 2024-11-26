<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table            = 'categorias';
    protected $primaryKey       = 'id_categoria';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        // 'nombre_mercado',
        // 'ubicacion',
        // 'ciudad',
        // 'departamento',
        // 'hora_apertura',
        // 'hora_cierre',
        // 'tipo_mercado',

    ];
}
