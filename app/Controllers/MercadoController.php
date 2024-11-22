<?php

namespace App\Controllers;

use App\Models\MercadoModel;

class MercadoController extends BaseController
{

    public function index(): string
    {
        $mercado = new MercadoModel();
        $mercado = $mercado->findAll();
        // dd($mercado);
        return view('mercado', ['mercado' => $mercado]);
    }
    // Método para mostrar la feria según el id
    public function feria($id_mercado)
    {
        // Crear una instancia del modelo MercadoModel
        $mercadoModel = new MercadoModel();
        // Buscar el mercado por el id
        $mercado = $mercadoModel->find($id_mercado);
        // Verificar si el mercado existe
        if (!$mercado) {
            // Si no se encuentra el mercado, mostrar un error o redirigir
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Feria no encontrada');
        }
        // Decidir qué vista cargar según el mercado seleccionado
        $viewName = $this->getViewNameByMarket($mercado);
        // Pasar los datos del mercado a la vista
        return view($viewName, ['mercado' => $mercado]);
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
