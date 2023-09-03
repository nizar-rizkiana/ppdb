<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('user/login');
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('user/register', $data);
    }

    public function login()
    {
        $users = $this->userModel;
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $dataUser = $users->where(['email' => $email])->first();
        if($dataUser) {
            if(password_verify($password, $dataUser['password'])) {
                session()->set([
                    'id_user' => $dataUser['id_user'],
                    'username_user' => $dataUser['username'],
                    'email_user' => $dataUser['email'],
                    'logged_in_user' => true
                ]);
                return redirect()->to('/');
            }else{
                session()->setFlashdata('gagal', 'Email atau Password salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('gagal', 'Email atau Password salah');
            return redirect()->to('/');
        }
    }

    public function proses()
    {
        if(!$this->validate([
            'username' => [
                'rules' => 'is_unique[tb_user.username]',
                    'errors' => [
                            'is_unique' => 'Username sudah terdaftar'
                    ]
            ],
            'email' => [
                'rules' => 'is_unique[tb_user.email]',
                    'errors' => [
                            'is_unique' => 'Email sudah terdaftar'
                    ]
            ],
			'password' => [
				'rules' =>'required|min_length[6]|max_length[15]',
					'errors' => [
							'required' => '{field} tidak boleh kosong',
							'min_length' => 'panjang {field} minimal 6 karakter',
							'max_length' => 'panjang {field} maximal 15 karakter'
					]
			],
			'confirm_password' => [
				'rules' => 'required|matches[password]',
					'errors' => [
							'required' => 'Konfirmasi password tidak boleh kosong',
							'matches' => 'konfirmasi password tidak sesuai'
					]
			],
        ]))
        {
            return redirect()->to('/register')->withInput();
        }

        $this->userModel->save([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT) 
        ]);
        session()->setFlashdata('berhasil', 'Akun berhasi dibuat, silahkan login');
        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
