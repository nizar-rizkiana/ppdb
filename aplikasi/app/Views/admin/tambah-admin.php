<?= $this->extend('admin/template/layout'); ?>
<?= $this->section('content'); ?>
<div class="row">
<div class="col-md-12">
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTambahLabel">Tambah Data Admin</h5>
            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>/admin/auth/register" method="post">
                <?php csrf_token(); ?>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="nama_admin">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('nama_admin')) ? 'is-invalid' : '' ?>" id="nama_admin" type="text" placeholder="nama lengkap" name="nama_admin" required value="<?= old('nama_admin') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_admin') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="level">Status</label>
                        <div class="col-sm-8">
                            <select name="level" id="level" class="form-select" required>
                                <option value="1">Admin</option>
                                <option value="2">Kepala Sekolah</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="email">Email</label>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" type="email" placeholder="email.." name="email" required value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="password">Password</label>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" type="password" placeholder="password.." name="password" required value="<?= old('password') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label" for="password2">Ulang Password</label>
                        <div class="col-sm-8">
                            <input class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '' ?>" id="password2" type="password" placeholder="ulang password.." name="password2" required value="<?= old('password2') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('password2') ?>
                            </div>
                        </div>
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
      <div class="card-header">Data Admin</div>
      <div class="card-body">
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($admin as $a) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $a['nama_admin']; ?></td>
                    <td><?= $a['email']; ?></td>
                    <td><?=  ($a['level'] == 1) ? 'Admin' : 'Kepala Sekolah' ?></td>
                    <td>
                    <div class="modal fade" id="modalEdit<?= $a['id_admin'] ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $a['id_admin'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel<?= $a['id_admin'] ?>">Update Data</h5>
                            <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="<?= base_url() ?>/admin/auth/update/<?= $a['id_admin'] ?>" method="post">
                                <?php csrf_token(); ?>
                                <div class="modal-body">
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="nama_admin">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?= ($validation->hasError('nama_admin')) ? 'is-invalid' : '' ?>" id="nama_admin" type="text" placeholder="nama lengkap" name="nama_admin" required value="<?= old('nama_admin', $a['nama_admin']) ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_admin') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="level">Status</label>
                                        <div class="col-sm-8">
                                            <select name="level" id="level" class="form-select" required>
                                                <option value="1" <?= ($a['level'] == 1) ? 'required' : '' ?>>Admin</option>
                                                <option value="2" <?= ($a['level'] == 2) ? 'required' : '' ?>>Kepala Sekolah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="email">Email</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>" id="email" type="text" placeholder="email.." name="email" required value="<?= old('email', $a['email']) ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="password">Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>" id="password" type="password" placeholder="password.." name="password" value="<?= old('password') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-4 col-form-label" for="password2">Ulang Password</label>
                                        <div class="col-sm-8">
                                            <input class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '' ?>" id="password2" type="password" placeholder="ulang password.." name="password2" value="<?= old('password2') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password2') ?>
                                            </div>
                                        </div>
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
                        <button class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#modalEdit<?= $a['id_admin'] ?>">
                        <svg class="icon">
                            <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-pen"></use>
                        </svg>
                        </button>
                        <a class="btn btn-danger" href="<?= base_url() ?>/admin/auth/delete/<?= $a['id_admin'] ?>">
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