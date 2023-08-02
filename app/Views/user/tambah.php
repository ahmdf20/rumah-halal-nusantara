<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">

          <?php if (session()->has('alert')) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('alert') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <form action="/user/store" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
              <label for="nama" class="label">Nama Admin</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= old('nama') ?>">
            </div>
            <div class="form-group mb-3">
              <label for="email" class="label">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="<?= old('email') ?>">
            </div>
            <div class="form-group mb-3">
              <label for="password" class="label">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="d-flex justify-content-between form-group mb-3">
              <button type="submit" class="btn btn-md btn-success">Tambah</button>
              <a href="/user" class="btn btn-md btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>