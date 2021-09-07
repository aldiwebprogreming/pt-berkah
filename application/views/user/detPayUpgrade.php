
      <!-- Main Content -->
 


      <div class="main-content">
        <section class="section" id="app">
          <div class="section-header">
            <h1>Detail Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Voucher</a></div>
              <div class="breadcrumb-item">Invoice</div>
            </div>
          </div>

          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title"><h4 class="mb-3"><storong>Pilih Metode Pembayaran</storong></h4></div>
                      <div class="row">
                        <div class="col-sm-6">
                          
                          <div class="row">

                            <!-- MITRANS -->
                          <!-- <div class="col-sm-6">
                            <div class="card card-primary shadow" id="midtrans">
                              <div class="card-body">
                                <i id="cekM" class="fas fa-check-circle" style="font-size: 30px; display: none"></i>
                              <center>
                                 <img src="<?= base_url() ?>assets_user/img/Midtrans.png" style="height: 110px;">
                               </center>
                                 
                              </div>
                            </div>
                          </div> -->



                          <div class="col-sm-12">
                            <div class="card card-success shadow" id="transfer">
                              <div class="card-body">
                                <i id="cekT" class="fas fa-check-circle" style="font-size: 30px; display: none"></i>
                              <center>
                                 <img class="mt-4 mb-4" src="<?= base_url() ?>assets_user/img/trs.png" style="height: 60px;">
                                 <!--  <small class=""><strong>Virtual Account, E-Wallet, Minimarket, dll</strong></small> -->
                               </center>
                                 
                              </div>
                            </div>
                          </div>

                          <!-- <div class="col-sm-6">
                            <div class="card card-danger shadow" @click="ecash">
                              <div class="card-body" >
                                 <i v-if="cek == 'ecash'" class="fas fa-check-circle" style="font-size: 30px;"></i>
                                <center>
                                 <img class="mt-4 mb-4" src="<?= base_url() ?>assets_user/img/ecash.png" style="height: 60px;">
                               </center>
                              </div>
                            </div>
                          </div> -->
                        </div>


                          <div id="btn-midtrans" style="display:none">
                          <button type="button" id="pay-button" data-amount="800" class="btn btn-primary  btn-icon icon-left mt-3 btn-lg btn-block"><i class="fas fa-credit-card" style=""></i> Bayar Sekarang</button>
                          </div>

                          <div id="det-transfer" style="display: none">
                            <h5>Silahkan transfer pembayaran ke rekening berikut:</h5>

                            <h5 class="cl2 m-t-10 m-b-10 p-t-10 p-l-10 p-b-10 mt-5" style="border-left: 8px solid #C0A230;">
                              <b class="text-danger ml-2">Bank Bank BCA: </b><b class="text-success ml-2">8692022938</b><br>
                              <span style="font-size: 90%" class="ml-2">a/n PT.Berkah Sukses Makmur</span>
                            </h5>

                            <p class="m-b-5 mt-5">
                              <b>PENTING: </b>
                            </p>
                            <ul style="margin-left: 15px;">
                              <li style="list-style-type: disc;">Mohon lakukan pembayaran dalam <b>1x24 jam</b></li>
                              <li style="list-style-type: disc;">Sistem akan otomatis mendeteksi apabila pembayaran sudah masuk</li>
                              <li style="list-style-type: disc;">Apabila sudah transfer dan status pembayaran belum berubah, mohon konfirmasi pembayaran manual di bawah</li>
                              <li style="list-style-type: disc;">Pesanan akan dibatalkan secara otomatis jika Anda tidak melakukan pembayaran.</li>
                            </ul>

                         <!--    <button id="tranpser" @click="post_transper" type="submit" class="btn btn-warning btn-block btn-lg text-center bayarmanual m-t-30"><b>MENYETUJUI PEMBAYARAN INI</b> &nbsp;</button>
 -->
                            <button type="button" class="btn btn-warning btn-block btn-lg text-center bayarmanual m-t-30" data-toggle="modal" data-target="#exampleModalCenter">
                              <b>MENYETUJUI PEMBAYARAN INI <i class="fa fa-chevron-circle-right"></i></b>
                            </button>

                            <!-- Modal -->
                            
                          </div>



                          
                        </div>
                        <div class="col-sm-6">

                          <div class="card shadow">
                            <div class="card-header">
                              <h4>Informasi Produk</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Jenis Voucher</h5>
                                  <p class="color1"><?= $detProduk['jenis_voucher'] ?></p>
                                </div>

                                 <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Jenis Paket</h5>
                                  <p class="color1"><?= $detProduk['jenis_produk'] ?></p>
                                </div>

                                 <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Bonus Sponsor</h5>
                                  <p class="color1"><?= $detProduk['bonus_sponsor'] ?>%</p>
                                </div>

                                 <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Bonus Point</h5>
                                  <p class="color1"><?= $detProduk['bonus_point'] ?></p>
                                </div>

                                <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Jumlah Voucher</h5>
                                  <p class="color1"><?= $detProduk['jumlah_voucher'] ?> voucher</p>
                                </div>

                                 <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Nilai Voucher</h5>
                                  <p class="color1">Rp. <?= $detProduk['nilai_voucher']  ?> /voucher</p>
                                </div>

                                 <div class="col-md-6">
                                  <h5 class="text-black p-b-10">Harga Voucher</h5>
                                  <p class="color1">Rp. <?= $detProduk['harga']  ?></p>
                                </div>
                              </div>
                             


                            </div>
                            <div class="card-footer">
                             <label><strong>Total : </strong></label> Rp.<?= $detProduk['harga'] ?>
                            </div>
                          </div>



                        </div>
                      </div>
                    </div>
                    <div class="row mt-4">
                   
                      <div class="col-lg-4 text-right">

                        <form>
                           
                        </form>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
              <div class="float-lg-left mb-lg-0 mb-3">
          </div>
        </section>
      </div>

    <div id="app2">
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Masukan Security Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <input type="text" name="sc_code" class="form-control" placeholder="Masukan security code anda" required="" v-model="cek_sc" v-on:keyup.enter="cek">
            <p>{{pesan}}</p>
            <center>
            <div class="spinner-border text-primary" v-if="loading == true" role="status">
              <span class="sr-only">Loading...</span>
              </center>
            </div>

              <form method="post" action="<?= base_url() ?>user/keranjang_upgrade">
               
                <input type="hidden" name="kode_produk" value="<?= $detProduk['kode_produk'] ?>">
                <input id="but" type="submit" name="klik" value="Kirim" class="btn btn-danger" style="display: none;">

              </form>

           
          </div>
        </div>
      </div>
    </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
         
  <script>
    
    $(document).ready(function(){
      $("#midtrans").click(function(){
        $("#cekM").show();
        $("#cekT").hide();
        $("#btn-midtrans").show();
        $("#det-transfer").hide();


      });
    })

  </script>
  
   <script>
    
    $(document).ready(function(){
      $("#transfer").click(function(){
      $("#cekM").hide();
        $("#cekT").show();
         $("#btn-midtrans").hide();
        $("#det-transfer").show();
      });
    })

  </script>



  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script>
    var app = new Vue({
      el: '#app2',
      data: {
       sc_code: "<?= $sc_code['sc_code'] ?>",
       cek_sc : '',
       pesan : '',
       loading : false,
      },

      methods : {
        cek : function(){
            if (this.sc_code != this.cek_sc) {
              this.pesan = "security code anda salah";
            }else if (this.cek_sc == this.sc_code) {
              this.pesan = 'security code benar';
              this.loading = true;
              setTimeout(function(){ 
              $('#but').trigger('click');
              }, 500);
              
            }
            else{
              this.pesan = "mohon isi form security code";
            }
        }
      }
    })
  </script>



  
  