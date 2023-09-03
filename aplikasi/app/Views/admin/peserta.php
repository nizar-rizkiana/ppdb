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
                    <th scope="col">Status</th>
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
                    <td><span class="badge <?= ($p['status'] == 3) ? 'bg-success' : 'bg-danger' ?>"><?= ($p['status'] == 3) ? 'Diterima' : 'Ditolak' ?></span></td>
                    <td>
                    <div class="modal fade" id="modalDetail<?= $p['id_peserta'] ?>" tabindex="-1" aria-labelledby="modalDetailLabel<?= $p['id_peserta'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalDetailLabel<?= $p['id_peserta'] ?>">Detail Peserta</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
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
                                <tr>
                                <th scope="row">Jenis Kelamin</th>
                                <td>:</td>
                                <td><?= ($p['jenis_kelamin'] == 'l') ? 'Laki-laki' : 'Perempuan' ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Tempat Lahir</th>
                                <td>:</td>
                                <td><?= $p['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td>:</td>
                                <td><?= date('d-m-Y', strtotime($p['tanggal_lahir'])) ?></td>
                                </tr>
                                <tr>
                                <th scope="row">No HP/WhatsApp</th>
                                <td>:</td>
                                <td><?= $p['no_hp'] ?></td>
                                </tr>
                                <tr>
                                <th scope="row">Asal sekolah</th>
                                <td>:</td>
                                <td><?= $p['asal_sekolah'] ?></td>
                                </tr>
                                <tr>
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
                                <td><?= $p['diterima'] ?></td>
                                </tr>
                                <tr>
                                <td colspan="3">Status Pendaftaran Anda : <span class="badge <?= ($p['status'] == 3) ? 'bg-success' : 'bg-danger' ?>"><?= ($p['status'] == 3) ? 'Diterima' : 'Ditolak' ?></span></td>
                                </tr>
                            </table>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                    </div>
                        <button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#modalDetail<?= $p['id_peserta'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                        </svg>
                        </button>
                        <a href="<?= base_url() ?>/kartu-pendaftaran/<?= $p['id_peserta'] ?>" class="btn btn-success" target="_blank">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
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