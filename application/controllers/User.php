<?php 

	/**
	 * 
	 */
	class User extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			if ($this->session->userdata('name') == NULL) {
                redirect('ptberkah/login');
            }

            $this->load->model('m_data');
            $this->load->library('form_validation');
		}

		function index(){

         $kode_user = $this->session->kode_user;

        // $data['cash'] = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $data['spnsor'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $data['lider'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        $data['produk'] = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();

         $data['member'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->num_rows();

         $data['point'] = $this->db->get_where('tbl_bonus_point', ['kode_member' => $kode_user])->row_array();

         $data['profil'] =  $this->db->get_where('tbl_register', ['kode_user' => $kode_user])->row_array();
       
             
            $this->load->view('Templateuser/header');
            $this->load->view('user/index', $data);
            $this->load->view('Templateuser/footer');

           
         


		}

		function add_member(){
			$data['voucher'] = $this->db->get('tbl_voucher')->result_array();
			$kode = rand(1, 100000);
        	$data['kode_user'] = "Ebunga-".$kode;
        	$data['kode_vendor'] =  $this->session->kode_user;



			$this->load->view('Templateuser/header');
			$this->load->view('user/add_member', $data);
			$this->load->view('Templateuser/footer');

		}

	function get_produk(){


    	$data['register'] = [
    		'username' => $this->input->get('username'),
    		'name' => $this->input->get('name'),
    		'email' => $this->input->get('email'),
    		'nohp' =>  $this->input->get('nohp'),
    		'pass1' => $this->input->get('pass1'),
    		'pass2' => $this->input->get('pass2'),
    		'kodeuser' => $this->input->get('kode_user'),
    	];

    	 $id = $this->input->get('id');
    	// echo $username = $this->input->get('username');
    	// echo $email = $this->input->get('email');
    	// echo $nohp = $this->input->get('nohp');
    	// echo $pass1 = $this->input->get('pass1');
    	// echo $pass2 = $this->input->get('pass2');

    	$data['getProduk'] = $this->db->get_where('tbl_produk', ['jenis_voucher' => $id])->result_array();

    	$this->load->view('user/getProduk', $data);
    }

    function get_produk_upgrade(){

         $id = $this->input->get('id');
        $data['getProduk'] = $this->db->get_where('tbl_produk', ['jenis_voucher' => $id])->result_array();

        $this->load->view('user/getProdukupgrade', $data);
    }

     function get_produk_upgrade_member(){

         $id = $this->input->get('id');
        $data['getProduk'] = $this->db->get_where('tbl_produk', ['jenis_voucher' => $id])->result_array();

        $this->load->view('user/getProdukupgradeMember', $data);
    }

     function produkDet($kode){

    	$data['user'] = [
    		'kode_user' => $this->input->post('kodeuser'),
    		'username' => $this->input->post('username'),
    		'name' => $this->input->post('name'),
    		'email' => $this->input->post('email'),
    		'nohp' => $this->input->post('nohp'),
    		'pass1' => $this->input->post('pass1'),
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),
    	];

    	// $kode_user = $this->session->kode_user;

    	// $data['vendor'] => $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();

    	$data['detProduk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode])->row_array();
         $data['jr'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

         $data['sc_code'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

    	$this->load->view('Templateuser/header');
    	$this->load->view('user/detPay', $data);
    	$this->load->view('Templateuser/footer');


    }

     function produkDetUpgrade($kode){
            $data['user'] = [
            'kode_user' => $this->input->post('kodeuser'),
            'username' => $this->input->post('username'),
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'nohp' => $this->input->post('nohp'),
            'pass1' => $this->input->post('pass1'),
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),
        ];

       $data['detProduk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode])->row_array();
         $data['jr'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

         $data['sc_code'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();


        $this->load->view('Templateuser/header');
        $this->load->view('user/detPayUpgrade', $data);
        $this->load->view('Templateuser/footer');


    }

     function produkDetUpgradeMember($kode1, $kode2){
        $data['kode_user'] = $kode2;
        $data['status'] ='upgrade';
        $data['detProduk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode1])->row_array();
         $data['jr'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();
        $this->load->view('Templateuser/header');
        $this->load->view('user/detPayUpgradeMember', $data);
        $this->load->view('Templateuser/footer');


    }


    function invoice(){
        $kode_user = $this->session->kode_user;
        $data['invo'] = $this->db->get_where('tbl_transaksi',['kode_user' => $kode_user])->result_array();

        $data['jml_sp'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->num_rows();

         $this->load->view('templateuser/header');
         $this->load->view('user/invoice', $data);
         $this->load->view('templateuser/footer');
    }

    function detail_invo($kode_order){ 

        $data['invo'] = $this->db->get_where('tbl_transaksi',['order_id' => $kode_order])->row_array();
    $invo = $this->db->get_where('tbl_transaksi',['order_id' => $kode_order])->row_array();

     $data['produk'] = $this->db->get_where('tbl_produk',['kode_produk' => $invo['kode_produk']])->row_array();

     $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $invo['kode_user_member']])->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/detInvoice', $data);
         $this->load->view('templateuser/footer');
    
    }


    function profil(){

        $kode_user = $this->session->kode_user;
        $data['profil'] = $this->db->get_where('tbl_profil', ['kode_user' => $kode_user])->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/profil', $data);
         $this->load->view('templateuser/footer');

    }

    function bonus(){

        $kode_user = $this->session->kode_user;

        $data['cash'] = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $data['spnsor'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $data['lider'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        $data['point'] = $this->db->get_where('tbl_bonus_point',['kode_member' => $kode_user])->row_array();


         $this->load->view('templateuser/header');
         $this->load->view('user/bonus', $data);
         $this->load->view('templateuser/footer');
    }

    function paket(){
        $kode_user = $this->session->kode_user;
        $user = $this->m_data->get_user('tbl_register', $kode_user);
        $data['produk_anda'] = $this->db->get_where('tbl_produk',['kode_produk' => $user['kode_produk']])->row_array();

       
       
         $this->load->view('templateuser/header');
         $this->load->view('user/paket', $data);
         $this->load->view('templateuser/footer');
    }

    function detail_paket(){

        $kode_user = $this->session->kode_user;
        $user= $this->m_data->get_user('tbl_register', $kode_user);
        $data['produk_anda'] = $this->db->get_where('tbl_produk',['kode_produk' => $user['kode_produk']])->row_array();
         $this->load->view('templateuser/header');
         $this->load->view('user/detail_paket', $data);
         $this->load->view('templateuser/footer');
    }


    function data_jaringan(){

        $kode_user = $this->session->kode_user;
        $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
        $data['jaringan'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->result_array();
         $this->load->view('templateuser/header');
         $this->load->view('user/data_jaringan', $data);
         $this->load->view('templateuser/footer');
    }


    function upgrade_paket(){

        $kode_user = $this->session->kode_user;

        $data['paket'] = $this->db->get_where('tbl_register', ['kode_user' => $kode_user])->row_array();  
        $data['voucher'] = $this->db->get('tbl_voucher')->result_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/upgrade', $data);
         $this->load->view('templateuser/footer');

    }


    function data_member(){
        $kode_user = $this->session->kode_user;
        $data['member'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->result_array();

        $data['jml_member'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->num_rows();
        // var_dump($data);
         $this->load->view('templateuser/header');
         $this->load->view('user/data_member', $data);
         $this->load->view('templateuser/footer');

    }


    function detail_member($kode_member){
        $data['det'] = $this->db->get_where('tbl_register',['kode_user' => $kode_member])->row_array();
        $data['produk'] = $this->db->get_where('tbl_produk',['jenis_produk' => $data['det']['jenis_paket']])->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/detail_member', $data);
         $this->load->view('templateuser/footer');

    }


    function upgrade_paketMember($kode_member){


        $data['kode_member'] = $kode_member;
        $data['paket'] = $this->db->get_where('tbl_register', ['kode_user' => $kode_member])->row_array();  
        $data['voucher'] = $this->db->get('tbl_voucher')->result_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/upgrade_member', $data);
         $this->load->view('templateuser/footer');

    }



    function edit_profil(){

        $kode_user = $this->session->kode_user;

         $data = [
                'kode_user' => $kode_user,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'no_ktp' =>$this->input->post('no_ktp'),
            ];

           $this->db->where('kode_user', $kode_user);
           $this->db->update('tbl_register', ['status_update' => 1]);

           $input = $this->db->insert('tbl_profil',$data);
            $this->session->set_flashdata('message', 'swal("Sukses!", "Profil anda berhasil diedit", "success");');
            redirect('ptberkah/home');
                
            
    }

    function voucher_anda(){
        $kode_user = $this->session->kode_user;
        $data['voucher'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user])->result_array();
        $data['vcr'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user])->num_rows();
        $data['nilai_voucher'] = $this->db->query("SELECT SUM(nilai_voucher) AS total_nilai_voucher FROM tbl_list_voucherproduk WHERE kode_member = '$kode_user';")->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/data_voucher_anda', $data);
         $this->load->view('templateuser/footer');

    }


    function keranjang(){

         $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
         $sec_code  = substr(str_shuffle($karakter), 0, 8);
                
    
        $data = [
            'kode_user' => $this->input->post('kode_user'),
            'name' => $this->input->post('name2'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email2'),
            'no_telp' => $this->input->post('nohp'),
            'password' => password_hash('aldi123', PASSWORD_DEFAULT),
            'status' => 0,
            'kode_jaringan' => $this->session->kode_user." ".$this->input->post('kode_jaringan') ,
            'kode_rule' => $this->session->kode_user,
            'lider' => '',
            'kode_produk' => $this->input->post('kode_produk'),
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'jenis_paket' => $this->input->post('jenis_paket'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),
            'sc_code' => $sec_code,


        ];

        $keranjang = $this->db->insert('tbl_keranjang', $data);
         $this->session->set_flashdata('message', 'swal("Sukses!!", "Produk berhasil di masukan dikeranjang", "success" );');
         redirect('user/keranjang_belanja');
    }



    function keranjang_upgrade(){
        $kode_produk = $this->input->post('kode_produk');
        $user = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();


        $data = [

            'kode_user' => $user['kode_user'],
            'name' => $user['name'],
            'username' => $user['username'],
            'email' => $user['email'],
            'no_telp' => $user['no_telp'],
            'kode_produk' =>$kode_produk,
            
        ];

        $this->db->insert('tbl_keranjang_upgrade', $data);

         $this->session->set_flashdata('message', 'swal("Sukses!!", "Produk berhasil di masukan dikeranjang upgrade", "success" );');
        redirect('user/keranjang_belanja_upgrade');


    }


    function keranjang_belanja(){ 
       $kode_user = $this->session->kode_user;
        $data['keranjang'] = $this->db->query("SELECT * FROM tbl_keranjang WHERE kode_rule = '$kode_user' ")->result_array();
       
        $data['jml'] = $this->db->get_where('tbl_keranjang',['kode_rule' => $this->session->kode_user])->num_rows();

         $this->load->view('templateuser/header');
         $this->load->view('user/data_keranjang', $data);
         $this->load->view('templateuser/footer');

         if ($this->input->post('kirim')) {

             $config['upload_path']          = './assets_user/bukti/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['min_size']             = 0;
            $config['min_width']            = 0;
            $config['min_height']           = 0;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'swal("Proses konfirmasi gagal", "", "warning" );');
                redirect('user/keranjang_belanja');
            }

            $gambar = $_FILES['gambar']['name'];
             
             $data = [

                'kode_user' => $this->input->post('kode_user'),
                'kode_produk' => $this->input->post('kode_produk'),
                'gambar' => $gambar,
                'status' => 'baru'

             ];
             $input = $this->db->insert('tbl_bukti_transaksi', $data);
            $this->session->set_flashdata('message', 'swal("Sukses!!", "Konfirmasi pembayaran berhasil dikirim", "success" );');
            redirect('user/keranjang_belanja');
         }

    }

    function keranjang_belanja_upgrade(){ 
       $kode_user = $this->session->kode_user;
        $data['keranjang'] = $this->db->query("SELECT * FROM tbl_keranjang_upgrade WHERE kode_user = '$kode_user'")->result_array();
       
        $data['jml'] = $this->db->get_where('tbl_keranjang_upgrade',['kode_user' => $this->session->kode_user])->num_rows();

         $this->load->view('templateuser/header');
         $this->load->view('user/data_keranjang_upgrade', $data);
         $this->load->view('templateuser/footer');

         if ($this->input->post('kirim')) {

             $config['upload_path']          = './assets_user/bukti/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['min_size']             = 0;
            $config['min_width']            = 0;
            $config['min_height']           = 0;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'swal("Proses konfirmasi gagal", "", "warning" );');
                redirect('user/keranjang_belanja');
            }

            $gambar = $_FILES['gambar']['name'];
             
             $data = [

                'kode_user' => $this->input->post('kode_user'),
                'kode_produk' => $this->input->post('kode_produk'),
                'gambar' => $gambar,
                'status' => 'upgrade'

             ];
             $input = $this->db->insert('tbl_bukti_transaksi', $data);
            $this->session->set_flashdata('message', 'swal("Sukses!!", "Konfirmasi pembayaran berhasil dikirim", "success" );');
            redirect('user/keranjang_belanja_upgrade');
         }

    }



    function ubah_security_code(){
        $data['sc'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/ubah_security_code', $data);
         $this->load->view('templateuser/footer');

         if ($this->input->post('ubah')) {
             
             $data = [
                'sc_code' => $this->input->post('sc_code'),
             ];
             $this->db->where('kode_user', $this->session->kode_user);
            $this->db->update('tbl_register', $data);

            $this->session->set_flashdata('message', 'swal("Sukses!!", "Security code berhasil diubah", "success" );');
            redirect('ptberkah/ubah-security-code');
         }
    }

    function ubah_password(){
        $data['pass'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

        $this->form_validation->set_rules('pass_baru1', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('pass_baru2', 'Konfirmasi password', 'required|min_length[6]|matches[pass_baru1]');


        if ($this->form_validation->run() == false) {
        
        

         $this->load->view('templateuser/header');
         $this->load->view('user/ubah_pass', $data);
         $this->load->view('templateuser/footer');

     }else{

         if ($this->input->post('ubah')) {
             
             $pass_lama = $this->input->post('pass_lama');
             $cek = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

             if (password_verify($pass_lama, $cek['password'])) {
                
                $data = [

                    'password' => password_hash($this->input->post('pass_baru2'), PASSWORD_DEFAULT),
                ];

                $this->db->where('kode_user', $this->session->kode_user);
                $this->db->update('tbl_register', $data);

                 $this->session->set_flashdata('message', 'swal("Sukses!!", "Password anda berhasil diubah", "success" );');
               redirect('ptberkah/ubah-password');

            
             }else{

                 $this->session->set_flashdata('message', 'swal("Gagal!!", "password lama anda tidak terdaftar", "error" );');
            redirect('ptberkah/ubah-password');
             }
         }

     }



    }



    

	}

 ?>