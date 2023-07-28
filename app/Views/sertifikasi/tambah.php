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


          <h4>Tambah data dengan import</h4>
          <?= form_open_multipart('/sertifikat/import', ['method' => 'POST']) ?>
          <div class="form-group mb-3">
            <label for="csv" class="label">Upload File CSV</label>
            <input type="file" name="csv" id="csv" class="form-control" accept=".csv">
          </div>
          <div class="form-group mb-3">
            <button type="submit" class="btn btn-md btn-success">Tambah</button>
          </div>
          <?= form_close() ?>
          <hr>
          <h4>Atau Manual</h4>
          <form action="/sertifikat/insert" method="post" enctype="multipart/form-data" class="user">
            <div class="form-group mb-3">
              <label for="nama_umkm" class="label">Nama UMKM</label>
              <input type="text" name="nama_umkm" id="nama_umkm" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="alamat" class="label">Alamat</label>
              <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
              <label for="kode_pos" class="label">Kode pos</label>
              <input type="number" name="kode_pos" id="kode_pos" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="nama_produk" class="label">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control">
            </div>
            <div class="form-group mb-3">
              <label for="sertifikat" class="label">Sertifikat</label>
              <select name="sertifikat" id="sertifikat" class="form-control">
                <option value="Sudah terbit">Sudah Terbit</option>
                <option value="Todal terbit">Tidak Terbit</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="keterangan" class="label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" rows="3" class="form-control"></textarea>
            </div>
            <div class="d-flex justify-content-between form-group mb-3">
              <button type="submit" class="btn btn-md btn-success">Tambah</button>
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