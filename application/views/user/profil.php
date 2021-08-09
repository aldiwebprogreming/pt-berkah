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
            <h2 class="section-title">Profil Sponsor</h2>
           <!--  <p class="section-lead">WYSIWYG editor and code editor.</p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md- col-lg-3">Kode User : </label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['kode_user'] ?>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name :</label>
                      <div class="col-sm-12 col-md-7">
                        <?= $profil['name'] ?>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username :</label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $profil['username'] ?>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email :</label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $profil['email'] ?>
                      </div>
                    </div>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Telp :</label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $profil['no_telp'] ?>
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
                </div>
              </div>
            </div>

            

            

  </section>
</div>

