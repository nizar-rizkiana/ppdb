<?= $this->extend('admin/template/layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
  <div class="col-md-12">
    
    <?php if(session()->getFlashdata('gagal')) : ?>
    <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('gagal'); ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('berhasil')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('berhasil'); ?></div>
    <?php endif; ?>
    <div class="card mb-4">
      <div class="card-header">Data Peserta Baru</div>
      <div class="card-body">
        <div class="row">
            <table class="table table-striped" id="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($peserta as $p) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $p['nisn']; ?></td>
                    <td><?= $p['nama_lengkap']; ?></td>
                    <td><?= ($p['jenis_kelamin'] == 'l') ? 'Laki-laki' : 'Perempuan'; ?></td>
                    <td><?= $p['no_hp']; ?></td>
                    <td>
                    <div class="modal fade" id="modalDetail<?= $p['id_peserta'] ?>" tabindex="-1" aria-labelledby="modalDetailLabel<?= $p['id_peserta'] ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalDetailLabel<?= $p['id_peserta'] ?>">Detail Peserta</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <?= form_open('/peserta/editBerkas/'.$p['id_peserta'], ['enctype' => 'multipart/form-data']) ?>
                            <?php csrf_token() ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 col-12">
                                    <table class="table table-striped bordered bg-white">
                                        <tr>
                                        <th scope="row">No Pendaftaran</th>
                                        <td>:</td>
                                        <td><?= $p['id_peserta'] ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Tanggal Daftar</th>
                                        <td>:</td>
                                        <td><?= date('d-m-Y', strtotime($p['created_at'])) ?></td>
                                        </tr>
                                        <tr>
                                        <th scope="row">NISN</th>
                                        <td>:</td>
                                        <td>
                                            <input type="number" name="nisn" class="form-control" value="<?= $p['nisn'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $p['nama_lengkap'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td>:</td>
                                        <td>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                                <option value="l" <?= ($p['jenis_kelamin'] == 'l') ? 'selected' : '' ?>>Laki-laki</option>
                                                <option value="p" <?= ($p['jenis_kelamin'] == 'p') ? 'selected' : '' ?>>Perempuan</option>
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">No HP/WhatsApp</th>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="no_hp" class="form-control" value="<?= $p['no_hp'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <td>:</td>
                                            <td>
                                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $p['alamat'] ?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Tempat Lahir</th>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $p['tempat_lahir'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td>:</td>
                                        <td>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $p['tanggal_lahir'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Berat Badan</th>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="berat_badan" name="berat_badan" required value="<?= old('berat_badan', $p['berat_badan']) ?>" placeholder="Berat Badan">
                                                    <span class="input-group-text">KG</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tinggi Badan</th>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="tinggi_badan" name="tinggi_badan" required value="<?= old('tinggi_badan', $p['tinggi_badan']) ?>" placeholder="Tinggi Badan">
                                                    <span class="input-group-text">CM</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Desa</th>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="desa" class="form-control" value="<?= $p['desa'] ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Asal sekolah</th>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="asal_sekolah" class="form-control" value="<?= $p['asal_sekolah'] ?>">
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Pilihan Pertama</th>
                                        <td>:</td>
                                        <td>
                                            <select name="pilihan_pertama" id="pilihan_pertama" class="form-select" required>
                                                <option value="<?= $p['pilihan_pertama'] ?>" selected><?= $p['pilihan_pertama'] ?></option>
                                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                                <option value="Teknik Geologi Pertambangan">Teknik Geoglogi Pertambangan</option>
                                                <option value="Teknik Elektronika">Teknik Elektronika</option>
                                                <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
                                                <option value="Teknik Jaringan dan Telekomunikasi">Teknik Jaringan dan Telekomunikasi</option>
                                                <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                                <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Pilihan Kedua</th>
                                        <td>:</td>
                                        <td>
                                            <select name="pilihan_kedua" id="pilihan_kedua" class="form-select" required>
                                                <option value="<?= $p['pilihan_kedua'] ?>" selected><?= $p['pilihan_kedua'] ?></option>
                                                <option value="Teknik Otomotif">Teknik Otomotif</option>
                                                <option value="Teknik Geologi Pertambangan">Teknik Geoglogi Pertambangan</option>
                                                <option value="Teknik Elektronika">Teknik Elektronika</option>
                                                <option value="Teknik Kimia Industri">Teknik Kimia Industri</option>
                                                <option value="Teknik Jaringan dan Telekomunikasi">Teknik Jaringan dan Telekomunikasi</option>
                                                <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                                <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                        <th scope="row">Diterima di jurusan</th>
                                        <td>:</td>
                                        <td><?= $p['diterima'] ?></td>
                                        </tr>
                                        <tr>
                                        <td colspan="3">Status Pendaftaran Anda : <span class="badge bg-primary">Seleksi</span></td>
                                        </tr>
                                    </table>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="mb-3">
                                            <label for="foto" class="form-label">Pas Photo</label>
                                            <br><a href="<?= base_url(); ?>/foto/<?= $p['foto'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="foto" id="foto" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="ktp_ibu" class="form-label">KTP Ibu</label>
                                            <br><a href="<?= base_url(); ?>/ktp_ibu/<?= $p['ktp_ibu'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="ktp_ibu" id="ktp_ibu" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="ktp_bpk" class="form-label">KTP Bapak</label>
                                            <br><a href="<?= base_url(); ?>/ktp_bpk/<?= $p['ktp_bpk'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="ktp_bpk" id="ktp_bpk" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="kk" class="form-label">Kartu Keluarga</label>
                                            <br><a href="<?= base_url(); ?>/kk/<?= $p['kk'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="kk" id="kk" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="akta_kelahiran" class="form-label">Akta Kelahiran</label>
                                            <br><a href="<?= base_url(); ?>/akta_kelahiran/<?= $p['akta_kelahiran'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="akta_kelahiran" id="akta_kelahiran" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="ijazah" class="form-label">Ijazah</label>
                                            <br><a href="<?= base_url(); ?>/ijazah/<?= $p['ijazah'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="ijazah" id="ijazah" class="form-control" required> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="raport" class="form-label">Raport</label>
                                            <br><a href="<?= base_url(); ?>/raport/<?= $p['raport'] ?>" target="_blank" class="btn btn-primary">Lihat Berkas</a>
                                            <!-- <input type="file" name="raport" id="raport" class="form-control" required> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            <?= form_close(); ?>
                        </div>
                        </div>
                    </div>
                    
                    <!-- modal penerimaan -->
                    <div class="modal fade" id="modalTerima<?= $p['id_peserta'] ?>" tabindex="-1" aria-labelledby="modalTerimaLabel<?= $p['id_peserta'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalTerimaLabel<?= $p['id_peserta'] ?>">Detail Peserta</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url() ?>/admin/peserta/terima/<?= $p['id_peserta']; ?>" method="post">
                            <input type="hidden" name="status" value="3">    
                            <input type="hidden" name="no_hp" value="<?= $p['no_hp'] ?>">    
                            <input type="hidden" name="nama_lengkap" value="<?= $p['nama_lengkap'] ?>">    
                            <div class="modal-body">
                                <table class="table table-striped bordered bg-white">
                                <tr>
                                <th scope="row">No Pendaftaran</th>
                                <td>:</td>
                                <td><?= $p['id_peserta'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Tanggal Daftar</th>
                                <td>:</td>
                                <td><?= date('d-m-Y', strtotime($p['created_at'])) ?></td>
                                </tr>
                                <tr>
                                <th scope="row">NISN</th>
                                <td>:</td>
                                <td><?= $p['nisn'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td>:</td>
                                <td><?= $p['nama_lengkap'] ?></td>
                                </tr>
                                <th scope="row">Pilihan Pertama</th>
                                <td>:</td>
                                <td><?= $p['pilihan_pertama'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Pilihan Kedua</th>
                                <td>:</td>
                                <td><?= $p['pilihan_kedua'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Diterima di jurusan</th>
                                <td>:</td>
                                <td>
                                    <select name="diterima" id="diterima" required class="form-select">
                                        <option value="" selected disabled>-- Pilih Jurusan</option>
                                        <option value="<?= $p['pilihan_pertama'] ?>"><?= $p['pilihan_pertama'] ?></option>
                                        <option value="<?= $p['pilihan_kedua'] ?>"><?= $p['pilihan_kedua'] ?></option>
                                    </select>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="3">Status Pendaftaran Anda : <span class="badge bg-primary">Seleksi</span></td>
                                </tr>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Tutup</button>
                                <button class="btn btn-primary" type="submit" >Terima</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                        <button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#modalDetail<?= $p['id_peserta'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                        </svg>
                        </button>
                        <button class="btn btn-success" data-coreui-toggle="modal" data-coreui-target="#modalTerima<?= $p['id_peserta'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                        </svg>
                        </button>
                        <!-- <form action="<?= base_url() ?>/admin/peserta/update/<?= $p['id_peserta']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="status" value="3">
                            <input type="hidden" name="diterima" value="">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?');">
                            <svg class="icon">
                                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                            </svg>
                            </button>
                        </form> -->
                        <form action="<?= base_url() ?>/admin/peserta/update/<?= $p['id_peserta']; ?>" method="post" class="d-inline">
                            <input type="hidden" name="status" value="4">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">
                            <svg class="icon">
                                <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                            </svg>
                            </button>
                        </form>
                        <a href="https://wa.me/<?= $p['no_hp'] ?>" class="btn btn-success" target="_blank">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-phone"></use>
                        </svg>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- /.row-->
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->
<?= $this->endSection(); ?>