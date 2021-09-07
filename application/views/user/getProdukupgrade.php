<!-- 
<?php 
  $tgl   = date($produk_anda['date_create']);
  $tgl_up = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
 $tgl_mulai_upgrade = date($tgl, $tgl_up);

  
  
 ?> -->

<div class="row" id="app">
<?php foreach ($getProduk as $data) { ?>
<div class="col-sm-4">
<div class="card shadow" style="">
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
    <!-- <p class="text-center text-center"><strong>Jumlah voucher : <?= $data['jumlah_voucher'] ?></strong></p> -->
    <center>

      
      <?php if ($data['jenis_produk'] == $produk_anda['jenis_paket'] ) {
      echo '<button id="but" class="btn btn-primary">Upgrade Paket</button>';
      } else{?>
      <form method="post" action="<?= base_url('produk/detail-produk-upgrade/') ?><?= $data['kode_produk'] ?>">
        <input type="hidden" name="upgrade" value="upgrade">
      	<input type="submit" name="kirim" value="Upgrade Paket" class="btn btn-primary">
      </form>

   <?php } ?>
   
</center>
  </div>
</div>
</div>
<?php } ?>

</div>



  
     <script>
        $(document).ready(function(){

          $("#but").click(function(){
            swal ( "Oops" ,  "Anda tidak bisa upgrade produk ini" ,  "error" )
          });
        })
     </script>

     <script>
        $(document).ready(function(){

          $("#but2").click(function(){
            swal ( "Oops" ,  "Anda tidak bisa upgrade produk ini" ,  "error" )
          });
        })
     </script>

