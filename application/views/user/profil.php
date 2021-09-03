<div class="main-content">
    <section class="section">

      <div class="section-header">
        <h1><i class="fas fa-user" style="font-size: 20px;"> </i> Profil</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Editor</div>
        </div>
      </div>

      <div class="section-body">
            <h2 class="section-title">Profil Memeber</h2>
           <!--  <p class="section-lead">WYSIWYG editor and code editor.</p> -->


          

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail</h4>
                  </div>
                  <div class="card-body">

                    <?php 

                      if ($profil == false) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hello <?= $this->session->username ?>.</strong> Profil data diri anda belum tersedia, mohon isi profil anda.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                      <a href="<?= base_url() ?>ptberkah/home" class="btn btn-primary"><i class="fas fa-user"></i> Isi profil anda</a>
                    <?php }else{ ?>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md- col-lg-3">Kode User : </label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['kode_user'] ?>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap :</label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['nama_lengkap'] ?>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap :</label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $profil['alamat_lengkap'] ?>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir : </label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $profil['tgl_lahir'] ?>
                      </div>
                    </div>

                    

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin :</label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['jenis_kelamin'] ?>
                      </div>
                    </div>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KTP  : </label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['no_ktp'] ?>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3">
                      	<button class="btn btn-primary">Edit Profil <i class="fas fa-arrow-right"></i> </button>
                      </label>
                      <div class="col-sm-12 col-md-7 col-6">
                        <figure class="avatar mr-2  ">
                      <img src="<?= base_url() ?>/assets_user/img/avatar/avatar-1.png" alt="...">
                    </figure>
                      </div>
                    </div>
                  </div>

                <?php } ?>
                </div>
              </div>
            </div>



            

            

  </section>
</div>

