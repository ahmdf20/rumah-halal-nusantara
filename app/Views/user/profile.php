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

          <input type="hidden" name="_method" value="PUT">
          <div class="form-group mb-3">
            <label for="nama" class="label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= $auth['nama'] ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="email" class="label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="<?= $auth['email'] ?>" readonly>
          </div>
          <div class="form-group mb-3">
            <label for="created_at" class="label">Bergabung Pada</label>
            <input type="text" name="created_at" id="created_at" class="form-control" value="<?= mb_substr($auth['created_at'], 0, 10)  ?>" readonly>
          </div>
          <?php if ($auth['updated_at']) : ?>
            <div class="form-group mb-3">
              <label for="email" class="label">Diupdate pada</label>
              <input type="text" name="email" id="email" class="form-control" value="<?= mb_substr($auth['created_at'], 0, 10)  ?>" readonly>
            </div>
          <?php endif; ?>
          <div class="d-grid gap-3">
            <a href="/profile/edit/<?= $auth['id'] ?>" class="btn btn-md btn-warning">Edit</a>
            <a href="/user/ubah-password/<?= $auth['id'] ?>" class="btn btn-md btn-warning">Ubah Password</a>
            <a href="/dashboard" class="btn btn-md btn-danger">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>