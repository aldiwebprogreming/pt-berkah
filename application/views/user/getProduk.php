
<div class="row">



<?php foreach ($getProduk as $data) { ?>
<div class="col-sm-4">
<div class="card shadow" style="">
  <img class="card-img-top" src="<?= base_url('assets_admin/img/news/img04.jpg') ?>" alt="Card image cap">
  <div class="card-body">
    <h6 class="card-title text-center"><?= $data['jenis_produk'] ?></h6>
    
    <p class="card-title text-success text-center"><strong><?= $data['jenis_voucher'] ?></strong></p>
    <p class="card-text text-center">Rp <?= $data['harga'] ?>.</p>
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