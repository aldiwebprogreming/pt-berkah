
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
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
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
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
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
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
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
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
                <div class="card-icon bg-info">
                  <i class="fas fa-hand-point-right"></i>
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
              <input type="text" class="form-control" placeholder="Masukan nama lengkap" name="nama_lengkap" required="" value="<?= $profil['name'] ?>">
             
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" placeholder="Masukan username" name="username" required="" value="<?= $profil['username'] ?>">
              <small id="emailHelp" class="form-text text-muted">Masukan usrname anda untuk login akun.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" placeholder="Masukan akun email" required="" value="<?= $profil['email'] ?>" name="email">
              <small id="emailHelp" class="form-text text-muted">Masukan akaun email anda yang benar.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nomor Telp</label>
              <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan nomor telp" name="no_telp" required="" value="<?= $profil['no_telp'] ?>">
             
            </div>
            <div id="aldi">
            <div class="form-group">
              <label for="exampleInputPassword1">Password Baru</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass1" required=""  v-model="pass1">
            </div>
            <div class="form-group">
             <label for="exampleInputPassword1">Ulangi Passsword</label>
              <input type="password" class="form-control" v-bind:class="{'is-valid': alert == true}"   id="exampleInputPassword1" placeholder="Ulangi password" name="pass2" required="" v-model="pass2" v-on:keyup="cekPass">

              <small id="emailHelp" class="form-text text-danger" >{{message}}</small>
            </div>

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