<div class="main-content">
  
        <section class="section">
          <div class="section-header">
            <h1>Upgrade Cicil</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>
          

      <div class="section-body">
           
           <!--  <p class="section-lead">WYSIWYG editor and code editor.</p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data Produk</h4>
                  </div>
                  <div class="card-body">

                  	<?php if ($cek == true) {?>

                  	<div class="alert alert-primary alert-dismissible fade show" role="alert">
					  <strong>Hollo <?= $this->session->username ?>.</strong> apgrade cicil anda sudah <a href="<?= base_url('ptberkah/data-seting-cicil/') ?><?= $this->session->kode_user ?>"><u><strong>diseting</strong></u></a>, silahkan cicil produk anda.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>

				<?php } ?>
                    
                    <div class="row">
                    	<?php foreach ($produk as $data) { ?>
                    	<div class="col-sm-4">
                    		<div class="card shadow" style="" >
							  <?php if ($data['jenis_voucher'] == 'Platinum') { ?>
							  <img class="card-img-top" src="<?= base_url('assets_user/img/platinum.png') ?>" alt="Card image cap">
							<?php }elseif ($data['jenis_voucher'] == 'Gold') { ?>

							<img class="card-img-top" src="<?= base_url('assets_user/img/gold.png') ?>" alt="Card image cap">

							<?php }elseif ($data['jenis_voucher'] == 'Brown') { ?>

							    <img class="card-img-top" src="<?= base_url('assets_user/img/bronze.png') ?>" alt="Card image cap">


							<?php } else{ ?>
							<img class="card-img-top" src="<?= base_url('assets_user/img/silver.png') ?>" alt="Card image cap">
							 <?php } ?>
							  <div class="card-body">
							    <h6 class="card-title text-center"><?= $data['jenis_produk'] ?></h6>
    
							    <p class="card-title text-success text-center"><strong><?= $data['jenis_voucher'] ?></strong></p>
							    <p class="card-title text-primary text-center" style="font-size: 10px;"><strong>Bonus Sponsor <?= $data['bonus_sponsor'] ?>% | Bonus Point : <?= $data['bonus_point'] ?></strong></p>

							    <p class="card-text text-center"><?= "Rp " . number_format($data['harga'],0,',','.')?></p>
							    <center>						
							    <?php 

							    	if ($cek == false) {?>
							    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop<?= $data['id'] ?>">
									  Upgrade
									</button>
							     <?php }else{ ?>
							     		<a href="<?= base_url('ptberkah/detcicil/') ?><?= $data['kode_produk'] ?>" class="btn btn-primary">Upgrade</a>
							     <?php } ?>
							    </center>

							  </div>
							</div>
                    	</div>
                    	<div class="modal fade" id="staticBackdrop<?= $data['id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="staticBackdropLabel">Mohon isi tujuan upgrade anda</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <form method="post">
						          <div class="form-group">
						            <label for="recipient-name" class="col-form-label">Paket Anda</label>
						            <input type="text" class="form-control" id="recipient-name" name="produk_anda" value="<?= $member['jenis_paket'] ?>">
						          </div>
						          <div class="form-group">
						            <label for="message-text" class="col-form-label">Paket Tujuan</label>
						            <input type="text" name="produk_tujuan" class="form-control" value="<?= $data['jenis_produk'] ?>">
						          </div>

						           <div class="form-group">
						            <label for="message-text" class="col-form-label">Harga</label>
						            <input type="text" name="harga" class="form-control" value="<?= $data['harga'] ?>">
						          </div>

						        
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <input type="submit" class="btn btn-primary" value="Submit" name="kirim">
						      </div>
						      </form>
						    </div>
						  </div>
						</div>
                    <?php } ?>
                    </div>
          			
                   
                  </div>
                </div>
              </div>
            </div>

            

            


</div>

<!-- Modal -->


