<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                    <h4>Voucher Anda</h4>
                  </div>
                  <div class="card-body">
                    <?= $vcr  ?> voucher
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        
          
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Voucher Anda</h4>

                </div>



                <div class="card-body p-0">

                  <div class="container">
                   <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode voucher</th>
                                <th>Nilai voucher</th>
                                <th>Masa berlaku</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Kode voucher</th>
                                <th>Nilai voucher</th>
                                <th>Masa berlaku</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php
                          $no = 1;
                           foreach ($voucher as $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['kode_voucher'] ?></td>
                                <td><?= "Rp " . number_format($data['nilai_voucher'],2,',','.')?></td> 
                                <td><?= $data['tgl_terbit'] ?> <strong>s/d</strong> <?= $data['tgl_batasterbit'] ?></td>
                                <td>
                                  <?php 

                                    $date = date("Y-m-d");

                                    if ($date >= $data['tgl_terbit']) {
                                      echo '<small class="badge badge-success"> Berlaku </small>';
                                    }

                                   ?>
                                </td>
                               
                            </tr>
                          <?php } ?>
                            
                        </tbody>
                    </table>
                </div>
                  
                </div>
              </div>
            </div>


           
          </div>
        </section>
      </div>


   
               

      <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>