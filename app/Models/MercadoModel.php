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

    public function getProductos(int $mercadoId, int $paginate = 10): array
    {
        // $productos = $this->select('pr.*, mercados.*, p.*, p.nombre as producto, c.*, c.nombre as categoria')
        //     ->join('productos as p', 'p.id_mercado = mercados.id_mercado', 'right')
        //     ->join('categorias as c', 'c.id_categoria = p.id_categoria', 'right')
        //     ->join('precios as pr', 'pr.id_producto = p.id_producto', 'right')
        //     ->where('mercados.id_mercado', $mercadoId)
        //     ->paginate($paginate);
        // return $productos;

        $productos = $this->select('um.*,pr.*,p.nombre as producto,c.*, c.nombre as categoria')
            ->from('productos as p')
            ->join('categorias as c', 'c.id_categoria = p.id_categoria', 'right')
            ->join('precios as pr', 'pr.id_producto = p.id_producto', 'right')
            ->join('unidades_medidas as um', 'um.id_unidad_medida = pr.id_unidad_medida')
            ->where('p.id_mercado', $mercadoId)
            ->paginate($paginate);
        return $productos;
    }
    public function searchProductos($mercadoId, int $paginate = 10, $search): array
    { 
        // Limpiamos y preparamos el término de búsqueda
        $search = trim(strtolower($search));
        return $this->select('um.*,pr.*, mercados.*, 
                                 p.*, 
                                 p.nombre as producto, 
                                 c.*, 
                                 c.nombre as categoria,
                                 CASE 
                                    WHEN LOWER(p.nombre) = ' . $this->escape($search) . ' THEN 1
                                    WHEN LOWER(p.nombre) LIKE ' . $this->escape($search . '%') . ' THEN 2
                                    WHEN LOWER(p.nombre) LIKE ' . $this->escape('%' . $search . '%') . ' THEN 3
                                    ELSE 4
                                 END as relevancia')
            ->join('productos as p', 'p.id_mercado = mercados.id_mercado', 'right')
            ->join('categorias as c', 'c.id_categoria = p.id_categoria', 'right')
            ->join('precios as pr', 'pr.id_producto = p.id_producto')
            ->join('unidades_medidas as um', 'um.id_unidad_medida = pr.id_unidad_medida')
            ->groupStart()
            // Búsqueda exacta
            ->like('LOWER(p.nombre)', $search)
            ->orLike('LOWER(c.nombre)', $search)
            ->groupEnd()
            ->orderBy('relevancia', 'ASC')
            ->orderBy('p.nombre', 'ASC')
            ->where('p.id_mercado', $mercadoId)
            ->paginate($paginate);
    }
    public function getByCategoria($mercadoId, int $paginate = 10, $search): array
{
    $productos = $this->select('um.*,p.*, p.nombre as producto, m.*, pr.*, c.*, c.nombre as categoria')
        ->from('mercados as m')  // Agregamos el from y un alias para mercados
        ->join('productos as p', 'p.id_mercado = m.id_mercado', 'right')
        ->join('categorias as c', 'c.id_categoria = p.id_categoria', 'right')
        ->join('precios as pr', 'pr.id_producto = p.id_producto')
        ->join('unidades_medidas as um', 'um.id_unidad_medida = pr.id_unidad_medida')
        ->where('c.id_categoria', $search)
        ->where('p.id_mercado', $mercadoId)
        ->paginate($paginate);
    return $productos;
}
}
