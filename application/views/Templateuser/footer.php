 
    </div>
  </div>
  <br>
  <br>

  <ul id="footerapp" class="nav justify-content-center fixed-bottom bg-success d-md-none d-lg-none d-xl-none">
  <li class="nav-item">
    <a class="nav-link " href="<?= base_url('ptberkah/home') ?>"><i class="fas fa-home" style="font-size: 20px; color: white;"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('ptberkah/add-member') ?>"><i class="fas fa-user-plus" style="font-size: 20px; color: white;"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('ptberkah/bonus') ?>"><i class="fas fa-hand-holding-usd" style="font-size: 20px; color: white;"></i></a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="<?php base_url('ptberkah/data-jaringan') ?>" tabindex="-1" aria-disabled="true"><i class="fas fa-users" style="font-size: 20px; color: white;"></i></a>
  </li>
</ul>



<!-- <nav class="nav nav-pills nav-justified fixed-bottom shadow" style="background-color: silver;">
  <a class="nav-link" href="#"><i class="fas fa-home" style="font-size: 20px;"></i></a>
  <a class="nav-link" href="#"><i class="fas fa-user-plus" style="font-size: 20px; margin-left: 100px;"></i></a>
  <a class="nav-link" href="#"><i class="fas fa-user-plus" style="font-size: 20px; margin-left: 100px;"></i></a>
  
</nav> -->

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url() ?>assets_user/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?= base_url() ?>assets_user/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets_user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets_user/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets_user/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets_user/js/custom.js"></script>

  <script src="<?= base_url()  ?>assets_user/alert.js"></script>
  <script src="<?= base_url()  ?>assets_user/js/page/forms-advanced-forms.js"></script>
    <?php echo "<script>".$this->session->flashdata('message')."</script>"?>


    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

  <!-- Page Specific JS File -->
</body>
</html>
