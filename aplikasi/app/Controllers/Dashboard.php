<?php

namespace App\Controllers;
use App\Models\PesertaModel;

class Dashboard extends BaseController
{
    protected $PesertaModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB | Home',
            'validation' => \Config\Services::validation(),
        ];
        return view('user/index', $data);
    }

    public function whatsapp($nomor, $pesan)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
        'target' => $nomor,
        'message' => $pesan, 
        'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: G4+q2XiN6MZXI6@vfHe!' //change TOKEN to your actual token
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function pendaftaran()
    {
        if(!$this->validate([
            'nisn' => [
                'rules' => 'is_unique[tb_peserta.nisn]',
                    'errors' => [
                        'is_unique' => 'NISN sudah terdaftar',
                    ]
            ],
            'no_hp' => [
                'rules' => 'is_unique[tb_peserta.no_hp]',
                    'errors' => [
                        'is_unique' => 'No HP sudah terdaftar',
                    ]
            ],
        ]))
        {
            session()->setFlashdata('gagal', 'Proses Pendaftaran gagal');
            return redirect()->to('/')->withInput();
        }

        // menyimpan file foto
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('foto', $namaFoto);
        // menyimpan file ktp_ibu
        $fileKtpibu = $this->request->getFile('ktp_ibu');
        $namaKtpibu = $fileKtpibu->getRandomName();
        $fileKtpibu->move('ktp_ibu', $namaKtpibu);
        // menyimpan file ktp_bpk
        $fileKtpbpk = $this->request->getFile('ktp_bpk');
        $namaKtpbpk = $fileKtpbpk->getRandomName();
        $fileKtpbpk->move('ktp_bpk', $namaKtpbpk);
        // menyimpan file kk
        $fileKK = $this->request->getFile('kk');
        $namaKK = $fileKK->getRandomName();
        $fileKK->move('kk', $namaKK);
        // menyimpan file akta kelahiran
        $fileAkta = $this->request->getFile('akta_kelahiran');
        $namaAkta = $fileAkta->getRandomName();
        $fileAkta->move('akta_kelahiran', $namaAkta);
        // menyimpan file ijazah
        $fileIjazah = $this->request->getFile('ijazah');
        $namaIjazah = $fileIjazah->getRandomName();
        $fileIjazah->move('ijazah', $namaIjazah);
        // menyimpan file raport
        $fileRaport = $this->request->getFile('raport');
        $namaRaport = $fileRaport->getRandomName();
        $fileRaport->move('raport', $namaRaport);
        $this->pesertaModel->save([
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
            'foto' => $namaFoto,
            'ktp_ibu' => $namaKtpibu,
            'ktp_bpk' => $namaKtpbpk,
            'kk' => $namaKK,
            'akta_kelahiran' => $namaAkta,
            'ijazah' => $namaIjazah,
            'raport' => $namaRaport,
            'status' => 1
        ]);

        // script kirim whatsapp
        $nomor = $this->request->getVar('no_hp');
        $pesan      =  "*PPDB SMKN 4 PANDEGLANG*, \n\n";
        $pesan      .= "Hai *".$this->request->getVar('nama_lengkap')."* \n\n";
        $pesan      .= "Selamat Data kamu telah tersimpan di Sistem, Untuk Informasi selanjutnya akan kami hubungi kembali..\n\n";
        $pesan      .= "ketik **SMKN4#* untuk kembali ke menu utama \n\n";
        $pesan      .= "Terimakasih";
        $this->whatsapp($nomor, $pesan);

        session()->setFlashdata('berhasil', 'Pendaftaran Berhasil, silahkan periksa pesan dari admin');
        return redirect()->to('/');
    }

    public function cek()
    {
        $peserta = $this->pesertaModel->where('nisn', $this->request->getVar('keyword'))->first();
				echo json_encode($peserta);
    }
}
