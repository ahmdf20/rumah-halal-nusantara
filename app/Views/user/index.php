<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <?php if (session()->has('alert')) : ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('alert') ?>
    </div>
  <?php endif ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-5">
        <h4 class="m-0 font-weight-bold text-primary">Akun Admin</h4>
        <a href="/user/tambah" class="btn btn-sm btn-success">Tambah Data</a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="user" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Bergabung pada</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($akun as $a) : ?>
              <?php if ($a['email'] != 'admin@admin.com') : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $a['nama'] ?></td>
                  <td><?= $a['email'] ?></td>
                  <td><?= $a['created_at'] ?></td>
                  <td>
                    <a href="/user/ubah-password/<?= $a['id'] ?>" class="btn btn-sm btn-warning">Ubah Password</a>
                    <a href="/sertifikasi/detail/<?= $a['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                  </td>
                </tr>
              <?php endif ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#user').DataTable()
  })
</script>
<!-- /.container-fluid -->
<?= $this->endSection() ?>