
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
                 
                    <div class="row">

                     
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
                            <div class="card card-primary shadow" id="midtrans">
                              <div class="card-body">
                                <i id="cekM" class="fas fa-check-circle" style="font-size: 30px; display: none"></i>
                              <center>
                                 <img src="<?= base_url() ?>assets_user/img/Midtrans.png" style="height: 110px;">
                               </center>
                                 
                              </div>
                            </div>
                          </div>



                          <div class="col-sm-6">
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

                            <button id="tranpser" @click="post_transper" type="submit" class="btn btn-warning btn-block btn-lg text-center bayarmanual m-t-30"><b>KONFIRMASI PEMBAYARAN</b> &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
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

              <form id="payment-form" method="post" action="<?=site_url()?>/snap2/finish">
                  <input type="hidden" name="result_type" id="result-type" value=""></div>
                  <input type="hidden" name="result_data" id="result-data" value=""></div>
                  <input type="hidden" name="name" id="name" value="<?= $this->session->username  ?>">

                   <input type="hidden" name="upgrade" id="upgrade" value="<?= $this->session->kode_user  ?>">
                  
                  <input type="hidden" name="email" id="email" value="<?= $this->session->email  ?>">
                 <!--  <input type="hidden" name="kode_produk" value="<?= $detProduk['kode_produk'] ?>"> -->

                  <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $detProduk['judul_produk'] ?>">

                   <input type="hidden" name="jenis_voucher" id="jenis_voucher" value="<?= $detProduk['jenis_voucher'] ?>">

                    <input type="hidden" name="bonus_sponsor" id="bonus_sponsor" value="<?= $detProduk['bonus_sponsor'] ?>">

                  <input type="hidden" name="jenis_produk" id="jenis_produk" value="<?= $detProduk['jenis_produk'] ?>">

                   <input type="hidden" name="bonus_point" id="bonus_point" value="<?= $detProduk['bonus_point'] ?>">

                   <input type="hidden" name="kode_produk" id="kode_produk" value="<?= $detProduk['kode_produk'] ?>">

                  <input type="hidden" name="harga" id="harga" value="<?= $detProduk['harga'] ?>">
                

                

                  </form>
                      
                        
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
  