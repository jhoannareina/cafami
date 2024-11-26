<?php

namespace App\Controllers;

use App\Models\MercadoModel;
use App\Models\CategoriaModel;

class MercadoController extends BaseController
{

    public function index(): string
    {
        $mercadoModel = new MercadoModel();
        $mercado = $mercadoModel->findAll();
        $listaMercados = $mercado;
        // dd($mercado);
        return view('mercado', ['mercado' => $mercado, 'listaMercados' => $listaMercados]);
    }
    // Método para mostrar la feria según el id
    public function feria($id_mercado)
    {
        // Crear una instancia del modelo MercadoModel
        $mercadoModel = new MercadoModel();
        $categoriaModel = new CategoriaModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $mercado = $mercadoModel->find($id_mercado);
        $productos = $mercadoModel->getProductos($id_mercado);
        $categorias = $categoriaModel->findAll();
        $pager = $mercadoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$mercado) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado
        $viewName = $this->getViewNameByMarket($mercado);

        // Pasar los datos del mercado a la vista
        return view('mercado-producto', compact('mercado', 'productos', 'pager', 'categorias', 'listaMercados'));
    }
    public function buscar(): string
    {
        // Crear una instancia del modelo MercadoModel
        $search = $this->request->getPost('search');
        $id_mercado = intval($this->request->getPost('id_mercado'));

        $mercadoModel = new MercadoModel();
        $categoriaModel = new CategoriaModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $mercado = $mercadoModel->find($id_mercado);
        $productos = $mercadoModel->searchProductos($id_mercado, 10, $search);
        $categorias = $categoriaModel->findAll();
        $pager = $mercadoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$mercado) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado
        $viewName = $this->getViewNameByMarket($mercado);

        // Pasar los datos del mercado a la vista
        return view('mercado-producto', compact('mercado', 'productos', 'pager', 'categorias', 'listaMercados', 'search'));
    }
    public function searchByCategoria(): string
    {
        // Crear una instancia del modelo MercadoModel
        $search = $this->request->getGet('id_categoria');
        $id_mercado = $this->request->getGet('id_mercado');

        $mercadoModel = new MercadoModel();
        $categoriaModel = new CategoriaModel();
        // Buscar el mercado por el id
        $listaMercados = $mercadoModel->findAll();
        $mercado = $mercadoModel->find($id_mercado);
        $productos = $mercadoModel->getByCategoria($id_mercado, 10, $search);
        $categorias = $categoriaModel->findAll();
        $pager = $mercadoModel->pager;
        // dd($productos);
        // Verificar si el mercado existe
        if (!$mercado) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado
        $viewName = $this->getViewNameByMarket($mercado);

        // Pasar los datos del mercado a la vista
        return view('mercado-producto', compact('mercado', 'productos', 'pager', 'categorias', 'listaMercados'));
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
