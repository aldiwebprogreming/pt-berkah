<div class="main-content">
    <section class="section">

      <div class="section-header">
        <h1><i class="fas fa-shopping-bag" style="font-size: 20px;"> </i> Paket Anda</h1>
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
                    <h4>Paket</h4>
                  </div>
                  <div class="card-body">
                    
          			<div class="row">
		              <div class="col-12 col-md-6 col-lg-12">
		                <div class="card card-primary shadow-primary">
		                  <div class="card-header">

		                    <h4 class="text-primary">Paket Voucher Platinum</h4>
		                  </div>
		                  <div class="card-body">
		                  	<div class="row">
		                  		
		                  		<div class="col-sm-4">
		                  			<small>Jumlah Vocher</small>
		                    		<h2 class="text-primary"><?= $produk_anda['jumlah_voucher'] ?> voucher</h2>
		                  		</div>
		                  		<div class="col-sm-4">
		                  			<small>Bonus Sponsor</small>
		                    		<h2 class="text-primary"><?= $produk_anda['bonus_sponsor'] ?>%</h2>
		                  		</div>
		                  		<div class="col-sm-4">
		                  			<small>Nilai Vocher</small>
		                    		<h3 class="text-primary"><?= "Rp " . number_format($produk_anda['nilai_voucher'],0,',','.')?> /vcr</h3>
		                  		</div>
		                  	</div>
		                  	
		                    
		                   <hr>
		                   <a href="<?= base_url() ?>ptberkah/detail-paket" class="btn btn-primary float-">Detail paket <i class="fas fa-arrow-right"> </i> </a>
		                  </div>
		                </div>
		              </div>
		              
		           

                   
                  </div>
                </div>
              </div>
            </div>

            

            

  </section>
</div>

