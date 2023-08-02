<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Sertifikasi</h1>

  <?php if (session()->has('alert')) : ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('alert') ?>
    </div>
  <?php endif ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex justify-content-between mb-5">
        <h4 class="m-0 font-weight-bold text-primary">Data Sertifikasi</h4>
        <a href="/sertifikasi/tambah" class="btn btn-sm btn-success">Tambah Data</a>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered" id="sertifikasi" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama UMKM</th>
              <th>Nama Produk</th>
              <th>Sertifikat</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 ?>
            <?php foreach ($sertifikasi as $sertif) : ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><?= $sertif['nama_umkm'] ?></td>
                <td><?= $sertif['nama_produk'] ?></td>
                <td><?= $sertif['sertifikat'] ?></td>
                <td><?= $sertif['keterangan'] ?></td>
                <td>
                  <a href="/sertifikasi/delete/<?= $sertif['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                  <a href="/sertifikasi/edit/<?= $sertif['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="/sertifikasi/detail/<?= $sertif['id'] ?>" class="btn btn-sm btn-primary">Detail</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#sertifikasi').DataTable({
      select: true,
      dom: 'Bfrtip',
      buttons: [
        'csv'
      ]
    })
  })
</script>
<!-- /.container-fluid -->
<?= $this->endSection() ?>