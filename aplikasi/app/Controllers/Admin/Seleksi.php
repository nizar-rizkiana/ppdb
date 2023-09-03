<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\AdminModel;

class Peserta extends BaseController
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
        $diterima = $this->pesertaModel->where(['status' => 2])->countAllResults();
        $ditolak = $this->pesertaModel->where(['status' => 3])->countAllResults();

        $data = [
            'title' => 'Admin | Dashboard',
            'peserta'  => $peserta,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'admin' => $admin,
        ];
        return view('admin/index', $data);
    }

    public function pesertabaru()
    {
        $peserta = $this->pesertaModel->where(['status' => 1])->findAll();
        $data = [
            'title' => 'Admin | Peserta Baru',
            'peserta' => $peserta,
        ];
        return view('admin/peserta-baru', $data);
    }

    public function update($id)
    {
        $status = $this->request->getVar('status');

        $this->pesertaModel->update($id, [
            'status' => $status,
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil diperbarui');
        return redirect()->to('/peserta-baru');
    }
}
