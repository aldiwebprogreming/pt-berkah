<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><i class="fas fa-list"></i> Data Jaringan</h1>
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
                      <ul>
                            <li>
                              <span class="tf-nc border border-primary" style="width: 100px; border: 2px red solid;"><?= $user['name'] ?></span>
                              <ul>
                                <?php foreach ($jaringan as $data ) { ?>
                                <li>
                                  <span class="tf-nc" style="width: 100px; border: 2px red solid;"><?= $data['name'] ?></span>

                                  <ul>
                                    <?php 
                                      $level3 = $this->m_data->jaringan($data['kode_user']);
                                      if ($level3 == true) {
                                        foreach ($level3 as $data3) { ?>

                                        <li> <span class="tf-nc" style="width: 100px; border: 2px red solid;"><?= $data3['name'] ?></span>

                                          

                                    <?php  
                                        }

                                      }else{
                                        echo "Kosong";
                                      }
                                     ?>
                                  </ul>

                                </li>
                                
                              <?php } ?>
                                
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