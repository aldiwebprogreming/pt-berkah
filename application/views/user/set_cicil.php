<div class="main-content">
  
        <section class="section">
          <div class="section-header">
            <h1>Set Upgrade Cicil</h1>
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

                  	<div class="alert alert-success alert-dismissible fade show" role="alert">
			          <strong>Holy guacamole!</strong> apakah anda ingin upgrade paket anda ke paket lebih tinggi lagi?.
			          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			          </button>
			        </div>

                  	<div class="alert alert-primary" role="alert">
                      <h4 class="alert-heading">Upgrade Paket Cicil</h4>
                      <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                      <hr>
                      <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>

                      <!-- Button trigger modal -->

                      <?php if ($cek == false) {?>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
						 Upgrade Paket Cicil
						</button>

					<?php }else{ ?>
						<button class="btn btn-success" onclick="return swal('Mohon maaf anda sudah seting upgrade cicil')">Upgrade Paket Cicil</button>
					<?php } ?>

						<!-- Modal -->
						
                    </div>
                 
                    
                   </div>               
                  </div>
                </div>
              </div>
            </div>

            

            


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Set Upgrade Paket Cicil</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
   	<form method="post" action="" id="app">
		<div class="form-group">
		    <label for="exampleInputEmail1">Paket Anda Sekang</label>
		    <input type="text" class="form-control" aria-describedby="emailHelp" readonly="" placeholder="" name="produk_anda" value="<?= $user['jenis_paket'] ?>">
		    <input type="hidden" name="produk_anda" value="<?= $user['kode_produk'] ?>">
		    
	    </div>

	    <div class="form-group">
		    <label for="exampleInputEmail1">Paket Tujuan Anda</label>
		    <select class="form-control" id="select" name="produk_tujuan">
		    	<option disabled="">-- Pilih Paket Tujuan Anda -- </option>
		    	<?php 
		    		if ($user['jenis_paket'] == 'Paket Reseller Silver') {
		    			foreach ($prd as $data) { ?>

		    				<?php if ($data['jenis_produk'] == 'Paket Reseller Silver') {
		    					continue;
		    				} ?>
		    			
		    				<option value="<?= $data['kode_produk'] ?>"><?= $data['jenis_produk'] ?></option>


		    			<?php } ?>

		    	<?php }elseif ($user['jenis_paket'] == 'Paket Reseller Gold') {

		    		foreach ($prd as $data) { ?>
		    			<?php if ($data['jenis_produk'] == 'Paket Reseller Gold') {
		    					continue;
		    				} ?>
		    			
		    				<option value="<?= $data['kode_produk'] ?>"><?= $data['jenis_produk'] ?></option>


		    			<?php } ?>

		    	<?php } else{ 

		    		foreach ($prd as $data) { ?>

		    				<?php if ($data['jenis_produk'] == 'Paket Reseller Brown') {
		    					continue;
		    				} ?>
		    			
		    				<option value="<?= $data['kode_produk'] ?>"><?= $data['jenis_produk'] ?></option>


		    			<?php } ?>

		    		<?php } ?>
		    	
		    </select>
	    </div>

	    <div class="form-group">
		    <label for="exampleInputEmail1">Total Harga</label>
		    <div id="harga">
		    	 <input type="text" name="harga" class="form-control" value="" required="Rp.0">
		    </div>
	    </div>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <input type="submit" class="btn btn-primary" value="Save" name="kirim">
  </form>
  </div>
</div>
</div>
</div>

<!-- Modal -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
	$(document).ready(function(){

		$("#select").change(function(){
			var kode = $(this).val();
			
			 $("#harga").load("<?= base_url('user/get_harga?kode_produk=') ?>"+kode);
			

		})
	})
</script>


