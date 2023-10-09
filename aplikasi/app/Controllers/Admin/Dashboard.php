<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    protected $PesertaModel;
    protected $AdminModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $peserta = $this->pesertaModel->countAll();
        $admin = $this->adminModel->countAll();
        $diterima = $this->pesertaModel->where(['status' => 3])->countAllResults();
        $ditolak = $this->pesertaModel->where(['status' => 4])->countAllResults();

        $data = [
            'title' => 'Admin | Dashboard',
            'peserta'  => $peserta,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'admin' => $admin,
            'jurusan' => $this->pesertaModel->getByjurusan()
        ];
        return view('admin/index', $data);
    }
}
