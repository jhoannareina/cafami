<?php

namespace App\Models;

use CodeIgniter\Model;

class MercadoModel extends Model
{
    protected $table            = 'mercados';
    protected $primaryKey       = 'id_mercado'; 
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nombre_mercado',
        'ubicacion',
        'ciudad',
        'departamento',
        'hora_apertura',
        'hora_cierre',
        'tipo_mercado',
        
    ];

    
}