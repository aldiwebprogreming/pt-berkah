<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="main-content">
     
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Order Statistics -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Upgrade Cicil</h4>
                  </div>
                  <div class="card-body">
                    
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Keranjang Belanja Anda</h4>
                  
                </div>



                <div class="card-body p-0">

                  <div class="container">
                    <form method="post" action="<?= base_url('user/action_cicil') ?>">

                   <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Paket Anda</label>
                        <input type="text" class="form-control" name="" readonly="" id="inputEmail4" placeholder="Email" value="<?= $user['jenis_paket'] ?>" >
                        <input type="hidden" name="paket_anda" value="<?= $user['kode_produk'] ?>">
                      </div>

                      <?php 
                          $prd = $this->db->get_where('tbl_produk',['kode_produk' => $set['produk_tujuan']])->row_array();
                         ?>

                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Paket Tujuan</label>
                        <input type="text" class="form-control" readonly="" name="paket_tujuan" id="inputPassword4" value="<?= $prd['jenis_produk'] ?>">
                        <input type="hidden" name="paket_tujuan" value="<?= $prd['kode_produk'] ?>">

                      </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Jumlah Cicilan</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" disabled="" placeholder="0" value="<?= $jm_cicil['jm_cicilan'] ?>">
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Sisa Cicilan</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp</div>
                        </div>
                        <?php 

                          $sisa = $set['harga'] - $jm_cicil['jm_cicilan'];
                         ?>
                        <input type="text" disabled="" class="form-control" id="inlineFormInputGroup" placeholder="harga" value="<?= $sisa ?>">
                      </div>
                    </div>
                      <!-- <div class="form-group col
              -md-6">
                        <label for="inputPassword4">Harga</label>
                        <input type="text" class="form-control" id="inputPassword4" placeholder="Password" value="<?= $set['harga'] ?>" readonly>
                      </div> -->

                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Harga Yang Harus Dibayar</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroup" value="<?= $set['harga'] ?>" name="harga" disabled>
                      </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Cicil</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Rp</div>
                        </div>
                        <input type="number" class="form-control uangku" id="inlineFormInputGroup" placeholder="0" name="cicil" required="">

                      </div>
                      <small>Cicilan dapat dibayar dengan minimal Rp.100.000</small><br>
                      <?php 
                        if ($jm_cicil['jm_cicilan'] >= $set['harga']){ ?>
                          <button id="alert" onclick="return swal('Mohon maaf cicilan anda sudah terpenuhi ')" class="btn btn-primary">
                              CICIl
                            </button>

                        <?php }else{ ?>
                      <input type="submit" name="kirim" value="CICIL" class="btn btn-primary mt-4">
                    <?php } ?>
                      
                    </div>
                     

                    </form>




                    </div>



                </div>



               
                  
                </div>
              </div>
            </div>


           
          </div>

      

      </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
      // Format mata uang.
      $("#uang").mask('0.000.000.000', {reverse: true});
  })
</script>