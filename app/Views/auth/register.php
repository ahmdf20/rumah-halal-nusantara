<?= $this->extend('layouts/front') ?>
<?= $this->section('content') ?>
<!-- Outer Row -->
<div class="row justify-content-center mt-5">

  <div class="col-xl-10 col-lg-12 col-md-9">
    <?php if (session()->getFlashdata('alert')) : ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('alert') ?>
      </div>
    <?php endif; ?>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block" style="background-image: url(<?= base_url('asset/brand/logo.jpg') ?>); background-position: center; background-size: cover;">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <form class="user" action="/credentials" method="POST">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
<?= $this->endSection(); ?>