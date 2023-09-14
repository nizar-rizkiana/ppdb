<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    #main {
      background-image: url('<?= base_url(); ?>/assets/img/WEBSITE/BACKGROUND.png');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    /* .modal {
      width: 100%;
      height: 100%;
      position: relative;
      padding: 5% auto;
      text-align: center;
      background: url("https://images.unsplash.com/photo-1458682625221-3a45f8a844c7?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=71fe1cccc16ab8dbd431de076c68802b") no-repeat center;
      background-size: cover;
    } */

    .modal-content {
      background: rgba(255, 255, 255, .2);
      /* background: url("sekolah.jpg") no-repeat;
      background-size: cover;
      background-attachment: fixed;
      background-position: 50%; */
    }

    .modal-content:before {
      content: "";
      width: 100%;
      height: 100%;
      position: absolute;
      z-index: -1;
      background: url("<?= base_url(); ?>/assets/img/WEBSITE/BACKGROUND.png") no-repeat;
      background-size: cover;
      background-attachment: fixed;
      background-position: 50%;
      -webkit-backface-visibility: hidden;
      -webkit-transform-style: preserve-3d;
      -webkit-transform: translate3d(0, 0, 0);
      filter: blur(4px)
    }

    label {
      font-weight: bold;
    }

    /* css animasi */
    .img-btn{
  transition: all 0.5s;
}
.btn-utama:hover .img-btn{
  animation: shake 0.5s linear 1
}
@keyframes shake {
  33%{
    transform: rotate(10deg);
  }
  66%{
    transform: rotate(-10deg);
  }
  100%{
    transform: rotate(0deg);
  }
}
  </style>
</head>

<body>
  <!-- nvabar desktop -->
  <nav class="d-none d-md-block navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #007cd5;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/LOGO PPDB.png" alt="" width="100px">
      </a>
      <div class="ms-auto">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/LOGO SMK.png" alt="" width="180px">
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> -->
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
          <!-- <a class="nav-link" href="#">Tentang</a> -->
          <a class="nav-link active" href="<?= base_url() ?>/auth">Login</a>
          <a class="nav-link active" href="https://wa.me/6288223903009?text=*SMKN4#">Kontak</a>
        <!-- </div> -->
      </div>
    </div>
  </nav>

  <!-- navbar mobile -->
  <nav class="d-md-none d-block navbar navbar-expand-lg navbar-light" style="background-color: #007cd5;">
    <div class="container-fluid">
      <a class="navbar-brand ms-5" href="#">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/LOGO SMK.png" alt="" width="180px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-white" href="<?= base_url() ?>/auth">Login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-white" href="https://wa.me/6283834914189?text=*SMKN4#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="main" class="container-fluid vh-100 vw-100 d-flex flex-column justify-content-center align-items-center">
    <div class="text-center w-100 w-md-50">
    <?php if(session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success w-100 w-md-50 mx-auto" role="alert">
        <?= session()->getFlashdata('berhasil'); ?>
        </div>
    <?php endif; ?>
        <?php if(session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger w-100 w-md-50 mx-auto" role="alert">
        <?= session()->getFlashdata('gagal'); ?>
        </div>
    <?php endif; ?>
      <!-- <h1 class="text-white">WEBSITE PENERIMAAN PESERTA DIDIK BARU</h1> -->
      <img src="<?= base_url() ?>/assets/img/WEBSITE/LOGO PPDB.png" alt="" style="max-width: 100%">
    </div>
    <br>
    <br>
    <br>
    <div class="text-center">
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary px-4 rounded-pill border-white" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        pendaftaran
      </button> -->
      <a href="javascript:void(0)" class="btn-utama" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/BOTTON PENDAFTARAN.png" alt="" class="img-btn me-0 me-md-4 mb-4 mb-md-0">
      </a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-0">
          <div class="modal-content h-100">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir pendaftaran</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('/dashboard/pendaftaran', ['enctype' => 'multipart/form-data']) ?>
            <?php csrf_token() ?>
            <div class="modal-body text-start">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" name="nisn" id="nisn" class="form-control <?= (!empty($validation->hasError('nisn'))) ? 'is-invalid' : '' ?>" placeholder="1234567890" required value="<?= old('nisn') ?>">
                    <div class="invalid-feedback fw-bold">
                        <?= $validation->getError('nisn') ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="nama lengkap" required value="<?= old('nama_lengkap') ?>">
                  </div>
                  <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP/WhatsApp</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control <?= (!empty($validation->hasError('no_hp'))) ? 'is-invalid' : '' ?>" placeholder="628xxxxx" required value="<?= old('no_hp') ?>">
                    <div id="emailHelp" class="form-text">Nomor harus di awali dengan 62</div>
                    <div class="invalid-feedback fw-bold">
                        <?= $validation->getError('no_hp') ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="l" <?= (old('jenis_kelamin') == 'l') ? 'selected' : '' ?>>Laki-laki</option>
                      <option value="p" <?= (old('jenis_kelamin') == 'p') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="desa" class="form-label">Nama Desa</label>
                    <input type="text" name="desa" id="desa" class="form-control" placeholder="desa..">
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"
                      placeholder="alamat lengkap" required><?= old('alamat') ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="tempat lahir.." required value="<?= old('tempat_lahir') ?>">
                  </div>
                  <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required value="<?= old('tanggal_lahir') ?>">
                  </div>
                  <div class="mb-3">
                    <label for="berat_badan" class="form-label">Berat Badan</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="berat_badan" name="berat_badan" required value="<?= old('berat_badan') ?>" placeholder="Berat Badan">
                      <span class="input-group-text">KG</span>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" required value="<?= old('tinggi_badan') ?>" placeholder="Tinggi Badan">
                      <span class="input-group-text">CM</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="mb-3">
                    <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" id="asal-sekolah" class="form-control" placeholder="Asal sekolah" required value="<?= old('asal_sekolah') ?>">
                  </div>
                  <div class="mb-3">
                    <label for="pilihan_pertama" class="form-label">Pilihan Pertama</label>
                    <select name="pilihan_pertama" id="pilihan_pertama" class="form-select" required>
                      <option value="" selected disabled>-- Pilih Jurusan --</option>
                      <option value="Teknik Otomotif" >Teknik Otomotif</option>
                      <option value="Teknik Geologi Pertambangan">Teknik Geoglogi Pertambangan</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
                      <option value="Teknik Jaringan dan Telekomunikasi">Teknik Jaringan dan Telekomunikasi</option>
                      <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                      <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                      <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="pilihan_kedua" class="form-label">Pilihan Kedua</label>
                    <select name="pilihan_kedua" id="pilihan_kedua" class="form-select" required>
                      <option value="" selected disabled>-- Pilih Jurusan --</option>
                      <option value="Teknik Otomotif">Teknik Otomotif</option>
                      <option value="Teknik Geologi Pertambangan">Teknik Geoglogi Pertambangan</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
                      <option value="Teknik Jaringan dan Telekomunikasi">Teknik Jaringan dan Telekomunikasi</option>
                      <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                      <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                      <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="foto" class="form-label">Pas Photo</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ktp_ibu" class="form-label">KTP Ibu</label>
                    <input type="file" name="ktp_ibu" id="ktp_ibu" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ktp_bpk" class="form-label">KTP Bapak</label>
                    <input type="file" name="ktp_bpk" id="ktp_bpk" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="kk" class="form-label">Kartu Keluarga</label>
                    <input type="file" name="kk" id="kk" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="akta_kelahiran" class="form-label">Akta Kelahiran</label>
                    <input type="file" name="akta_kelahiran" id="akta_kelahiran" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ijazah" class="form-label">Ijazah</label>
                    <input type="file" name="ijazah" id="ijazah" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="raport" class="form-label">Raport</label>
                    <input type="file" name="raport" id="raport" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?= form_close(); ?>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary ms-3 px-4 rounded-pill border-white" data-bs-toggle="modal"
        data-bs-target="#exampleModal1">
        Cek Kelulusan
      </button> -->
      <a href="javascript:void(0)" class="btn-utama" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/BOTTON CEK KELULUSAN.png" alt="" class="ms-md-4 m-0 img-btn">
      </a>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mt-0">
          <div class="modal-content vh-100">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Cek Kelulusan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
              <input id="cek" type="search" class="form-control w-100" placeholder="Masukkan NISN">
              <hr>
              <div id="hasil">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <br>
      <br>
      <a href="https://wa.me/6288223903009?text=*SMKN4#" class="btn-utama">
        <img src="<?= base_url() ?>/assets/img/WEBSITE/CHT INTERAKTIF.png" alt="" class="img-btn me-0 me-md-4 mb-4 mb-md-0">
		  </a>
    </div>

  </div>
  <script src="<?= base_url() ?>/js/jquery-3.5.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>

  <script>
    $('#cek').change(function (e) { 
      e.preventDefault();
      var keyword = $(this).val();
        $.ajax({
          type: "post",
          url: "<?= base_url() ?>/dashboard/cek",
          data: {keyword:keyword},
          dataType: "json",
          success: function (peserta) {
            
            if(peserta == null)
            {
              var html = '<h5 class="bg-white text-center">Data tidak ditemukan</h5>';
              $('#hasil').html(html);
            }else{
              if(peserta.status == 1)
              {
                var status = 'Proses';
                var warna = 'bg-primary';
                var btnLulus = '';
              }else if(peserta.status == 2)
              {
                var status = 'Seleksi';
                var warna = 'bg-info';
                var btnLulus = '';
              }else if(peserta.status == 3)
              {
                var status = 'Diterima';
                var warna = 'bg-success';
                var btnLulus = '&nbsp;&nbsp; <a href="<?= base_url() ?>/keterangan-lulus/'+peserta.id_peserta+'" target="_blank" class="btn btn-sm btn-success">Cetak Kartu Kelulusan</a>';
              }else{
                var status = 'Ditolak';
                var warna = 'bg-danger';
                var btnLulus = '';
              }
              var tanggal = new Date(peserta.created_at);
              var format = tanggal.toLocaleDateString();
              var html = `<table class="table table-striped bordered bg-white">
                          <tr>
                            <th scope="row">No Pendaftaran</th>
                            <td>:</td>
                            <td>`+peserta.id_peserta+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Tanggal Daftar</th>
                            <td>:</td>
                            <td>`+format+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>:</td>
                            <td>`+peserta.nisn+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>:</td>
                            <td>`+peserta.nama_lengkap+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Asal sekolah</th>
                            <td>:</td>
                            <td>`+peserta.asal_sekolah+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Pilihan Pertama</th>
                            <td>:</td>
                            <td>`+peserta.pilihan_pertama+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Pilihan Kedua</th>
                            <td>:</td>
                            <td>`+peserta.pilihan_kedua+`</td>
                          </tr>
                          <tr>
                            <th scope="row">Diterima di jurusan</th>
                            <td>:</td>
                            <td>`+peserta.diterima+`</td>
                          </tr>
                          <tr>
                            <td colspan="3">Status Pendaftaran Anda : <span class="badge `+warna+`">`+status+`</span> &nbsp;&nbsp; <a href="<?= base_url() ?>/kartu-pendaftaran/`+peserta.id_peserta+`" target="_blank" class="btn btn-sm btn-primary">Cetak Kartu</a>`+btnLulus+`</td>
                          </tr>
                        </table>`;
              $('#hasil').html(html);
            }
          }
        });
    });
  </script>
</body>

</html>