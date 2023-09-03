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
        $peserta = $this->pesertaModel->where("status=3 OR status=4")->findAll();

        $data = [
            'title' => 'Admin | Peserta',
            'peserta'  => $peserta,
        ];
        return view('admin/peserta', $data);
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
    
    public function seleksi()
    {
        $peserta = $this->pesertaModel->where(['status' => 2])->findAll();
        $data = [
            'title' => 'Admin | Seleksi Berkas',
            'peserta' => $peserta,
        ];
        return view('admin/seleksi-berkas', $data);
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
    
    public function terima($id)
    {
        $status = $this->request->getVar('status');
        $diterima = $this->request->getVar('diterima');

        $this->pesertaModel->update($id, [
            'status' => $status,
            'diterima' => $diterima,
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil diperbarui');
        return redirect()->to('/seleksi-berkas');
    }

    public function editPeserta($id)
    {
        $this->pesertaModel->update($id, [
            'nisn' => $this->request->getVar('nisn'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'desa' => $this->request->getVar('desa'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'pilihan_pertama' => $this->request->getVar('pilihan_pertama'),
            'pilihan_kedua' => $this->request->getVar('pilihan_kedua'),
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil diperbarui');
        return redirect()->to('/peserta-baru');
    }
    
    public function editBerkas($id)
    {
        $this->pesertaModel->update($id, [
            'nisn' => $this->request->getVar('nisn'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'berat_badan' => $this->request->getVar('berat_badan'),
            'tinggi_badan' => $this->request->getVar('tinggi_badan'),
            'desa' => $this->request->getVar('desa'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'pilihan_pertama' => $this->request->getVar('pilihan_pertama'),
            'pilihan_kedua' => $this->request->getVar('pilihan_kedua'),
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil diperbarui');
        return redirect()->to('/seleksi-berkas');
    }
}
