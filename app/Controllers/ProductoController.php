<?php

namespace App\Controllers;

use App\Models\MercadoModel;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;

class ProductoController extends BaseController
{

    public function index(): string
    {
        $productos = new ProductoModel();
        $mercado = new MercadoModel();
        $productos = $productos->findAll();
        $listaMercados = $mercado;
        // dd($mercado);
        return view('mercado', ['mercado' => $mercado, 'listaMercados' => $listaMercados]);
    }
    // Método para mostrar la feria según el id
    public function feria()
    {
        // Crear una instancia del modelo MercadoModel
        $mercadoModel = new MercadoModel();
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $productos = $productoModel->getProductos();
        $categorias = $categoriaModel->findAll();
        $pager = $productoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$productos) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado

        // Pasar los datos del mercado a la vista
        return view('producto', compact('productos', 'pager', 'categorias', 'listaMercados'));
    }
    public function buscar(): string
    {
        // Crear una instancia del modelo MercadoModel
        $search = $this->request->getPost('search');

        $mercadoModel = new MercadoModel();
        $categoriaModel = new CategoriaModel();
        $productoModel = new ProductoModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $productos = $mercadoModel->searchProductos(10, $search);
        $categorias = $categoriaModel->findAll();
        $pager = $mercadoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$productos) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado
        // Pasar los datos del mercado a la vista
        return view('producto', compact( 'productos', 'pager', 'categorias', 'listaMercados', 'search'));
    }
    public function searchByCategoria(): string
    {
        // Crear una instancia del modelo MercadoModel
        $search = $this->request->getGet('id_categoria');

        $mercadoModel = new MercadoModel();
        $categoriaModel = new CategoriaModel();
        $productoModel = new ProductoModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $productos = $productoModel->getByCategoria(10, $search);
        $categorias = $categoriaModel->findAll();
        $pager = $productoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$productos) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado

        // Pasar los datos del mercado a la vista
        return view('producto', compact('productos', 'pager', 'categorias', 'listaMercados'));
    }

    // Método para determinar qué vista cargar
    private function getViewNameByMarket($mercado)
    {
        // Aquí se define qué vista cargar según el nombre o tipo del mercado
        if ($mercado['nombre_mercado'] == 'Feria 16 de julio') {
            return 'feria16'; // Vista específica para la feria 16 de julio
        } else if ($mercado['nombre_mercado'] == 'Mercado Rodríguez') {
            return 'rodriguez'; // Vista para la feria central
        } else if ($mercado['nombre_mercado'] == 'Mercado Yungas') {
            return 'yungas'; // Vista para la feria central
        } else if ($mercado['nombre_mercado'] == 'Feria Rio Seco') {
            return 'rioSeco'; // Vista para la feria central    
        } else {
            return 'mercado'; // Vista por defecto
        }
    }
}
