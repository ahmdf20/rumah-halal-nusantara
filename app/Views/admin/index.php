<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

  <div class="row justify-content-between">
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h4>Total Keseluruhan Sertifikat</h4>
          <h5><?= count($sertif) ?></h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h4>Total Sertifikat Sudah Terbit</h4>
          <?php
          $i = 0;
          $t = 0
          ?>
          <?php foreach ($sertif as $sertif) : ?>
            <?php $sertif['sertifikat'] == 'sudah terbit' ? $i += 1 : $i += 0 ?>
            <?php $sertif['sertifikat'] == 'tidak terbit' ? $t += 1 : $t += 0 ?>
          <?php endforeach ?>
          <h5><?= $i ?></h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-body">
          <h4>Total Sertifikat Tidak Terbit</h4>
          <h5><?= $t ?></h5>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>