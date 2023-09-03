<?= $this->extend('/admin/template/layout'); ?>
<?= $this->section('content'); ?>

<div class="row">
  <!-- /.col-->
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-primary">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold"><?= $admin; ?></div>
          <div>Admin</div>
        </div>
        <svg class="card-icon" style="opacity:0.4;">
          <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
        </svg>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <!-- /.col-->
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-warning">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold"><?= $peserta ?></div>
          <div>Peserta</div>
        </div>
        <svg class="card-icon" style="opacity:0.4;">
          <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-group"></use>
        </svg>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <!-- /.col-->
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-success">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold"><?= $diterima; ?></div>
          <div>Diterima</div>
        </div>
        <svg class="card-icon" style="opacity:0.4;">
          <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
        </svg>
      </div>
    </div>
  </div>
  <!-- /.col-->
  <div class="col-sm-6 col-lg-3">
    <div class="card mb-4 text-white bg-danger">
      <div class="card-body pb-0 d-flex justify-content-between align-items-start">
        <div>
          <div class="fs-4 fw-semibold"><?= $ditolak; ?></div>
          <div>Ditolak</div>
        </div>
        <svg class="card-icon" style="opacity:0.4;">
          <use xlink:href="<?= base_url() ?>/vendors/@coreui/icons/svg/free.svg#cil-x"></use>
        </svg>
      </div>
    </div>
  </div>
  <!-- /.col-->
</div>
<!-- /.row-->
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header">Dashboard</div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="row">
            
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