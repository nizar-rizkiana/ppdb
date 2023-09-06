<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\AdminModel;

class Pengumuman extends BaseController
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
        $data = [
            'title' => 'PPDB | Pengumuman',
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/pengumuman', $data);
    }

    public function whatsapp($pesan)
    {
        $peserta = $this->pesertaModel->select('no_hp')->where('status',3)->findAll();
        $target = '';
        foreach($peserta as $p)
        {
            $target .= $p['no_hp'].',';
        }
        $target .= '6283834914189';
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
                'target' => $target,
                'message' => $pesan,
                'url' => 'https://md.fonnte.com/images/logo-dashboard.png',
                'delay' => '2',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: +gCiqiemdr4igURy#qzL' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function pengumuman(){
        $pesan = $this->request->getVar('pesan');
        // menyimpan file ijazah
        $file = $this->request->getFile('file');
        // $namaFile = $file->getRandomName();
        // $file->move('pengumuman', $namaFile);
        $this->whatsapp($pesan);
        session()->setFlashdata('berhasil', 'Pengumuman berhasil di kirim');
        return redirect()->to('/pengumuman');
    } 
}
