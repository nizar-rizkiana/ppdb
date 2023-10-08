<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $AdminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        return view('admin/login');
    }

    public function login()
    {
        $admins = $this->adminModel;
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $dataadmin = $admins->where(['email' => $email])->first();
        if($dataadmin) {
            if(password_verify($password, $dataadmin['password'])) {
                session()->set([
                    'id_admin' => $dataadmin['id_admin'],
                    'nama_admin' => $dataadmin['nama_admin'],
                    'email_admin' => $dataadmin['email'],
                    'logged_in_admin' => true
                ]);
                return redirect()->to('/dashboard');
            }else{
                session()->setFlashdata('gagal', 'Email atau Password salah');
                return redirect()->to('/auth');
            }
        } else {
            session()->setFlashdata('gagal', 'Email atau Password salah');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }

    public function tambahadmin()
    {
        $admin = $this->adminModel->findAll();
        $data = [
            'title' => 'Admin | Tambah admin',
            'admin' => $admin,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/tambah-admin', $data);
    }

    public function register()
    {
        if(!$this->validate([
            'nama_admin' => [
                'rules' => 'is_unique[tb_admin.nama_admin]',
                    'errors' => [
                        'is_unique' => 'Nama sudah terdaftar'
                    ]
            ],
            'email' => [
                'rules' => 'is_unique[tb_admin.email]',
                    'errors' => [
                        'is_unique' => 'Email sudah terdaftar'
                    ]
            ],
            'password' => [
                'rules' => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi'
                    ]
            ],
            'password2' => [
                'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Konfirmasi password tidak boleh kosong',
                        'matches' => 'konfirmasi password tidak sesuai'
                    ]
            ],
        ]))
        {
            session()->setFlashdata('gagal', 'Gagal menambahkan data');
            return redirect()->to('/tambah-admin')->withInput();
        }

        $this->adminModel->save([
            'nama_admin' => $this->request->getVar('nama_admin'),
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/tambah-admin');
    }

    public function update($id)
    {
        $dataLama = $this->adminModel->where(['id_admin' => $id])->first();

        if($dataLama['nama_admin'] != $this->request->getVar('nama_admin'))
        {
            $ruleNama = 'required|is_unique[tb_admin.nama_admin]';
        }else{
            $ruleNama = 'required';
        }

        if($dataLama['email'] != $this->request->getVar('email'))
        {
            $ruleEmail = 'required|is_unique[tb_admin.email]';
        }else{
            $ruleEmail = 'required';
        }

        if(!$this->validate([
            'nama_admin' => [
                'rules' => $ruleNama,
                    'errors' => [
                        'is_unique' => 'Nama sudah terdaftar'
                    ]
            ],
            'email' => [
                'rules' => $ruleEmail,
                    'errors' => [
                        'is_unique' => 'Email sudah terdaftar'
                    ]
            ],
            'password2' => [
                'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'konfirmasi password tidak sesuai'
                    ]
            ],
        ]))
        {
            session()->setFlashdata('gagal', 'Gagal merubah data');
            return redirect()->to('/tambah-admin')->withInput();
        }

        if(!empty($this->request->getVar('password')))
        {
            $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        }else{
            $password = $dataLama['password'];
        }

        $this->adminModel->update($id, [
            'nama_admin' => $this->request->getVar('nama_admin'),
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level'),
            'password' => $password
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/tambah-admin');
    }

    public function delete($id)
    {
        $this->adminModel->delete($id);
        session()->setFlashdata('berhasil', 'Data berhasil dihapus');
        return redirect()->to('/tambah-admin');
    }
}
