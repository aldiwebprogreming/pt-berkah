<div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <!-- <div class="card-stats-title">Order Statistics -
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
                  </div> -->
                  
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Member Anda</h4>
                  </div>
                  <div class="card-body">
                    <?= $jml_member ?>
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data member anda</h4>
                 <!--  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div> -->
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Kode Member</th>
                        <th>Name</th>
                         <th>Email</th>
                        <th>Jenis Voucher</th>
                        <th>Jenis Paket</th>
                        <th>Action</th>
                      </tr>
                      <?php foreach ($member as $data) { ?>
                      <tr>
                        <td><a href="<?= base_url() ?>ptberkah/detail-member/<?= $data['kode_user'] ?>"><?= $data['kode_user'] ?></a></td>
                        <td class="font-weight-600"><?= $data['name'] ?></td>
                        <td class="font-weight-600"><?= $data['email'] ?></td>
                        <td class="font-weight-600"><?= $data['jenis_voucher'] ?></td>
                        <td class="font-weight-600"><?= $data['jenis_paket'] ?></td>
                        <td>
                          <a href="<?= base_url('ptberkah/upgrade-paket-member/') ?><?= $data['kode_user'] ?>" class="btn btn-success">Upgrade</a>
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>