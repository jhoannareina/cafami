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

    public function getProductos(int $mercadoId, int $paginate = 12): array
    {
        $productos = $this->select('mercados.id_mercado,p.id_producto, p.nombre as producto')
            ->join('productos as p', 'p.id_mercado = mercados.id_mercado')
            ->where('p.id_mercado', $mercadoId)
            ->paginate($paginate);
        return $productos;
    }
    public function getProductosAndPrecios(int $mercadoId, int $productoId): array
{
    $precios = $this->db->table('precios')
        ->select('precios.*, productos.nombre as producto,um.medida,pr.nombre_proporcion')
        ->join('productos', 'productos.id_producto = precios.id_producto')
        ->join('proporciones pr', 'pr.id_proporcion = precios.id_proporcion')
        ->join('unidades_medidas um', 'um.id_unidad_medida  = precios.id_unidad_medida ')
        // ->where('precios.id_mercado', $mercadoId)
        ->where('precios.id_producto', $productoId)
        
        ->get()
        ->getResultArray();

    return $precios;
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
