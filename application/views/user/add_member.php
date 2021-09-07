
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Member</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Data Member</a></div>
             
            </div>
          </div>
          
            <div class="section-body">


            
            <!-- <div class="card">
              <div class="card-header">
                <h4>Tambah Member</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-8 col-lg-8">

                  <div class="card-body">
                    <div id="app">

                      <section v-if="step == 1">

                      <div class="form-group">
                      <label>Kode Vendor</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="<?= $kode_vendor ?>" name="kd_vendor" readonly>
                      </div>
                    </div>

                      <div class="form-group">
                      <label>Kode Member</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-qrcode"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="<?= $kode_user ?>" name="kd_member" readonly>
                      </div>
                    </div>
                      
                    <div class="form-group">
                      <label>Name</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-user"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="" name="name" v-model="name">
                      </div>
                      
                    </div>


                    <div class="form-group">
                      <label>Username</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-user-shield"></i>
                          </div>
                        </div>
                        <input type="text" class="form-control phone-number" value="" name="username" v-model="username">
                      </div>
                      
                    </div>

                     <div class="form-group">
                      <label>Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                          </div>
                        </div>
                        <input type="text" v-model="email" class="form-control phone-number" value="" name="email">
                      </div>
                      
                    </div>

                     <div class="form-group">
                      <label>No Telp</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-phone"></i>
                          </div>
                        </div>
                        <input type="text" v-model="nohp" class="form-control phone-number" value="" name="no_telp">
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" v-model="pass1" class="form-control phone-number" value="" name="pass1">
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                              <i class="fas fa-key"></i>
                          </div>
                        </div>
                        <input type="password" v-model="pass2" class="form-control phone-number" value="" name="pass2">
                      </div>
                     
                    </div>
                    </section>

                    <section v-if="step == 2">
                      <h3>Section 2</h3>
                    </section>
                     
                    </div>

                    

                    


                    <button type="submit" @click.prevent="nextStep" class="btn btn-primary">Next</button>

                     <button v-if="step != 1 " @click.prevent="prevtStep" class="btn btn-primary">Prev Next</button>
                    
                    

                    <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
                    
                  </div>


                  </div>
                </div>
             
              </div>
              <div class="card-footer bg-whitesmoke">
                This is card footer
              </div>
            </div>
          </div> -->
            <div class="row" id="app">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create New App</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">

                        <div class="wizard-steps">
                          <div class="wizard-step" v-bind:class="{'wizard-step-active': step == 1 }">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              User Account
                            </div>
                          </div>
                          <div class="wizard-step" v-bind:class="{'wizard-step-active': step == 2 }">
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                              Buy Vouchers
                            </div>
                          </div>
                          <!-- <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-server"></i>
                            </div>
                            <div class="wizard-step-label">
                              Server Information
                            </div>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    
                    <div id="">
                      <div class="static"></div>
                      <section v-if="step == 1">
                      <!--   <h4>{{errors}}</h4> -->
                      <div class="wizard-pane">

                        
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Kode Vendor</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="kd_vendor" class="form-control" readonly="" value="<?= $kode_vendor ?>">
                          </div>
                        </div>

                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Kode Member</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="kd_member" readonly="" class="form-control" value="<?= $kode_user ?>">
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Name</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="name" v-model="name" class="form-control">
                            <small v-if = "!name" class="text-danger">Form nama tidak boleh kosong</small>
                          </div>

                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Username</label>
                          <div class="col-lg-4 col-md-6"> 
                            <input type="text" name="username"  v-model="username"  class="form-control">
                             <small v-if = "!username" class="text-danger">Form username tidak boleh kosong</small>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Email</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="email" name="email"  v-model="email"  class="form-control">
                            <small v-if = "!email" class="text-danger">Form email tidak boleh kosong</small>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">No Telp</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="number" name="nohp" v-model="nohp" class="form-control">
                            <small v-if = "!nohp" class="text-danger">Form no telp tidak boleh kosong</small>
                          </div>
                        </div>

                        <?php 
                         $data ="{{email}}";
                          $slug = str_replace(" ", "-", $data);
                          
                         ?>
                       <!--  <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Role</label> -->
                          <!-- <div class="col-lg-4 col-md-6">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="value" value="developer" class="selectgroup-input">
                                <span class="selectgroup-button">Developer</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="value" value="ceo" class="selectgroup-input">
                                <span class="selectgroup-button">CEO</span>
                              </label>
                            </div>
                          </div> -->
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                          </div>
                        </div>

                       </section>

                       <section v-if="step==2">
                          <div class="wizard-pane">
                        
                        
                        
                        
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Paket Voucher</label>
                          <div class="col-lg-4 col-md-6">
                            <div class="selectgroup w-100">
                              <?php foreach ($voucher as $data) { ?>
                              <label class="selectgroup-item">
                                <input type="radio" @click="changeVoucher($event)" name="voucher" value="<?= $data['name'] ?>" class="selectgroup-input">
                                <span class="selectgroup-button"><?= $data['name'] ?></span>
                              </label>

                            <?php } ?>

                              

                            </div>
                          </div>

                          <div id="vc">
                              
                          </div>
                        </div>
                        
                       </section>
                        

                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <!-- <a href="#" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></a> -->
                            <button v-if="step == 1" type="submit" @click.prevent="nextStep" class="btn btn-primary">Next</button>

                            <button v-if="step != 1 " @click.prevent="prevtStep" class="btn btn-primary">Prev Next</button>
                    
                    
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
            val : '',
            errors :'',
        
          },
          methods: {
            nextStep : function(){
              if (this.step == 1) {
                if (!this.name) {
                  this.errors="Nama masih kosong";
                  return false;
                }
                if (!this.username) {
                  this.errors="Username masih kosong";
                  return false;
                }
                if (!this.email) {
                  this.errors="email masih kosong";
                  return false;
                }

                if (!this.nohp) {
                  this.errors="No telp masih kosong";
                  return false;
                }

                // if (!this.pass1) {
                //   this.errors="Password masih kosong";
                //   return false;
                // }
                // if (!this.pass2) {
                //   this.errors="konfirmasi password masih kosong";
                //   return false;
                // }
              }
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
            },
          }
        })
     </script>