<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <i class="fas fa-home"></i>
    </div>
    <div class="sidebar-brand-text mx-3">RHN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <?php if ($auth['email'] == 'admin@admin.com') :  ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="/user">
        <i class="fas fa-fw fa-users"></i>
        <span>Admin</span></a>
    </li>
  <?php endif  ?>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/sertifikasi">
      <i class="fas fa-fw fa-file"></i>
      <span>Sertifikasi</span></a>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/profile/<?= $auth['id'] ?>">
      <i class="fas fa-fw fa-user-circle"></i>
      <span>Profile</span></a>
  </li>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/logout">
      <i class="fas fa-fw fa-times"></i>
      <span>Logout</span></a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->