<div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-12 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                 <!--  <div class="card-stats-title">Order Statistics -
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
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    59
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Invoices</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice ID</th>
                        <th>Customer</th>
                         <th>Total</th>
                        <th>Status</th>
                       
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      <?php foreach ($invo as $key => $data) { ?>
                      <tr>
                        <td><a href="#"><?= $data['order_id'] ?></a></td>
                        <td class="font-weight-600"><?= $data['nama_produk'] ?></td>
                         <td class="font-weight-600"><?= $data['total'] ?></td>
                        <td>
                          <?php if ($data['status_code'] == 200) {
                            echo '<div class="badge badge-success">Paid</div>';
                          }else {
                            echo '<div class="badge badge-warning">Unpaid</div>';
                          } ?>
                          </td>
                        <td><?= $data['tgl_order'] ?></td>
                        <td>
                          <a href="<?= base_url('ptberkah/detail-invoice/') ?><?= $data['order_id'] ?>" class="btn btn-primary">Detail</a>
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