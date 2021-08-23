
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
                  <!-- <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Detail</h2>
                      <div class="invoice-number">Order</div>
                    </div>
                    <hr> -->
                    <div class="row">

                      <!-- <table class="table table-bordered table-md">
                        <tr>
                          <td>Judul Produk</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['judul_produk'] ?></strong></td>
                        </tr>
                        <tr>
                          <td>Keterangan Produk</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['keterangan_produk'] ?></strong></td>
                        </tr>
                        <tr>
                          <td>Harga</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['harga'] ?></strong></td>
                        </tr>
                        <tr>
                          <td>Paket Voucher</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['jenis_voucher'] ?></strong></td>
                        </tr>
                        <tr>
                          <td>Paket Produk</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['jenis_produk'] ?></strong></td>
                        </tr>
                        <tr>
                          <td>Jumlah Voucher</td>
                          <td>:</td>
                          <td><strong><?= $detProduk['jumlah_voucher'] ?> Lembar</strong></td>
                        </tr>
                         <tr>
                          <td>Nilai Pervocuher</td>
                          <td>:</td>
                          <td><strong>Rp.<?= $detProduk['nilai_voucher'] ?> /Lembar</strong></td>
                        </tr>
                      </table> -->
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title"><h4 class="mb-3"><storong>Pilih Metode Pembayaran</storong></h4></div>
                    <!-- <p class="section-lead">All items here cannot be deleted.</p> -->
                   
                      <div class="row">
                        <div class="col-sm-6">
                          
                          <div class="row">
                          <div class="col-sm-6">
                            <div class="card card-primary shadow" @click="midtrans">
                              <div class="card-body">
                                <i v-if="cek == 'midtrans'" class="fas fa-check-circle" style="font-size: 30px;"></i>
                              <center>
                                 <img src="<?= base_url() ?>assets_user/img/Midtrans.png" style="height: 110px;">
                               </center>
                                 
                              </div>
                            </div>
                          </div>



                          <div class="col-sm-6">
                            <div class="card card-success shadow" @click="transper">
                              <div class="card-body">
                                <i v-if="cek == 'transper'" class="fas fa-check-circle" style="font-size: 30px;"></i>
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


                          <div id="midtrans" style="display: none">
                          <button type="button" id="pay-button" data-amount="800" class="btn btn-primary  btn-icon icon-left mt-3 btn-lg btn-block"><i class="fas fa-credit-card" style=""></i> Bayar Sekarang</button>
                          </div>

                          <div id="transfer" v-if="cek == 'transper'">
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

                            <a href="https://toko.weddingcnk.com/manage/pesanan?konfirmasi=6" style="" class="btn btn-warning btn-block btn-lg text-center bayarmanual m-t-30"><b>KONFIRMASI PEMBAYARAN</b> &nbsp;<i class="fa fa-chevron-circle-right"></i></a>
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
                    <!--   <div class="col-lg-8">
                        <div class="section-title">Payment Method</div>
                        <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                        <div class="d-flex">
                          <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                          <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                          <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                          <div class="bg-paypal" data-width="61" data-height="38"></div>
                        </div>
                      </div> -->
                      <div class="col-lg-4 text-right">

              <form id="payment-form" method="post" action="<?=site_url()?>/snap2/finish">
                  <input type="hidden" name="result_type" id="result-type" value=""></div>
                  <input type="hidden" name="result_data" id="result-data" value=""></div>
                  <input type="hidden" name="name" id="name" value="<?= $this->session->username  ?>">
                  <input type="hidden" name="email" id="email" value="<?= $this->session->email  ?>">
                  <input type="hidden" name="kode_produk" value="<?= $detProduk['kode_produk'] ?>">
                  <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $detProduk['judul_produk'] ?>">
                   <input type="hidden" name="jenis_voucher" id="jenis_voucher" value="<?= $detProduk['jenis_voucher'] ?>">
                  <input type="hidden" name="harga" id="harga" value="<?= $detProduk['harga'] ?>">
                  <input type="hidden" name="cashback" id="cashback" value="<?= $detProduk['bonus'] ?>">
                  <input type="hidden" name="kode_user" id="kode_user" value="<?= $user['kode_user'] ?>">

                  <input type="hidden" name="name2"  value="<?= $user['name'] ?>">
                  <input type="hidden" name="nohp"  value="<?= $user['nohp'] ?>">
                  <input type="hidden" name="username"  value="<?= $user['username'] ?>">
                  <input type="hidden" name="email2"  value="<?= $user['email'] ?>">
                  <input type="hidden" name="kode_jaringan"  value="<?= $jr['kode_jaringan'] ?>">
                  <input type="hidden" name="jenis_voucher"  value="<?= $user['jenis_voucher'] ?>">
                  <input type="hidden" name="bonus_sponsor"  value="<?= $user['bonus_sponsor'] ?>">


                  </form>
                        <!-- <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Subtotal</div>
                          <div class="invoice-detail-value">$670.99</div>
                        </div> -->
                        <!-- <div class="invoice-detail-item">
                          <div class="invoice-detail-name">Shipping</div>
                          <div class="invoice-detail-value">$15</div>
                        </div> -->
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">

                  

              <!-- <button type="button" id="pay-button" data-amount="800" class="btn btn-primary btn-lg btn-block">Pay!</button> -->

                  
               
             
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
        message: 'Hello Vue!',
        cek : '',
      },

      methods : {
        midtrans : function(){
          this.cek = 'midtrans';
          $("#midtrans").show();
        },

         transper : function(){
          this.cek = 'transper';
          $("#midtrans").hide();
        },

          ecash : function(){
          this.cek = 'ecash';
        }




      }
    })
    
  </script>
     

     <script type="text/javascript">
  
    $("#pay-button").click(function (event) {
      // var gross =  $(this).data('amount');
      // var nama = $(this).data('nama');
      event.preventDefault();
      $(this).attr("disabled", "disabled");


    var nama_produk = $('#nama_produk').val();
    var jenis_voucher = $('#jenis_voucher').val();
    var harga = $('#harga').val();
    var name = $('#name').val();
    var email = $('#email').val();

    
    $.ajax({
      type:'POST',
      url: '<?=base_url()?>/snap2/token',
      cache: false,

      data: {
        harga: harga,
        nama_produk: nama_produk,
        jenis_voucher: jenis_voucher,
        name: name,
        email: email,
      },

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          // resultType.innerHTML = type;
          // resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
  