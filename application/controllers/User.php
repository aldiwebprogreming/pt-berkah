<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * 
	 */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'vendor/autoload.php';


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

        $data['produk_anda'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();


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

         $this->load->view('Templateuser/header');
         $this->load->view('user/invoice', $data);
         $this->load->view('Templateuser/footer');
    }

    function detail_invo($kode_order){ 

        $data['invo'] = $this->db->get_where('tbl_transaksi',['order_id' => $kode_order])->row_array();
    $invo = $this->db->get_where('tbl_transaksi',['order_id' => $kode_order])->row_array();

     $data['produk'] = $this->db->get_where('tbl_produk',['kode_produk' => $invo['kode_produk']])->row_array();

     $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $invo['kode_user_member']])->row_array();

         $this->load->view('Templateuser/header');
         $this->load->view('user/detInvoice', $data);
         $this->load->view('Templateuser/footer');
    
    }


    function profil(){

        $kode_user = $this->session->kode_user;
        $data['profil'] = $this->db->get_where('tbl_profil', ['kode_user' => $kode_user])->row_array();

         $this->load->view('Templateuser/header');
         $this->load->view('user/profil', $data);
         $this->load->view('Templateuser/footer');

    }

    function bonus(){

        $kode_user = $this->session->kode_user;

        $data['cash'] = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $data['spnsor'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $data['lider'] = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        $data['point'] = $this->db->get_where('tbl_bonus_point',['kode_member' => $kode_user])->row_array();


         $this->load->view('Templateuser/header');
         $this->load->view('user/bonus', $data);
         $this->load->view('Templateuser/footer');
    }

    function paket(){
        $kode_user = $this->session->kode_user;
        $user = $this->m_data->get_user('tbl_register', $kode_user);
        $data['produk_anda'] = $this->db->get_where('tbl_produk',['kode_produk' => $user['kode_produk']])->row_array();

       
       
         $this->load->view('Templateuser/header');
         $this->load->view('user/paket', $data);
         $this->load->view('Templateuser/footer');
    }

    function detail_paket(){

        $kode_user = $this->session->kode_user;
        $user= $this->m_data->get_user('tbl_register', $kode_user);
        $data['produk_anda'] = $this->db->get_where('tbl_produk',['kode_produk' => $user['kode_produk']])->row_array();
         $this->load->view('Templateuser/header');
         $this->load->view('user/detail_paket', $data);
         $this->load->view('Templateuser/footer');
    }


    function data_jaringan(){

        $kode_user = $this->session->kode_user;
        $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
        $data['jaringan'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->result_array();
         $this->load->view('Templateuser/header');
         $this->load->view('user/data_jaringan', $data);
         $this->load->view('Templateuser/footer');
    }


    function upgrade_paket(){

        $kode_user = $this->session->kode_user;

        $data['paket'] = $this->db->get_where('tbl_register', ['kode_user' => $kode_user])->row_array();  
        $data['voucher'] = $this->db->get('tbl_voucher')->result_array();

         $this->load->view('Templateuser/header');
         $this->load->view('user/upgrade', $data);
         $this->load->view('Templateuser/footer');

    }


    function data_member(){
        $kode_user = $this->session->kode_user;
        $data['member'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->result_array();

        $data['jml_member'] = $this->db->get_where('tbl_register',['kode_rule' => $kode_user])->num_rows();
        // var_dump($data);
         $this->load->view('Templateuser/header');
         $this->load->view('user/data_member', $data);
         $this->load->view('Templateuser/footer');

    }


    function detail_member($kode_member){
        $data['det'] = $this->db->get_where('tbl_register',['kode_user' => $kode_member])->row_array();
        $data['produk'] = $this->db->get_where('tbl_produk',['jenis_produk' => $data['det']['jenis_paket']])->row_array();

         $this->load->view('Templateuser/header');
         $this->load->view('user/detail_member', $data);
         $this->load->view('Templateuser/footer');

    }


    function upgrade_paketMember($kode_member){


        $data['kode_member'] = $kode_member;
        $data['paket'] = $this->db->get_where('tbl_register', ['kode_user' => $kode_member])->row_array();  
        $data['voucher'] = $this->db->get('tbl_voucher')->result_array();

         $this->load->view('Templateuser/header');
         $this->load->view('user/upgrade_member', $data);
         $this->load->view('Templateuser/footer');

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
         $cek = $this->db->query('SELECT DISTINCT status_voucher FROM tbl_list_voucherproduk order by id DESC LIMIT 1')->row_array();

         $status_voucher = $cek['status_voucher'];

        $data['voucher'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => $status_voucher ])->result_array();

        
        $data['vcr'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => $status_voucher])->num_rows();

        $data['nilai_voucher'] = $this->db->query("SELECT SUM(nilai_voucher) AS total_nilai_voucher FROM tbl_list_voucherproduk WHERE kode_member = '$kode_user' AND status_voucher = '$status_voucher'")->row_array();

        // $data['voucher'] = $this->db->query("SELECT * FROM tbl_list_voucherproduk WHERE kode_member ='$kode_user' ORDER BY LIKE ")

         $this->load->view('Templateuser/header');
         $this->load->view('user/data_voucher_anda', $data);
         $this->load->view('Templateuser/footer');

    }


    function voucher_upgrade($status_voucher){

       $kode_user = $this->session->kode_user;
       $data['voucher'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user, 'status_voucher' => $status_voucher])->result_array();

        $data['vcr'] = $this->db->get_where('tbl_list_voucherproduk', ['kode_member' => $kode_user,'status_voucher' => $status_voucher])->num_rows();

        $data['nilai_voucher'] = $this->db->query("SELECT SUM(nilai_voucher) AS total_nilai_voucher FROM tbl_list_voucherproduk WHERE kode_member = '$kode_user' AND status_voucher ='$status_voucher';")->row_array();

        $data['status_voucher'] = $status_voucher;

         $this->load->view('Templateuser/header');
         $this->load->view('user/data_voucher_upgrade', $data);
         $this->load->view('Templateuser/footer');


    }


    function keranjang(){

         $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
         $sec_code  = substr(str_shuffle($karakter), 0, 8);

         $karakter_pass = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
         $pass  = substr(str_shuffle($karakter_pass), 0, 5);
                
    
        $data = [
            'kode_user' => $this->input->post('kode_user'),
            'name' => $this->input->post('name2'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email2'),
            'no_telp' => $this->input->post('nohp'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'pass2' => $pass,
            'status' => 0,
            'kode_jaringan' => $this->session->kode_user." ".$this->input->post('kode_jaringan') ,
            'kode_rule' => $this->session->kode_user,
            'lider' => '',
            'kode_produk' => $this->input->post('kode_produk'),
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'jenis_paket' => $this->input->post('jenis_paket'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),
            'sc_code' => $sec_code,
            'date_create' => date('Y-m-d'),
            'date_create_upgrade' =>'',


        ];

        $email = $this->input->post('email2');
        $paket = $this->input->post('jenis_paket');
        $bonus = $this->input->post('bonus_sponsor');
        $kode_user = $this->input->post('kode_user');
        $date_create = date('Y-m-d');
        $kode_produk = $this->input->post('kode_produk');

        $this->sendEmail($email, $paket, $bonus, $kode_produk, $kode_user,$date_create);
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
            'date_create' => date('Y-m-d'),
            
        ];


        $this->db->insert('tbl_keranjang_upgrade', $data);

         $this->session->set_flashdata('message', 'swal("Sukses!!", "Produk berhasil di masukan dikeranjang upgrade", "success" );');
        redirect('user/keranjang_belanja_upgrade');



    }


    function keranjang_belanja(){ 
       $kode_user = $this->session->kode_user;
        $data['keranjang'] = $this->db->query("SELECT * FROM tbl_keranjang WHERE kode_rule = '$kode_user' ")->result_array();
       
        $data['jml'] = $this->db->get_where('tbl_keranjang',['kode_rule' => $this->session->kode_user])->num_rows();

         $this->load->view('Templateuser/header');
         $this->load->view('user/data_keranjang', $data);
         $this->load->view('Templateuser/footer');

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

         $this->load->view('Templateuser/header');
         $this->load->view('user/data_keranjang_upgrade', $data);
         $this->load->view('Templateuser/footer');

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

         $this->load->view('Templateuser/header');
         $this->load->view('user/ubah_security_code', $data);
         $this->load->view('Templateuser/footer');

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
        
        

         $this->load->view('Templateuser/header');
         $this->load->view('user/ubah_pass', $data);
         $this->load->view('Templateuser/footer');

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



    function jaringan_baru(){
        $kode_user = $this->session->kode_user;
        $data['jaringan'] = $this->db->get('tbl_register')->result_array();
        $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();

        $this->load->view('Templateuser/header');
         $this->load->view('user/data_jaringan_baru', $data);
         $this->load->view('Templateuser/footer');


    }

    function get_voucher(){
        
    $query = $this->db->get_where('tbl_list_voucherproduk',['kode_member' => $this->session->kode_user])->result_array();
    $no = 1;
    foreach ($query as $data) {
        if (date('Y-m-d')  >= $data['tgl_terbit'] AND date('Y-m-d') < $data['tgl_batasterbit']) {
             echo $data['kode_voucher']. " / " .$data['tgl_terbit']. " s/d " .$data['tgl_batasterbit']."<br>";
             echo $no++;
        }
       
    }

    echo "<hr>";

    foreach ($query as $data) {
        
             echo $data['kode_voucher']. " / " .$data['tgl_terbit']. " s/d " .$data['tgl_batasterbit']."<br>";
       
       
    }

    }

        function sendEmail($email, $paket, $bonus,$kode_produk, $kode_user,$date_create){

            $produk = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();

            $harga = $produk['harga'];
            $jml_voucher = $produk['jumlah_voucher'];

      
         $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aldiiit593@gmail.com',
            'smtp_pass' => 'jmgtfhyvdxqqiuyy',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            $this->email->from('aldiiit593@gmail.com', 'PTB');
            $this->email->to($email);

            $this->email->subject('PTB');

            $slug = str_replace(" ", "%", $paket);

            $get1 = file_get_contents(base_url("email/email.php?bonus=$bonus&&kode_user=$kode_user&&date_create=$date_create&&kode_produk=$kode_produk&&paket=$slug&&harga=$harga"));
                    
            $this->email->message("$get1");

            if (!$this->email->send()){
           $this->session->set_flashdata('message', 'swal("Gagal!!", "Akun email yang ada masukan tidak valid", "error" );');
            redirect('ptberkah/add-member');
        }else{
            echo 'Your e-mail has been sent!';
        }
    }






    function action_ecash(){


        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
         $sec_code  = substr(str_shuffle($karakter), 0, 8);

        $karakter_pass = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
         $pass  = substr(str_shuffle($karakter_pass), 0, 5);
                
    
        $data = [
            'kode_user' => $this->input->post('kode_user'),
            'name' => $this->input->post('name2'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email2'),
            'no_telp' => $this->input->post('nohp'),
            'password' => password_hash($pass, PASSWORD_DEFAULT),
            'pass2' => $pass,
            'status' => 0,
            'kode_jaringan' => $this->session->kode_user." ".$this->input->post('kode_jaringan') ,
            'kode_rule' => $this->session->kode_user,
            'lider' => '',
            'kode_produk' => $this->input->post('kode_produk'),
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'jenis_paket' => $this->input->post('jenis_paket'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),
            'sc_code' => $sec_code,
            'date_create' => date('Y-m-d'),
            'date_create_upgrade' =>'',


        ];

        $input = $this->db->insert('tbl_register', $data);

        if ($input) {
             $kode_produk = $this->input->post('kode_produk');
            $prdk = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();


             $tgl   = date("Y-m-d");
             $tgl_terbit = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
             $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

             $set_harga = $this->db->get('tbl_harga_naik_voucher')->row_array();


             if ($this->input->post('jenis_paket') == 'Paket Reseller Platinum') {
                 
                 for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
                    $kode = rand(1, 100000);
                    $kode_vc = "VCR-".$kode;
                      $data = [
                      'kode_member' =>$this->input->post('kode_user'),
                      'kode_produk' => $prdk['kode_produk'],
                      'name_voucher' => $prdk['jenis_voucher'], 
                      'jenis_paket' => $prdk['jenis_produk'],
                      'nilai_voucher' => $prdk['nilai_voucher'] ,
                      'kode_voucher' => $kode_vc,
                      'tgl_terbit' => $tgl,
                      'tgl_batasterbit' => $tgl_batasterbit, 
                      'status_voucher' => 'baru', 
                    ];

                  $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);     
                }
             }elseif ($this->input->post('jenis_paket') == 'Paket Reseller Gold') {

                for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
                    $kode = rand(1, 100000);
                    $kode_vc = "VCR-".$kode;
                      $data = [
                      'kode_member' => $this->input->post('kode_user'),
                      'kode_produk' => $prdk['kode_produk'],
                      'name_voucher' => $prdk['jenis_voucher'], 
                      'jenis_paket' => $prdk['jenis_produk'],
                      'nilai_voucher' => $prdk['nilai_voucher'],
                      'kode_voucher' => $kode_vc,
                      'tgl_terbit' => $tgl,
                      'tgl_batasterbit' => $tgl_batasterbit, 
                      'status_voucher' => 'baru', 
                    ];

                   $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }
                 
             }elseif ($this->input->post('jenis_paket') == 'Paket Reseller Silver') {

                for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
                    $kode = rand(1, 100000);
                    $kode_vc = "VCR-".$kode;
                    $data = [
                      'kode_member' => $this->input->post('kode_user'),
                      'kode_produk' => $prdk['kode_produk'],
                      'name_voucher' => $prdk['jenis_voucher'], 
                      'jenis_paket' => $prdk['jenis_produk'],
                      'nilai_voucher' => $prdk['nilai_voucher'],
                      'kode_voucher' => $kode_vc,
                      'tgl_terbit' => $tgl,
                      'tgl_batasterbit' => $tgl_batasterbit, 
                      'status_voucher' => 'baru', 
                    ];

                    $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }   
                
             }elseif ($this->input->post('jenis_paket') == 'Paket Reseller Bronze') {
                for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 
                    $kode = rand(1, 100000);
                    $kode_vc = "VCR-".$kode;
                    $data = [
                      'kode_member' => $this->input->post('kode_user'),
                      'kode_produk' => $prdk['kode_produk'],
                      'name_voucher' => $prdk['jenis_voucher'], 
                      'jenis_paket' => $prdk['jenis_produk'],
                      'nilai_voucher' => $prdk['nilai_voucher'],
                      'kode_voucher' => $kode_vc,
                      'tgl_terbit' => $tgl,
                      'tgl_batasterbit' => $tgl_batasterbit, 
                      'status_voucher' => 'baru', 
                    ];

                    $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                }    
            }else{

                $get_set = $this->db->get_where('tbl_setvoucher',['nama_paket' => $this->input->post('jenis_produk')])->row_array();
                $kode_user = $this->input->post('kode_user');
                $kode_produk = $prdk['kode_produk'];
                $voucher = $prdk['jenis_voucher'];
                $nilai_voucher = $prdk['nilai_voucher'];
                $jenis_paket = $this->input->post('jenis_paket');

                $this->voucher($kode_user, $kode_produk, $voucher, $nilai_voucher, $jenis_paket,'baru');

             }

            $data = [

                'kode_member' => $this->input->post('kode_user'),
                'kode_rule_member' =>$this->session->kode_user,
                'bonus_point' => $prdk['bonus_point'],
            ];

            $input_point = $this->db->insert('tbl_bonus_point', $data);

            $kode_user = $this->input->post('kode_user');
            $dataku =  $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
            $kode = $dataku['kode_jaringan'];
            $arr = explode (" ",$kode);
            $jm_arr = count($arr);

            if ($jm_arr == 2) {
                    
                for ($i=0; $i < 2 ; $i++) { 
                                    
                    if ($i == 0) {
                        $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();
                        $harga = $prdk['harga'];
                        $persen = $level_1['jml_level'] / 100 ;
                        $ecash = $persen * $harga;

                        $data = [
                            'kode_user' => $arr[$i],
                            'jml_cash' => $ecash,
                        ];

                        $this->db->insert('tbl_cash', $data);
                        $this->totalBonus($arr[$i]);


                    }else{

                        $level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();
                        $harga = $prdk['harga'];
                        $persen = $level_2['jml_level'] / 100 ;
                        $ecash = $persen * $harga;

                        $data = [
                            'kode_user' => $arr[$i],
                            'jml_cash' => $ecash,
                        ];

                            $this->db->insert('tbl_cash', $data);
                            $this->totalBonus($arr[$i]);
                    }
                }

            }elseif ($jm_arr == 1) {
                for ($i=0; $i < 1 ; $i++) { 

                    if ($i == 0) {

                        $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();

                        $harga = $prdk['harga'];
                        $persen = $level_1['jml_level'] / 100 ;
                        $ecash = $persen * $harga;

                        $data = [
                            'kode_user' => $arr[$i],
                            'jml_cash' => $ecash,
                        ];

                        $this->db->insert('tbl_cash', $data);
                        $this->totalBonus($arr[$i]);

                    }

                }
            }else{
                for ($i=0; $i < 3 ; $i++) { 

                    if ($i == 0) {
                                
                        $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();
                        $harga = $prdk['harga'];
                        $persen = $level_1['jml_level'] / 100 ;
                        $ecash = $persen * $harga;
                        $data = [
                            'kode_user' => $arr[$i],
                            'jml_cash' => $ecash,
                        ];

                    $this->db->insert('tbl_cash', $data);
                    $this->totalBonus($arr[$i]);
                    }elseif ($i == 1) {
                                
                        $level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();
                            $harga = $prdk['harga'];
                            $persen = $level_2['jml_level']/ 100 ;
                            $ecash = $persen * $harga;
                        $data = [
                                'kode_user' => $arr[$i],
                                'jml_cash' => $ecash,
                        ];
                        $this->db->insert('tbl_cash', $data);
                        $this->totalBonus($arr[$i]);
                     }else{
                        $level_3 = $this->db->get_where('tbl_level',['name_level' => 'level 3'])->row_array();
                            $harga = $prdk['harga'];
                            $persen = $level_3['jml_level']/ 100 ;
                            $ecash = $persen * $harga;
                        $data = [
                                'kode_user' => $arr[$i],
                                'jml_cash' => $ecash,
                            ];
                            $this->db->insert('tbl_cash', $data);
                            $this->totalBonus($arr[$i]);
                    }


                 }
            }

            $this->bonus_baru($this->input->post('kode_user'));

            $this->sendEmailPass($this->input->post('email2'), $sc_code, $pass);
               // $this->sendEmail($data_user['email'], $data_user['sc_code'], $data_user['pass2']);


            $this->totalBonus_upgrade($this->session->kode_user, $prdk['harga']);

            $this->session->set_flashdata('message', 'swal("Sukses", "Member berhasil dipersetujui", "success");');
              
            redirect('ptberkah/bonus');
        }
    }

    function sendEmailPass($email, $sc, $pass){

      
         $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'aldiiit593@gmail.com',
            'smtp_pass' => 'jmgtfhyvdxqqiuyy',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];


            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->set_newline("\r\n");

            $this->email->from('aldiiit593@gmail.com', 'PTB');
            $this->email->to($email);

            $this->email->subject('PTB');

            
            
            $get1 = file_get_contents(base_url("email/email2.php?sc=$sc&&pass=$pass"));
                    
            $this->email->message("$get1");

            if (!$this->email->send())
            show_error($this->email->print_debugger());
            else
            echo 'Your e-mail has been sent!';
    }




    function totalBonus_upgrade($kode_user, $harga_produk){
        $kode_user = $kode_user;
        $ref = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $sponsor = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $lider = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        echo $total = $ref['total_cash'] + $sponsor['total_bonus'] + $lider['total_bonus_lider'];

        $data = [
            'kode_member' => $kode_user,
            'total_bonus' => $total - $harga_produk,
        ];

        $cek = $this->db->get_where('tbl_total_bonus', ['kode_member' => $kode_user])->row_array();

        if ($cek == false) {
            $this->db->insert('tbl_total_bonus', $data);
        }else{

            $this->db->where('kode_member', $kode_user);
            $this->db->update('tbl_total_bonus', $data);



        }


    }

    function totalBonus($kode_user){
        $kode_user = $kode_user;
        $ref = $this->db->query("SELECT SUM(jml_cash) AS total_cash FROM tbl_cash WHERE kode_user = '$kode_user';")->row_array();

        $sponsor = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus FROM tbl_bonus_sponsor WHERE kode_user = '$kode_user';")->row_array();

        $lider = $this->db->query("SELECT SUM(jml_bonus) AS total_bonus_lider FROM tbl_bonus_lider WHERE kode_user = '$kode_user';")->row_array();

        echo $total = $ref['total_cash'] + $sponsor['total_bonus'] + $lider['total_bonus_lider'];

        $data = [
            'kode_member' => $kode_user,
            'total_bonus' => $total,
        ];

        $cek = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_user])->row_array();

        if ($cek) {
            
            $this->db->where('kode_member', $kode_user);
            $this->db->update('tbl_total_bonus', $data);
        }else{

        $this->db->insert('tbl_total_bonus' , $data);

        }

    }



      function bonus_baru($kode_user){

        $kode_user = $kode_user;

        $data_rule = $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
        $jaringan = $data_rule['kode_jaringan'];
        $array = explode (" ",$jaringan);

        $produk = $this->db->get_where('tbl_produk',['jenis_produk' => $data_rule['jenis_paket']])->row_array();

        $sponsor = 0;
        $persen = 0;

        foreach ($array as $cek_bonus) {

            $data = $this->db->get_where('tbl_register',['kode_user' => $cek_bonus])->row_array();
             $cek_persen = $data['bonus_sponsor'] - $persen;

            if ($cek_persen < 0) {
               continue;
            }elseif ($data['bonus_sponsor'] == $sponsor) {
                continue;  
            }

            echo $data['username'].", ". $data['bonus_sponsor'] - $persen. "<br>";
            $bonuspushup = $data['bonus_sponsor'] - $persen;

             $sponsor = $data['bonus_sponsor'];
             $persen = $data['bonus_sponsor'];

         
            $jml =$bonuspushup/100;
            $hasil = $jml * $produk['harga'];
            $inputBonus = [

                'kode_user' => $data['kode_user'],
                'jml_bonus' => $hasil,
            ];

            $this->db->insert('tbl_bonus_sponsor', $inputBonus);
            $this->totalBonus($data['kode_user']);

        }


      }

     function voucher($kode_user, $kode_produk, $voucher, $nilai_voucher, $jenis_paket, $status){

        $paket = $jenis_paket;
        $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();

        $tahun1 = $data['tahun_1'];

        $tgl   = date("Y-m-d");
        $tgl_terbit = mktime(0,0,0,date("n"),date("j")+360,date("Y"));
        $tgl_batasterbit = date("Y-m-d", $tgl_terbit);

        for ($i=1; $i <= $tahun1 ; $i++) { 
           
            // echo $i. "/ ".  $tgl." | ".$tgl_batasterbit."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
              'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl,
              'tgl_batasterbit' => $tgl_batasterbit,
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


        $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun2 = $data['tahun_2'];

        $tgl2   = $tgl_batasterbit;
        $tgl_terbit2 = mktime(0,0,0,date("n"),date("j")+730,date("Y"));
        $tgl_batasterbit2 = date("Y-m-d", $tgl_terbit2);

         for ($i=1; $i <= $tahun2 ; $i++) { 
            // echo $i. "/ ".  $tgl2." | ".$tgl_batasterbit2."<br>";
             $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl2,
              'tgl_batasterbit' => $tgl_batasterbit2,  
              'status_voucher' => $status,
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }

     
         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun3 = $data['tahun_3'];

        $tgl3   = $tgl_batasterbit2;
        $tgl_terbit3 = mktime(0,0,0,date("n"),date("j")+1095,date("Y"));
        $tgl_batasterbit3 = date("Y-m-d", $tgl_terbit3);

         for ($i=1; $i <= $tahun3 ; $i++) { 
            // echo $i. "/ ".  $tgl3." | ".$tgl_batasterbit3."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl3,
              'tgl_batasterbit' => $tgl_batasterbit3,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun4 = $data['tahun_4'];

        $tgl4   = $tgl_batasterbit3;
        $tgl_terbit4 = mktime(0,0,0,date("n"),date("j")+1460,date("Y"));
        $tgl_batasterbit4 = date("Y-m-d", $tgl_terbit4);

         for ($i=1; $i <= $tahun4 ; $i++) { 
            // echo $i. "/ ".  $tgl4." | ".$tgl_batasterbit4."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' => $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl4,
              'tgl_batasterbit' => $tgl_batasterbit4,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }


         $paket = $jenis_paket;
         $data = $this->db->get_where('tbl_setvoucher',['nama_paket' => $paket])->row_array();
         $tahun5 = $data['tahun_5'];

        $tgl5   = $tgl_batasterbit4;
        $tgl_terbit5 = mktime(0,0,0,date("n"),date("j")+1825,date("Y"));
        $tgl_batasterbit5 = date("Y-m-d", $tgl_terbit5);

         for ($i=1; $i <= $tahun5 ; $i++) { 
            // echo $i. "/ ".  $tgl5." | ".$tgl_batasterbit5."<br>";
            $kode = rand(1, 100000);
             $kode_vc = "VCR-".$kode;
            $data = [
              'kode_member' => $kode_user,
              'kode_produk' => $kode_produk,
              'name_voucher' => $voucher, 
               'jenis_paket' => $jenis_paket,
              'nilai_voucher' =>  $nilai_voucher ,
              'kode_voucher' => $kode_vc,
              'tgl_terbit' => $tgl5,
              'tgl_batasterbit' => $tgl_batasterbit5,
              'status_voucher' => $status,  
            ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);   
        }



     }


    function upgrade_cicil(){
       
        $data['cek'] = $this->db->get_where('tbl_setupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();
        // if ($data['cek']['produk_tujuan'] == 'Paket Reseller Silver') {
        //      $data['produk'] = $this->db->get_where('tbl_produk',['jenis_produk' => 'Paket Reseller Brown'])->result_array();
        // }elseif ($data['cek']['produk_tujuan'] == 'Paket Reseller Gold') {
            // $this->db->where('jenis_produk','Paket Reseller Silver');
            // $this->db->where('jenis_produk','Paket Reseller Gold');
             $data['produk'] = $this->db->get('tbl_produk')->result_array();
   
        $data['member'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();
        $this->load->view('Templateuser/header');
        $this->load->view('user/upgrade_cicil', $data);
        $this->load->view('Templateuser/footer');
        $kirim = $this->input->post('kirim');
    if (isset($kirim)) {
        
        $data = [
            'kode_member' => $this->session->kode_user,
            'produk_anda' => $this->input->post('produk_anda'),
            'produk_tujuan' => $this->input->post('produk_tujuan'),
            'harga' => $this->input->post('harga'),

        ];
        $input = $this->db->insert('tbl_setupgrade_cicil', $data);
        $this->session->set_flashdata('message', 'swal("Sukses!!", "upgrade cicil anda berhasil di seting", "success" );');
            redirect('user/upgrade_cicil');

    }

    }

    function detcicil($kode_produk){
        $data['produk'] = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();
        $data['sc_code'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();
        $this->load->view('Templateuser/header');
        $this->load->view('user/detcicil', $data);
        $this->load->view('Templateuser/footer');

    }

    function act_keranjang_cicil(){
        
        $user= $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

        $data = [
            'kode_member' => $this->session->kode_user,
            'produk_anda' => $user['jenis_paket'],
            'produk_tujuan' => $this->input->post('produk_tujuan'),
            'kode_produk' => $this->input->post('kode_produk'),
            'harga' => $this->input->post('harga'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor')
        ];

        $input = $this->db->insert('tbl_dataupgrade_cicil', $data);
        $this->session->set_flashdata('message', 'swal("Sukses!!", "upgrade cicil anda berhasil di masukan ke karenjang", "success" );');
            redirect('user/keranjang_cicil');
        

    }

    function keranjang_cicil(){
        $data['keranjang'] = $this->db->get_where('tbl_dataupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();
        $this->load->view('Templateuser/header');
        $this->load->view('user/keranjang_cicil', $data);
        $this->load->view('Templateuser/footer');
    }


    function set_upgrade_cicil(){

        $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

        $data['cek'] = $this->db->get_where('tbl_setupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();

       


        $this->db->like('jenis_produk', 'Reseller');
        $data['prd'] = $this->db->get('tbl_produk')->result_array();
        $this->load->view('Templateuser/header');
        $this->load->view('user/set_cicil', $data);
        $this->load->view('Templateuser/footer');

        if ($this->input->post('kirim')) {
            
            $data = [
            'kode_member' => $this->session->kode_user,
            'produk_anda' => $this->input->post('produk_anda'),
            'produk_tujuan' => $this->input->post('produk_tujuan'),
            'harga' => $this->input->post('harga'),

        ];
        $input = $this->db->insert('tbl_setupgrade_cicil', $data);
        $this->session->set_flashdata('message', 'swal("Sukses!!", "upgrade cicil anda berhasil di seting", "success" );');
            redirect('user/set_upgrade_cicil');
        }
    

    }

    function get_harga(){

        $user = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();
        $pdk = $this->db->get_where('tbl_produk',['kode_produk' => $user['kode_produk']])->row_array();

        $kode = $this->input->get('kode_produk');
        $get = $this->db->get_where('tbl_produk',['kode_produk' => $kode])->row_array();
        $harga = $get['harga'] - $pdk['harga'];
        ?>
        <input type="text" name="harga" class="form-control" value="<?= $harga ?>">

    <?php }


    function upgrade_cicil2(){
        $kode_user = $this->session->kode_user;
        $data['user'] = $this->db->get_where('tbl_register',['kode_user' => $this->session->kode_user])->row_array();

        $data['set'] = $this->db->get_where('tbl_setupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();
        $data['datacicil'] = $this->db->get_where('tbl_dataupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();

        $data['jm_cicil'] = $this->db->query("SELECT SUM(cicilan) AS jm_cicilan FROM tbl_dataupgrade_cicil WHERE kode_member = '$kode_user' AND  status = 1")->row_array();

        $data['set']  = $this->db->get_where('tbl_setupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();

        $this->load->view('Templateuser/header');
        $this->load->view('user/upgrade_cicil2', $data);
        $this->load->view('Templateuser/footer');


     
       
    }

    function action_cicil(){
        $produk = $this->db->get_where('tbl_produk',['kode_produk' => $this->input->post('paket_tujuan')])->row_array();

        $data = [

            'kode_member' => $this->session->kode_user,
            'produk_anda' => $this->input->post('paket_anda'),
            'produk_tujuan' => $this->input->post('paket_tujuan'),
            'kode_produk' => $produk['kode_produk'],
            'harga' => $produk['harga'],
            'cicilan' => $this->input->post('cicil'),
            'status' => 0,

        ];

        $input = $this->db->insert('tbl_dataupgrade_cicil', $data);
        $this->session->set_flashdata('message', 'swal("Sukses!!", "upgrade cicil anda berhasil di masukan ke karenjang", "success" );');
            redirect('user/keranjang_cicil2');
    }

    function keranjang_cicil2(){
        $data['keranjang'] = $this->db->get_where('tbl_dataupgrade_cicil',['kode_member' => $this->session->kode_user, 'status' => 0])->result_array();

    //   $this->db->select('*');
    //   $this->db->from('tbl_bukti_transaksi_cicil');
    //   $this->db->where('id_keranjang', 2);
    //   $this->db->join('tbl_dataupgrade_cicil','tbl_dataupgrade_cicil.id = tbl_bukti_transaksi_cicil.id_keranjang');      
    //   $query = $this->db->get()->result_array();
    // var_dump($query);
    // die();
        $this->load->view('Templateuser/header');
        $this->load->view('user/keranjang_cicil2', $data);
        $this->load->view('Templateuser/footer');

        if ($this->input->post('kirim')) {
            $config['upload_path']          = './assets_user/bukti_cicil/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['min_size']             = 0;
            $config['min_width']            = 0;
            $config['min_height']           = 0;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'swal("Proses konfirmasi gagal", "", "warning" );');
                redirect('user/keranjang_cicil2');
            }

            $gambar = $_FILES['gambar']['name'];
             
             $data = [

                'kode_user' => $this->session->kode_user,
                'kode_produk' => $this->input->post('kode_produk'),
                'gambar' => $gambar,
                'id_keranjang' => $this->input->post('id'),

             ];
             $input = $this->db->insert('tbl_bukti_transaksi_cicil', $data);
             
                 $this->session->set_flashdata('message', 'swal("Sukses!!", "Konfirmasi pembayaran berhasil dikirim", "success" );');
            redirect('user/keranjang_cicil2');
            
            


        }

    }


    function data_cicil(){
        $kode_user = $this->session->kode_user;
        $data['cicil'] = $this->db->get_where('tbl_dataupgrade_cicil',['kode_member' => $this->session->kode_user, 'status' => 1])->result_array();

        $data['jm'] = $this->db->get_where('tbl_dataupgrade_cicil',['kode_member' => $this->session->kode_user, 'status' => 1])->num_rows();
        $data['jm_cicil'] = $this->db->query("SELECT SUM(cicilan) AS jm_cicilan FROM tbl_dataupgrade_cicil WHERE kode_member = '$kode_user'")->row_array();

        $data['set']  = $this->db->get_where('tbl_setupgrade_cicil',['kode_member' => $this->session->kode_user])->row_array();
       
        $this->load->view('Templateuser/header');
        $this->load->view('user/data_cicil', $data);
        $this->load->view('Templateuser/footer');

    }




    

	}

 ?>