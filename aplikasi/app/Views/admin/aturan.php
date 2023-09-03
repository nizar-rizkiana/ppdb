<?= $this->extend('admin/template/layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
<div class="col-md-12">
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTambahLabel">Tambah Data</h5>
            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>/admin/aturan/simpan" method="post">
                <?php csrf_token(); ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="kodeAturan">Kode Aturan</label>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('kode_aturan')) ? 'is-invalid' : '' ?>" id="kodeAturan" type="text" placeholder="Contoh: A01" name="kode_aturan" required value="<?= old('kode_aturan') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_aturan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="namaKerusakan">Nama Kerusakan</label>
                        <div class="col-sm-8">
                            <select class="form-select <?= ($validation->hasError('kode_kerusakan')) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="kode_kerusakan">
                                <?php foreach($kerusakan as $k) : ?>
                                <option value="<?= $k['kode_kerusakan'] ?>"><?= $k['nama_kerusakan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kode_kerusakan'); ?>
                            </div>
                        </div>
                    </div>
                    <p>Gejala</p>
                    <div class="mb-3">
                        <?php foreach($gejala as $g) : ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineCheckbox<?= $g['id_gejala'] ?>" type="checkbox" value="<?= $g['kode_gejala'] ?>" name="kode_gejala[]">
                            <label class="form-check-label" for="inlineCheckbox<?= $g['id_gejala'] ?>"><?= $g['gejala']." (".$g['kode_gejala'].")" ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    <?php if(session()->getFlashdata('gagal')) : ?>
    <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('gagal'); ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('berhasil')) : ?>
    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('berhasil'); ?></div>
    <?php endif; ?>
    <button class="btn btn-primary mb-4" type="button" data-coreui-toggle="modal" data-coreui-target="#modalTambah">Tambah Data</button>
    <div class="card mb-4">
      <div class="card-header">Data Kerusakan</div>
      <div class="card-body">
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Aturan</th>
                    <th scope="col">Kode Gejala</th>
                    <th scope="col">Kode Kerusakan</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($aturan as $a) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $a['kode_aturan']; ?></td>
                    <td><?= $a['kode_gejala']; ?></td>
                    <td><?= $a['nama_kerusakan'].' ('.$a['kode_kerusakan'].')'; ?></td>
                    <td>
                    <div class="modal fade" id="modalEdit<?= $a['id_aturan'] ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $a['id_aturan'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel<?= $a['id_aturan'] ?>">Tambah Data</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url() ?>/admin/aturan/update/<?= $a['id_aturan'] ?>" method="post">
                                <?php csrf_token(); ?>
                                <div class="modal-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="kodeAturan">Kode Aturan</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?= ($validation->hasError('ekode_aturan')) ? 'is-invalid' : '' ?>" id="kodeAturan" type="text" placeholder="Contoh: A01" name="ekode_aturan" required value="<?= (old('ekode_aturan')) ? old('ekode_aturan') : $a['kode_aturan'] ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ekode_aturan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="namaKerusakan">Nama Kerusakan</label>
                                        <div class="col-sm-8">
                                            <select class="form-select <?= ($validation->hasError('ekode_kerusakan')) ? 'is-invalid' : '' ?>" aria-label="Default select example" name="ekode_kerusakan">
                                            
                                                <?php foreach($kerusakan as $k) : ?>
                                                    <option value="<?= $k['kode_kerusakan'] ?>" <?= ($k['kode_kerusakan'] == $a['kode_kerusakan']) ? 'selected' : '' ?>><?= $k['nama_kerusakan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ekode_karusakan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Gejala Terpilih</p>
                                    <div class="mb-3">
                                        <?php foreach($gejala as $g) : ?>
                                            <?php for($i = 0; $i<= count(json_decode($a['kode_gejala']))-1; $i++) : ?>
                                            <?php if($g['kode_gejala'] == json_decode($a['kode_gejala'])[$i]) : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineCheckbox<?= $g['id_gejala'] ?>" type="checkbox" value="<?= $g['kode_gejala'] ?>" name="kode_gejala[]" <?= ($g['kode_gejala'] == json_decode($a['kode_gejala'])[$i]) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="inlineCheckbox<?= $g['id_gejala'] ?>"><?= $g['gejala']." (".$g['kode_gejala'].")" ?></label>
                                            </div>
                                            <?php endif; ?>
                                            <?php endfor; ?>
                                        <?php endforeach; ?>
                                        
                                    </div>
                                    <p>Semua Gejala</p>
                                    <div class="mb-3">
                                        
                                        <?php foreach($gejala as $gj) : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" id="inlineCheckbox<?= $gj['id_gejala'] ?>" type="checkbox" value="<?= $gj['kode_gejala'] ?>" name="kode_gejala[]">
                                                <label class="form-check-label" for="inlineCheckbox<?= $gj['id_gejala'] ?>"><?= $gj['gejala']." (".$gj['kode_gejala'].")" ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                            
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-coreui-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                        <button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#modalEdit<?= $a['id_aturan'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-pen"></use>
                        </svg>
                        </button>
                        <a class="btn btn-danger" href="<?= base_url() ?>/admin/aturan/delete/<?= $a['id_aturan'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
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