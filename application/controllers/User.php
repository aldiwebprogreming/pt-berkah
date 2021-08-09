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
		}

		function index(){
			$this->load->view('Templateuser/header');
			$this->load->view('user/index');
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
    	$this->load->view('Templateuser/header');
    	$this->load->view('user/detPay', $data);
    	$this->load->view('Templateuser/footer');


    }

    function invoice(){
        $kode_user = $this->session->kode_user;
        $data['invo'] = $this->db->get_where('tbl_transaksi',['kode_user' => $kode_user])->result_array();

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
        $data['profil'] = $this->db->get_where('tbl_register', ['kode_user' => $kode_user])->row_array();

         $this->load->view('templateuser/header');
         $this->load->view('user/profil', $data);
         $this->load->view('templateuser/footer');

    }

    function bonus(){

         $this->load->view('templateuser/header');
         $this->load->view('user/bonus');
         $this->load->view('templateuser/footer');
    }

    function paket(){

         $this->load->view('templateuser/header');
         $this->load->view('user/paket');
         $this->load->view('templateuser/footer');
    }

    function detail_paket(){

         $this->load->view('templateuser/header');
         $this->load->view('user/detail_paket');
         $this->load->view('templateuser/footer');
    }




	}

 ?>