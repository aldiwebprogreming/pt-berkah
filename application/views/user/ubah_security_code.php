<div class="main-content">
    <section class="section">

      <div class="section-header">
        <h1><i class="fas fa-user" style="font-size: 20px;"> </i> Ubah Security Code</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Forms</a></div>
          <div class="breadcrumb-item">Editor</div>
        </div>
      </div>

      <div class="section-body">
           <!--  <h2 class="section-title">Ubah Security Code</h2> -->
           <!--  <p class="section-lead">WYSIWYG editor and code editor.</p> -->


          

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Ubah Security Code</h4>
                  </div>
                  <div class="card-body">

                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Security Code</h4>
                      <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                      <hr>
                      <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                    </div>


                    <div class="row">
                      <div class="col-sm-6">
                        <form method="post" action="">
                         <div class="form-group">
                          <label>Security code</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar"></i>
                              </div>
                            </div>
                            <input type="text"  class="form-control daterange-cus" required="" value="<?= $sc['sc_code'] ?>" minlength="8" name="sc_code">
                            <input type="submit" name="ubah" class="btn btn-primary ml-3" value="Ubah">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>




                  </div>
                </div>
              </div>
            </div>



            

            

  </section>
</div>

