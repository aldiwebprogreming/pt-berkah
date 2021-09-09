 <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />




      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <img src="<?= base_url('assets_crowsel/development.png') ?>" style="height: 50px;">
            <h1 class="">Dashboard</h1>
          </div>


        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          <strong>Holy guacamole!</strong> Selamat datang di website kami, tanam saham anda dengan mudah dan terpercaya di PTB.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

          <center>
          <div class="owl-carousel owl-theme">
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid1.png" style="border-radius: 5px;" ></div>
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid2.png" style="border-radius: 5px;" ></div>
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid3.png" style="border-radius: 5px;"></div>
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid4.png" style="border-radius: 5px;"></div>
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid5.png" style="border-radius: 5px;"></div>
            <div class="item"><img src="<?= base_url() ?>assets_crowsel/slid6.png" style="border-radius: 5px;"></div>
            
        </div>
        </center>





          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                 <img src="<?= base_url('assets_crowsel/sketch.png') ?>" style="height: 50px;">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Bonus Sponsor</h4>
                  </div>
                  <div class="card-body">
                    <?= "Rp " . number_format($spnsor['total_bonus'],2,',','.')?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <img src="<?= base_url('assets_crowsel/pencil.png') ?>" style="height: 50px;">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Member Anda</h4>
                  </div>
                  <div class="card-body">
                   <?= $member ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <img src="<?= base_url('assets_crowsel/idea.png') ?>" style="height: 50px;">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Produk Anda</h4>
                  </div>
                  <div class="card-body">
                      <?= $produk['jenis_voucher'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <img src="<?= base_url('assets_crowsel/clipboard.png') ?>" style="height: 50px;">
                  
                  
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Bonus Lider</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      if ($lider['total_bonus_lider'] == null) {
                        echo "0";
                      }
                     ?>
                  </div>
                </div>
              </div>
            </div>

          <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <img src="<?= base_url('assets_crowsel/wireframe.png') ?>" style="height: 50px;">
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Bonus Point</h4>
                  </div>
                  <div class="card-body">
                    <?php 

                        if ($point == false) {
                          echo "0";
                        }else{

                          echo $point['bonus_point'];
                        }

                     ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      


<?php 
    if ($profil['status_update'] == 0) {
 ?>
          
  
<button type="button" class="btn btn-primary but" data-toggle="modal" data-target="#exampleModal" style="display: none">
 Modal
</button> 

<?php } ?>



 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Ubah profil anda untuk mengamankan akun anda.</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
         <hr>
          <form method="post" action="<?= base_url('user/edit_profil') ?>">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Lengkap</label>
              <input type="text" class="form-control" placeholder="Masukan nama lengkap anda" name="nama_lengkap" required="" value="">
             
            </div>
            
            <div class="form-group">
              <label for="exampleInputEmail1">Alamat Lengkap</label>
              <textarea class="form-control" name="alamat_lengkap" placeholder="Masukan alamat lengkap anda"></textarea>
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Lahir</label>
              <input type="date" class="form-control" placeholder="Masukan tgl lahir anda" required="" value="" name="tgl_lahir">
            </div>


             <div class="form-group">
              <label for="exampleInputEmail1">Jenis Kelamin</label>
              <select class="form-control" name="jenis_kelamin">
                <option value="0">--Pilih Jenis Kelamin--</option>
                <option>Laki-laki</option>
                <option>Perempuan</option>
              </select>
            </div>

             <div class="form-group">
              <label for="exampleInputEmail1">Nomor KTP</label>
              <input type="number" class="form-control" placeholder="Masukan nomor ktp anda" required="" value="" name="no_ktp" maxlength="16" required="">
            </div>





           
            


           

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
       </form>
      </div>
    </div>
  </div>
</div>




<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
</script>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.but').trigger('click');
    })
</script>


<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

<script>
  var app = new Vue({
  el: '#aldi',
  data: {
    message: '',
    pass1 : '',
    pass2 : '',
    alert : '',

  },

methods : {

    cekPass : function(){
      if (this.pass1 != this.pass2) {
       this.message = 'Password anda tidak sama';
       this.alert = false;
       // this.alert = 'is-invalid';
      }else{

        this.message = '';
        this.alert= true;
      }
    }

  }
})
</script>


