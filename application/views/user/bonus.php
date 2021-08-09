<div class="main-content">
    <section class="section">

      <div class="section-header">
        <h1><i class="fas fa-credit-card" style="font-size: 20px;"> </i> Bonus Anda</h1>
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
                    <h4>Bonus</h4>
                  </div>
                  <div class="card-body">
                    
          			<div class="row">
		              <div class="col-12 col-md-6 col-lg-3">
		                <div class="card card-primary shadow-primary">
		                  <div class="card-header">
		                    <h4 class="text-primary">Bonus Ecash</h4>
		                  </div>
		                  <div class="card-body">
		                    <h5 class="text-primary"><?=  "Rp " . number_format($cash['total_cash'],2,',','.')?></h5>
		                   <hr>
		                  </div>
		                </div>
		              </div>
		              <div class="col-12 col-md-6 col-lg-3">
		                <div class="card card-success shadow-success">
		                  <div class="card-header">
		                    <h4 class="text-success">Bonus Sponsor</h4>
		                  </div>
		                  <div class="card-body">
		                    <h5 class="text-success"><?= "Rp " . number_format($spnsor['total_bonus'],2,',','.')?></h5>
		                   <hr>
		                  </div>
		                </div>
		              </div>
		              
		              <div class="col-12 col-md-6 col-lg-3">
		                <div class="card card-danger shadow-danger">
		                  <div class="card-header">
		                    <h4 class="text-danger">Bonus Lider</h4>
		                  </div>
		                  <div class="card-body">
		                    <h5 class="text-success"><?= "Rp " . number_format($lider['total_bonus_lider'],2,',','.')?></h5>
		                   <hr>
		                  </div>
		                </div>
		              </div>
		              <div class="col-12 col-md-6 col-lg-3">
		                <div class="card card-warning shadow-warning">
		                  <div class="card-header">
		                    <h6 class="text-warning">Total Seluruh Bonus</h6>
		                  </div>
		                  <div class="card-body">
		                   <h5 class="text-warning">
		                   	<?php 

		                   		$total_bonus = $cash['total_cash'] + $spnsor['total_bonus'] + $lider['total_bonus_lider'];

		                   		echo "Rp " . number_format($total_bonus,2,',','.');

		                   	 ?>
		                   </h5>
		                   <hr>
		                  </div>
		                </div>
		              </div>
		            </div>

                   
                  </div>
                </div>
              </div>
            </div>

            

            

  </section>
</div>

