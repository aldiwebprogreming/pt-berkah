<div class="main-content">
    <section class="section">

      <div class="section-header">
        <h1><i class="fas fa-shopping-bag" style="font-size: 20px;"> </i> Detail Paket</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Editor</div>
        </div>
      </div>

      <div class="section-body">
           
           <!--  <p class="section-lead">WYSIWYG editor and code editor.</p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail</h4>
                  </div>
                  <div class="card-body">
                    
          				

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Paket Voucher : </label>
                      <div class="col-sm-12 col-md-7">
                       	 <?= $produk_anda['jenis_produk'] ?>
                      </div>
                    </div>
                     <hr>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Voucher : </label>
                      <div class="col-sm-12 col-md-7">
                       	<?= $produk_anda['jenis_voucher'] ?>
                      </div>
                    </div>
                     <hr>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bonus Sponsor : </label>
                      <div class="col-sm-12 col-md-7">
                       	  <?= $produk_anda['bonus_sponsor'] ?>%
                      </div>
                    </div>
                     <hr>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bonus Point : </label>
                      <div class="col-sm-12 col-md-7">
                        <?= $produk_anda['bonus_point'] ?>
                      </div>
                    </div>
                     <hr>

                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Voucher :</label>
                      <div class="col-sm-12 col-md-7">
                       	 <?= $produk_anda['jumlah_voucher'] ?> voucher
                      </div>
                    </div>
                     <hr>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai Voucher :</label>
                      <div class="col-sm-12 col-md-7">
                          <?= "Rp " . number_format($produk_anda['nilai_voucher'],0,',','.')?> /vcr
                        
                      </div>
                    </div>
                    <hr>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Voucher : </label>
                      <div class="col-sm-12 col-md-7"> <?= "Rp " . number_format($produk_anda['harga'],0,',','.')?>
                      </div>
                    </div>
                     <hr>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-6 col-md-3 col-lg-3">
                      	<a href="<?= base_url('ptberkah/paket') ?>" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Kembali  </a>
                      </label>
                      
                    </div>

		              	
		           

                   
                  </div>
                </div>
              </div>
            </div>

            

            

  </section>
</div>

