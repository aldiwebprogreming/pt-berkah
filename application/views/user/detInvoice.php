
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Detail Invoice</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>
          
            <div class="section-body">
            
            
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Detail Invoice</h4>
                  </div>
                  <div class="card-body">
                  <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                   <!--  <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a> -->
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="">
                    <table class="table table-striped">
                      <tr>
                        <th>Order ID</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                      </tr>
                      <tr>
                        <th>Nama Produk</th>
                      </tr>
                      <tr>
                        <td><?= $invo['nama_produk'] ?></td>
                      </tr>
                      <tr>
                        <th>Jenis Produk</th>
                      </tr>
                      <tr>
                        <td><?= $produk['jenis_produk'] ?></td>
                      </tr>

                      <tr>
                        <th>Jenis Voucher</th>
                      </tr>
                      <tr>
                        <td><?= $produk['jenis_voucher'] ?></td>
                      </tr>

                      <tr>
                        <th>Tanggal Transaksi</th>
                      </tr>
                      <tr>
                        <td><?= $invo['tgl_order'] ?></td>
                      </tr>

                       <tr>
                        <th>Total Harga</th>
                      </tr>
                      <tr>
                        <td><?= $produk['harga'] ?></td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h2><i class="fas fa-user" style="font-size: 50px;"></i></h2>
                  <div class="card-description">Member</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Name Member</h4>
                      </div>
                      <div class="ticket-info">
                        <div><?= $user['name'] ?></div>
                       
                       
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Username</h4>
                      </div>
                      <div class="ticket-info">
                        <div><?= $user['username'] ?></div>
                       
                       
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Email Member</h4>
                      </div>
                      <div class="ticket-info">
                        <div><?= $user['email'] ?></div>
                       
                       
                      </div>
                    </a>

                     <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>No Telp</h4>
                      </div>
                      <div class="ticket-info">
                        <div><?= $user['no_telp'] ?></div>
                       
                       
                      </div>
                    </a>
                    <a href="<?= base_url('ptberkah/invoice') ?>" class="btn btn-primary ticket-item ticket-more">
                      Kembali <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
                   
                    
                    
<!-- 
                                  <input type="submit" name="kirim" class="btn btn-primary" value="Simpan"> -->

                          </div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
          
          
        </section>
      </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
     <script>
        var app = new Vue({
          el: '#app',
          data: {
            errors :'',
            step : 1,
            totalStap : 3,
            name : '',
            username: '',
            email : '',
            nohp : '',
            pass1 : '',
            pass2 : '',
            kode_user : "<?= $kode_user ?>",

            val : ''
            // message: {
            //   nam : '',
            //   hp : '',
            //   pesan : '',

            // }
          },
          methods: {
            nextStep : function(){
              // if (this.step == 1) {
              //   if (!this.name) {
              //     this.errors="Nama masih kosong";
              //     return false;
              //   }
              //   if (!this.username) {
              //     this.errors="Username masih kosong";
              //     return false;
              //   }
              //   if (!this.email) {
              //     this.errors="email masih kosong";
              //     return false;
              //   }

              //   if (!this.nohp) {
              //     this.errors="No telp masih kosong";
              //     return false;
              //   }

              //   if (!this.pass1) {
              //     this.errors="Password masih kosong";
              //     return false;
              //   }
              //   if (!this.pass2) {
              //     this.errors="konfirmasi password masih kosong";
              //     return false;
              //   }
              // }
              this.step++;
            },
            prevtStep: function(){
              this.step--;
            },

            changeVoucher: function(event){
              var a = event.target.value;
              var name = this.name;
              var username = this.username;
              var email = this.email;
              var nohp = this.nohp;
              var pass1 = this.pass1;
              var pass2 = this.pass2;
              var kode_user = this.kode_user;

              var url2 = "<?= base_url('user/get_produk?id=') ?>"+a+"&name="+name+"&username="+username+"&email="+email+"&nohp="+nohp+"&pass1="+pass1+"&pass2="+pass2+"&kode_user="+kode_user;
              $("#vc").load(url2);
            }
          }
        })
     </script>