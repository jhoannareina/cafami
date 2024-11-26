<?php

namespace App\Controllers;

use App\Models\MercadoModel;

class PrincipalController extends BaseController
{
    public function index(): string
    {
        $mercadoModel = new MercadoModel();
        $listaMercados = $mercadoModel->findAll();
        // dd($mercado);
        return view('principal', ['listaMercados' => $listaMercados]);
    }
}