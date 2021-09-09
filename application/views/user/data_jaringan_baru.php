<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Jaringan baru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Activities</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data jaringan anda</h2>
            <div class="row">
              <div class="col-12">
                  <center>
                      <div class="tf-tree example">

                        <?php foreach ($jaringan as $data) {
                          
                          $user = $this->db->get_where('tbl_register', ['kode_rule' => $data['kode_user']])->result_array();

                          echo $data['kode_user']."<br>";
                           
                           foreach ($user as $mem) {
                             echo $mem['kode_user'];
                             $user2 = $this->db->get_where('tbl_register', ['kode_rule' => $mem['kode_user']])->result_array();
                             foreach ($user2 as $mem2) {
                               
                             }
                           }

                           echo "<br>";

                          
                        } ?>

                        <br>
                        <hr style="margin-top: 50px;">


                      <ul>
                            <li>
                              <span class="tf-nc border border-primary" style="width: 100px; border: 2px red solid;">aldi</span>
                              <ul>
                                <li>
                                  <span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga1</span>
                                 
                                </li>
                                <li>
                                  <span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga2</span>
                                 
                                </li>
                                <li>
                                  <span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga3</span>
                                  
                                </li>
                                <li>
                                  <span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga4</span>
                                  <ul>
                                    <li><span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga4</span></li>
                                    <li><span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga4</span></li>
                                    <li><span class="tf-nc" style="width: 100px; border: 2px red solid;">ebunga4</span></li>
                                  </ul>
                                  
                                </li>
                              </ul>
                            </li>    
                      </ul>
                    </div>
                    </center>


                    
                
              </div>
            </div>
          </div>
        </section>
      </div>