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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= session()->getFlashdata('alert') ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <form action="/profile/update/<?= $auth['id'] ?>" method="post">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-3">
              <label for="nama" class="label">Nama</label>
              <input type="text" name="nama" id="nama" class="form-control" value="<?= $auth['nama'] ?>">
            </div>
            <div class="form-group mb-3">
              <label for="email" class="label">Email</label>
              <input type="text" name="email" id="email" class="form-control" value="<?= $auth['email'] ?>">
            </div>
            <div class="d-flex justify-content-between form-group">
              <button type="submit" class="btn btn-md btn-success">Edit</button>
              <a href="/profile/<?= $auth['id'] ?>" class="btn btn-md btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>