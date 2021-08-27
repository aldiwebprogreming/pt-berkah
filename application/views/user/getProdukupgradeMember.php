
<div class="row">


<?php foreach ($getProduk as $data) { ?>
<div class="col-sm-4">
<div class="card shadow" style="">
    <!-- <h6 style="position: absolute; margin-right: 30px;">Bonus <br>Point</h6> -->
  <?php if ($data['jenis_voucher'] == 'Platinum') { ?>
  <img class="card-img-top" src="<?= base_url('assets_user/img/platinum.png') ?>" alt="Card image cap">
<?php }elseif ($data['jenis_voucher'] == 'Gold') { ?>

<img class="card-img-top" src="<?= base_url('assets_user/img/gold.png') ?>" alt="Card image cap">

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
    <form method="post" action="<?= base_url('produk/detail-produk-upgrade-member/') ?><?= $data['kode_produk'] ?>/<?= $this->input->get('kode_member') ?>">
      <input type="hidden" name="upgrade" value="upgrade">
    	<input type="submit" name="kirim" value="Upgrade Paket" class="btn btn-primary">
    </form>
   
</center>
  </div>
</div>
</div>
<?php } ?>

</div>