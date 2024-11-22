<?php

namespace App\Controllers;

class PrincipalController extends BaseController
{
    public function index(): string
    {
        return view('principal');
    }
}