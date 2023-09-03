<?php

namespace App\Controllers;

class Tentang extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'User | Tentang',
        ];
        return view('user/tentang', $data);
    }
}
