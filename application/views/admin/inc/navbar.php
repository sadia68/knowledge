

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

  <a class="navbar-brand mr-1 text-center" href="<?=base_url()?>">KNOWLEDGE</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <div class="input-group">

    </div>
  </div>
</form>

<!-- Navbar -->
<ul class="navbar-nav ml-auto ml-md-0">

  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="<?=base_url()?>AdminLogout">Logout</a>
    </div>
  </li>
</ul>

</nav>

<div id="wrapper"> 

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
   <li class="nav-item">
    <a class="nav-link" href="<?=base_url()?>Admin/dashboard">
      <i class="fas fa-tachometer-alt"></i>
      <span>DASHBOARD</span></a>
  </li>



    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>Admin/user_list">
        <i class="fas fa-fw fa-users"></i>
        <span> USERS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>Admin/block_list">
        <i class="fas fa-book-dead"></i>
        <span>BLOCKED USERS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>Admin/questions">
        <i class="fas fa-fw fa-users"></i>
        <span>QUESTIONS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>Admin/rejected_questions">
        <i class="fas fa-fw fa-users"></i>
        <span>REJECTED QUESTIONS</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>Admin/user_message">
        <i class="fa fa-car"></i>
        <span>USER MESSAGE</span></a>
    </li>

   


    </ul>