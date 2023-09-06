<?= $this->extend('/admin/template/layout'); ?>
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
      <div class="card-header">Pengumuman</div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
                <form action="<?= base_url() ?>/kirim-pengumuman" method="post">
                    <?php csrf_token(); ?>
                      <label class="col-sm-4 col-form-label" for="Pesan">Pesan</label>
                      <div class="col-sm-8">
                          <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="10"><?= old('pesan') ?></textarea>
                          <div class="invalid-feedback">
                              <?= $validation->getError('pesan') ?>
                          </div>
                      </div>
                      <label class="col-sm-4 col-form-label" for="file">File</label>
                      <div class="col-sm-8">
                          <input type="file" class="form-control-file" name="file">
                          <div class="invalid-feedback">
                              <?= $validation->getError('file') ?>
                          </div>
                      </div>
                      <br>
                      <br>
                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </form>
            </div>
            <!-- /.row-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->
<?= $this->endSection(); ?>