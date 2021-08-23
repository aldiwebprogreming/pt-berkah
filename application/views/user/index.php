
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Ecash</h4>
                  </div>
                  <div class="card-body">
                    <?= "Rp " . number_format($spnsor['total_bonus'],2,',','.')?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Member Anda</h4>
                  </div>
                  <div class="card-body">
                   <?= $member ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Produk Anda</h4>
                  </div>
                  <div class="card-body">
                      <?= $produk['jenis_voucher'] ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Bonus Lider</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                      if ($lider['total_bonus_lider'] == null) {
                        echo "0";
                      }
                     ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
        </section>
      </div>