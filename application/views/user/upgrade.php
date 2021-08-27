
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Upgrade Paket</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>
          
            <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                <h4>Upgrade Paket / <?= $paket['kode_user'] ?></h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card-body">
                        <h5 class="text-center">Pilih Jenis Paket</h5>
                        <div class="form-group row">
                          <!-- <label class="col-md-4 text-md-right text-left mt-2">Paket Voucher</label> -->
                          <div class="col-lg-12 col-md-12">
                            <div class="selectgroup w-100">
                              <?php foreach ($voucher as $data) { ?>
                              <label class="selectgroup-item">
                                <input type="radio" @click="changeVoucher($event)" name="voucher" value="<?= $data['name'] ?>" class="selectgroup-input">
                                <span class="selectgroup-button"><?= $data['name'] ?></span>
                              </label>

                              <?php } ?>
                            </div>
                          </div>

                          <div id="vc" class="mt-3">
                              
                          </div>

                        </div>

                  </div>


                </div>
              </div>
             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
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
  
        
          },
          methods: {
          
            changeVoucher: function(event){
              var jenis_voucher = event.target.value;
              var url = "<?= base_url('user/get_produk_upgrade?id=') ?>"+jenis_voucher;
              $("#vc").load(url);
            },
          }
        })
     </script>