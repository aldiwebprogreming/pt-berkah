<!-- 
<?php 
  $tgl   = date($produk_anda['date_create']);
  $tgl_up = mktime(0,0,0,date("n"),date("j")+1,date("Y"));
 $tgl_mulai_upgrade = date($tgl, $tgl_up);

  
  
 ?> -->

 <?php 
 $jenis = $produk_anda['jenis_paket'];
  ?>

<div class="row" id="app">
<div class="col-sm-2"></div>

<?php foreach ($getProduk as $data) { ?>
  <?php 
    
    if ($jenis == 'Paket Reseller Silver') {
        if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown') {
          continue;
        }
    }elseif ($jenis == 'Paket Reseller Gold') {
      if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ) {
          continue;
        }
    }elseif ($jenis == 'Paket Reseller Platinum') {
     if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ||$data['jenis_produk'] == 'Paket Reseller Platinum' ) {
          continue;
        }
    }elseif ($jenis == 'Paket Stockist Brown') {
     if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ||$data['jenis_produk'] == 'Paket Reseller Platinum' |$data['jenis_produk'] == 'Paket Stockist Brown' ) {
          continue;

        }
    }elseif ($jenis == 'Paket Stockist Silver') {
     if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ||$data['jenis_produk'] == 'Paket Reseller Platinum' || $data['jenis_produk'] == 'Paket Stockist Brown' || $data['jenis_produk'] == 'Paket Stockist Silver' ) {
          continue;
        }
    }elseif ($jenis == 'Paket Stockist Gold') {
     if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ||$data['jenis_produk'] == 'Paket Reseller Platinum' || $data['jenis_produk'] == 'Paket Stockist Brown' || $data['jenis_produk'] == 'Paket Stockist Silver' || $data['jenis_produk'] == 'Paket Stockist Gold' ) {
          continue;
        }
    }
    elseif ($jenis == 'Paket Stockist Platinum') {
     if ($data['jenis_produk'] == 'Paket Reseller Silver' || $data['jenis_produk'] == 'Paket Reseller Brown' ||$data['jenis_produk'] == 'Paket Reseller Gold' ||$data['jenis_produk'] == 'Paket Reseller Platinum' || $data['jenis_produk'] == 'Paket Stockist Brown' || $data['jenis_produk'] == 'Paket Stockist Silver' || $data['jenis_produk'] == 'Paket Stockist Gold' || $data['jenis_produk'] == 'Paket Stockist Platinum' ) {
          continue;
        }
    }

 ?>

  <?php if ($data['jenis_produk'] == 'Paket Agen Silver' || $data['jenis_produk'] == 'Paket Agen Gold' || $data['jenis_produk'] == 'Paket Agen Platinum'|| $data['jenis_produk'] == 'Paket Agen Brown') {
    continue;
} ?>





<div class="col-sm-4">
<div class="card shadow" style="">
  <?php if ($data['jenis_produk'] == 'Paket Reseller Platinum') { ?>
  <img class="card-img-top" src="<?= base_url('assets_user/voucher/reseller_p.png') ?>" alt="Card image cap">
<?php }elseif ($data['jenis_produk'] == 'Paket Reseller Gold'){ ?>

<img class="card-img-top" src="<?= base_url('assets_user/voucher/reseller_g.png') ?>" alt="Card image cap">

<?php }elseif ($data['jenis_produk'] == 'Paket Reseller Silver') { ?>

    <img class="card-img-top" src="<?= base_url('assets_user/voucher/reseller_s.png') ?>" alt="Card image cap">

<?php }elseif ($data['jenis_produk'] == 'Paket Reseller Bronze') { ?>

    <img class="card-img-top" src="<?= base_url('assets_user/voucher/reseller_b.png') ?>" alt="Card image cap">

<?php } elseif ($data['jenis_produk'] == 'Paket Stockist Platinum') { ?> 

     <img class="card-img-top" src="<?= base_url('assets_user/voucher/stockist_p.png') ?>" alt="Card image cap">
<?php } elseif ($data['jenis_produk'] == 'Paket Stockist Gold') { ?>

     <img class="card-img-top" src="<?= base_url('assets_user/voucher/stockist_g.png') ?>" alt="Card image cap">
<?php } elseif ($data['jenis_produk'] == 'Paket Stockist Silver') { ?>


 <img class="card-img-top" src="<?= base_url('assets_user/voucher/stockist_s.png') ?>" alt="Card image cap">

 <?php } elseif ($data['jenis_produk'] == 'Paket Stockist Bronze') { ?>

     <img class="card-img-top" src="<?= base_url('assets_user/voucher/stockist_b.png') ?>" alt="Card image cap">


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

<div class="col-sm-2"></div>



  
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

