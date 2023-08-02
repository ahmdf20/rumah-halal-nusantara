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

          <form action="/user/ubah-password/<?= $user['id'] ?>" method="post" enctype="multipart/form-data" class="user">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-3">
              <label for="nama" class="label">Nama Admin</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
            </div>
            <?php if ($user['id'] == $auth['id']) : ?>
              <div class="form-group mb-3">
                <label for="old-password" class="label">Password Lama</label>
                <input type="password" name="old-password" id="old-password" class="form-control" required>
              </div>
            <?php endif ?>
            <div class="form-group mb-3">
              <label for="password" class="label">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="repeat_password" class="label">Ulangi Password</label>
              <input type="password" name="repeat_password" id="repeat_password" class="form-control">
            </div>
            <div class="d-flex justify-content-between form-group mb-3">
              <button type="submit" class="btn btn-md btn-success">Ubah</button>
              <a href="<?= $auth['id'] == $user['id'] ? '/profile/' . $auth['id'] : '/user' ?>" class="btn btn-md btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>