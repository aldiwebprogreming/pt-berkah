<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PT.Berkah</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-BggmMsnPGVAR9waz"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

  <!-- CSS Libraries -->

  <link rel="stylesheet" href="<?= base_url() ?>assets_user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets_user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets_user/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets_user/css/components.css">

  <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">

 
</head>

<body>
  <div id="app">
    <?php 

    $kode_user = $this->session->kode_user;
    $data = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();

    if ($data['jenis_voucher']  == 'Platinum') {

     ?>
    <div class="main-wrapper" style="">
      <div class="navbar-bg" style="background-color: #732edb"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #732edb;">
        <form class="form-inline mr-auto">
          
        </form>
        <ul class="navbar-nav navbar-right" style="background-color: #732edb">

    <?php }elseif ($data['jenis_voucher']  == 'Gold') { ?>
    <div class="main-wrapper" style="">
      <div class="navbar-bg" style="background-color: #ae973d"></div>
      <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #ae973d;">
        <form class="form-inline mr-auto">
          
        </form>
        <ul class="navbar-nav navbar-right" style="background-color: #ae973d">

        <?php }else{ ?>

        <div class="main-wrapper" style="">
          <div class="navbar-bg" style="background-color: #bebcb4"></div>
          <nav class="navbar navbar-expand-lg main-navbar" style="background-color: #bebcb4;">
            <form class="form-inline mr-auto">
              
            </form>
            <ul class="navbar-nav navbar-right" style="background-color: #bebcb4">


        <?php } ?>
        
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url() ?>assets_admin/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"><?= $this->session->name ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('login_user/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= base_url('dashboard/home') ?>">PT.BERKAH</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">St</a>
          </div>
          <ul class="sidebar-menu">

              <li class="menu-header">Home</li>
                <li class=""><a class="nav-link" href="<?= base_url('ptberkah/home') ?>"><i class="fas fa-fire"></i> <span>Home</span></a></li>
              </li>

              

              <li class="menu-header">Member</li>
                <li class=""><a class="nav-link" href="<?= base_url('ptberkah/add-member') ?>"><i class="fas fa-user-tie"></i> <span>Tambah Member</span></a></li>
              </li>

              <li class=""><a class="nav-link" href="<?= base_url('ptberkah/data-jaringan') ?>"><i class="fas fa-users"></i> <span>Data Jaringan</span></a></li>
              </li>

               <li class=""><a class="nav-link" href="<?= base_url('ptberkah/data-member') ?>"><i class="fas fa-list"></i> <span>Data Member Ada</span></a></li>
              </li>

              <li class="menu-header">Bonus</li>
                <li class=""><a class="nav-link" href="<?= base_url('ptberkah/bonus') ?>"><i class="fas fa-credit-card"></i> <span>Bonus</span></a></li>
              </li>
               <li class=""><a class="nav-link" href="<?= base_url('ptberkah/voucher-anda') ?>"><i class="fas fa-id-card"></i> <span>Voucher Anda</span></a></li>
              </li>

             <!--  <li class=""><a class="nav-link" href="<?= base_url('ptberkah/voucher-upgrade') ?>"><i class="fas fa-id-card"></i> <span>Voucher Upgrade</span></a></li>
              </li>
 -->
               <li class="menu-header">Paket Anda</li>
                <li class=""><a class="nav-link" href="<?= base_url('ptberkah/paket') ?>"><i class="fas fa-credit-card"></i> <span>Paket Anda</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-bag"></i> <span>Keranjang Belanja</span></a>
                <ul class="dropdown-menu" style="display: none;">
                  <li><a class="nav-link" href="<?= base_url('ptberkah/keranjang-belanja') ?>">Keranjang Anda </a></li>
                  <li><a class="nav-link" href="<?= base_url('ptberkah/keranjang-belanja-upgrade') ?>">Keranjang Upgrade</a></li>
                 
                </ul>
              </li>

                <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sync-alt"></i> <span>Upgrade</span></a>
                <ul class="dropdown-menu" style="display: none;">
                  <li><a class="nav-link" href="<?= base_url('ptberkah/upgrade-paket') ?>">Paket Anda</a></li>
                 <!--  <li><a class="nav-link" href="<?= base_url('produk/data-member') ?>">Paket Member</a></li> -->
                 
                </ul>
              </li>
                

              <!--   <li class=""><a class="nav-link" href="<?= base_url('ptberkah/invoice') ?>"><i class="fas fa-receipt"></i> <span>Invocie</span></a></li>
              </li>
 -->
              <li class="menu-header">Profil</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-sync-alt"></i> <span>Profil</span></a>
                <ul class="dropdown-menu" style="display: none;">
                   <li class=""><a class="nav-link" href="<?= base_url('ptberkah/profil') ?>"> <span>Data Profil</span></a></li>

                   <li class=""><a class="nav-link" href="<?= base_url('ptberkah/ubah-password') ?>"> <span>Ubah Password</span></a></li>

                   <li class=""><a class="nav-link" href="<?= base_url('ptberkah/ubah-security-code') ?>"> <span>Ubah Security Code</span></a></li>

                  
                 
                </ul>
              </li>


            <?php 

                $cek = $this->db->get_where('tbl_register', ['kode_user' => $this->session->kode_user])->row_array();

                $paket = $cek['jenis_paket'];

                if ($paket == 'Paket Reseller Brown') {
                  
                }elseif ($paket == 'Paket Reseller Silver') {
                  
                }elseif ($paket == 'Paket Reseller Gold') {
                  # code.
                }elseif ($paket == 'Paket Reseller Platinum') {
                  
                }else{


             ?>

              <li class=""><a class="nav-link" href="<?= base_url('ptberkah/voucher-anda') ?>"><i class="fas fa-download"></i> <span>Download Sertifikat</span></a></li>
              </li>

                <?php } ?>

              <!-- <li class="active"><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> -->




              
            </ul>

           
        </aside>
      </div>
