<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Tambah Data</h1>

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

          <h4>Edit Data Sertifikasi</h4>
          <form action="/sertifikasi/update/<?= $sertif['id'] ?>" method="post" enctype="multipart/form-data" class="user">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-3">
              <label for="nama_umkm" class="label">Nama UMKM</label>
              <input type="text" name="nama_umkm" id="nama_umkm" class="form-control" value="<?= $sertif['nama_umkm'] ? $sertif['nama_umkm'] : '-' ?>">
            </div>
            <div class="form-group mb-3">
              <label for="alamat" class="label">Alamat</label>
              <textarea name="alamat" id="alamat" rows="3" class="form-control"><?= $sertif['alamat'] ?></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="kode_pos" class="label">Kode pos</label>
              <input type="number" name="kode_pos" id="kode_pos" class="form-control" value="<?= $sertif['kode_pos'] ?>">
            </div>
            <div class="form-group mb-3">
              <label for="nama_produk" class="label">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $sertif['nama_produk'] ?>">
            </div>
            <div class="form-group mb-3">
              <label for="sertifikat" class="label">Sertifikat</label>
              <?php $opsi = ['Sudah terbit', 'Tidak terbit'] ?>
              <select name="sertifikat" id="sertifikat" class="form-control">
                <?php foreach ($opsi as $o) : ?>
                  <option value="<?= $o ?>" <?= strtolower($o) == strtolower($sertif['sertifikat']) ? 'selected' : '' ?>><?= $o ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="keterangan" class="label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" rows="3" class="form-control"><?= $sertif['keterangan'] ?></textarea>
            </div>
            <div class="d-flex justify-content-between form-group mb-3">
              <button type="submit" class="btn btn-md btn-success">Edit</button>
              <a href="/sertifikasi" class="btn btn-md btn-danger">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection() ?>