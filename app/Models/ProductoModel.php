<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table            = 'productos';
    protected $primaryKey       = 'id_producto';
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

    public function getProductos(int $paginate = 10): array
    {
        $productos = $this->select('pr.*, m.nombre_mercado,productos.*, productos.nombre as producto, c.*, c.nombre as categoria')
            ->join('precios as pr', 'pr.id_producto = productos.id_producto', 'right')
            ->join('categorias as c', 'c.id_categoria = productos.id_categoria', 'right')
            ->join('mercados as m', 'm.id_mercado = productos.id_mercado', 'left')
            // ->join('mercados as mp', 'mp.id_mercado = pr.id_mercado', 'right')
            ->paginate($paginate);
        return $productos;
    }
    public function searchProductos(int $mercadoId, int $paginate = 10, $search): array
    {
        // Limpiamos y preparamos el término de búsqueda
        $search = trim(strtolower($search));

        return $this->select('mercados.*, 
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
            ->join('mercados as m', 'm.id_mercado = productos.id_mercado', 'left')
            ->where('mercados.id_mercado', $mercadoId)
            ->groupStart()
            // Búsqueda exacta
            ->like('LOWER(p.nombre)', $search)
            // ->orLike('LOWER(c.nombre)', $search)
            ->orLike('LOWER(c.nombre)', $search)
            ->groupEnd()
            ->orderBy('relevancia', 'ASC')
            ->orderBy('p.nombre', 'ASC')
            ->paginate($paginate);
    }
    public function getByCategoria(int $paginate = 10, $search): array
    {
        $productos = $this->select('m.*, productos.*, productos.nombre as producto, c.*, c.nombre as categoria')
            ->join('categorias as c', 'c.id_categoria = productos.id_categoria', 'right')
            ->join('mercados as m', 'm.id_mercado = productos.id_mercado', 'left')
            ->where('c.id_categoria', $search)
            ->paginate($paginate);
        return $productos;
    }
}
