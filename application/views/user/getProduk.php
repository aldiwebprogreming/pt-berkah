
<div class="row">

<div class="col-sm-2"></div>

<?php foreach ($getProduk as $data) { ?>

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
    <form method="post" action="<?= base_url('produk/detail-produk/') ?><?= $data['kode_produk'] ?>">
        <input type="hidden" name="jenis_voucher" value="<?= $data['jenis_voucher'] ?>">
         <input type="hidden" name="bonus_sponsor" value="<?= $data['bonus_sponsor'] ?>">
    	<input type="hidden" name="username" value="<?= $register['username'] ?>">
    	<input type="hidden" name="email" value="<?= $register['email'] ?>">
    	<input type="hidden" name="kodeuser" value="<?= $register['kodeuser'] ?>">
        <input type="hidden" name="name" value="<?= $register['name'] ?>">
        <input type="hidden" name="nohp" value="<?= $register['nohp'] ?>">
        <input type="hidden" name="pass1" value="<?= $register['pass1'] ?>">
    	<input type="submit" name="kirim" value="Beli Paket" class="btn btn-primary">
    </form>
   
</center>
  </div>
</div>
</div>




<?php } ?>

</div>

<div class="col-sm-2"></div>