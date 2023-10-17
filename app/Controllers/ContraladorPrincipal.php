<?php

namespace App\Controllers;

class ContraladorPrincipal extends BaseController
{
    public function index(): string
    {
        $var = [
            'head' => view('layouts/head'),
            'content' => view('layouts/content'),
            'nav_side_bar' => view('layouts/nav_side_bar'),
            'footer' => view('layouts/footer')
        ];

        return view('paginaTesting', $var);
    }
}
