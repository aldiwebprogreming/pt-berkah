<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap2 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-uVr7ZDVJbX1nP28v2KV2Do_-', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		
		// Required

		$harga = $this->input->post('harga');
		$nama_produk = $this->input->post('nama_produk');
        $jenis_voucher = $this->input->post('jenis_voucher');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $harga,
		  'quantity' => 1,
		  'name' =>$jenis_voucher,
		);

		

		// Optional
		$item_details = array ($item1_details);

		// Optional
		$billing_address = array(
		  'first_name'    => "Andri",
		  'last_name'     => "Litani",
		  'address'       => "Mangga 20",
		  'city'          => "Jakarta",
		  'postal_code'   => "16602",
		  'phone'         => "081122334455",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Obet",
		  'last_name'     => "Supriadi",
		  'address'       => "Manggis 90",
		  'city'          => "Jakarta",
		  'postal_code'   => "16601",
		  'phone'         => "08113366345",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => $name,
		  'last_name'     => "",
		  'email'         => $email,
		  'phone'         => "",
		  // 'billing_address'  => $billing_address,
		  // 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

       public function finish()
    {   

        $kode_produk = $this->input->post('kode_produk');
        $prdk = $this->db->get_where('tbl_produk',['kode_produk' => $kode_produk])->row_array();
        // var_dump($prdk);

        $tgl   = date("d-m-Y");
        $tgl_terbit = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
        $tgl_batasterbit = date("d-m-Y", $tgl_terbit);
     
         // prosese update paket vouhcer
        // jika ada inputan upgrade maka akan dijalankan

        $upgrade = $this->input->post('upgrade');

        if (isset($upgrade)) {

            $data = [

                'jenis_voucher' => $this->input->post('jenis_voucher'),
                'bonus_sponsor' => $this->input->post('bonus_sponsor'),
                'jenis_paket' =>  $this->input->post('jenis_produk'),
                'update_date' => date_default_timezone_get(),             
            ];

            $this->db->where('kode_user', $upgrade);
            $this->db->update('tbl_register', $data);

            $this->db->where('kode_member', $upgrade);
            $this->db->delete('tbl_list_voucherproduk');

              for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 

                $kode = rand(1, 100000);
                $kode_vc = "VCR-".$kode;
                  $data = [
                  'kode_member' => $upgrade,
                  'kode_produk' => $prdk['kode_produk'],
                  'name_voucher' => $prdk['jenis_voucher'], 
                  'nilai_voucher' => $prdk['nilai_voucher'],
                  'kode_voucher' => $kode_vc,
                  'tgl_terbit' => $tgl,
                  'tgl_batasterbit' => $tgl_batasterbit,  
                ];

                  $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
                  
              }



            
            $cek_point = $this->db->get_where('tbl_bonus_point',['kode_member' => $upgrade])->row_array();

            if ($cek_point == true) {

                $data = [

                    'bonus_point' => $this->input->post('bonus_point'),
                ];
                
                $this->db->where('kode_member', $upgrade);
                $this->db->update('tbl_bonus_point', $data);
            }


            $this->session->set_flashdata('message', 'swal("Sukses!!", "Paket voucher anda berhasil diupgrade", "success");');
            redirect('ptberkah/paket');
            

        }else{

         for ($i=1; $i <= $prdk['jumlah_voucher']  ; $i++) { 

        $kode = rand(1, 100000);
        $kode_vc = "VCR-".$kode;
          $data = [
          'kode_member' => $this->input->post('kode_user'),
          'kode_produk' => $prdk['kode_produk'],
          'name_voucher' => $prdk['jenis_voucher'], 
          'nilai_voucher' => $prdk['nilai_voucher'],
          'kode_voucher' => $kode_vc,
          'tgl_terbit' => $tgl,
          'tgl_batasterbit' => $tgl_batasterbit,  
        ];

          $input_voucher = $this->db->insert('tbl_list_voucherproduk', $data);    
          
      }

        // jika tidak ada inputan upgrade maka terindakasi sebagai member baru yg mendaftar
    
    	$name = $this->input->post('name');
    	$email = $this->input->post('email');
    	$nama_produk = $this->input->post('nama_produk');
    	$kode_produk = $this->input->post('kode_produk');
    	$nama_produk = $this->input->post('nama_produk');

    	$result = json_decode($this->input->post('result_data'), true);
    	// echo 'RESULT <br><pre>';
    	// var_dump($result);
    	// echo '</pre>' ;

    	$data = [
    		'order_id' => $result['order_id'],
    		'kode_produk' => $kode_produk,
            'kode_user' => $this->session->kode_user,
    		'kode_user_member' => $this->input->post('kode_user'),
    		'nama_produk' => $nama_produk,
    		'name' => $name,
    		'email' => $email,
    		'total' => $result['gross_amount'],
    		'payment_type' => $result['payment_type'],
    		// 'bank' => $result['va_numbers'][0]['bank'],
    		// 'va_number' => $result['va_numbers'][0]['va_number'],
    		'pdf_url' => $result['pdf_url'],
    		'status_code' => $result['status_code'],
    	];

    	$input = $this->db->insert('tbl_transaksi', $data);

        // input user 

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
            'jenis_voucher' => $this->input->post('jenis_voucher'),
            'jenis_paket' => $this->input->post('jenis_paket'),
            'bonus_sponsor' => $this->input->post('bonus_sponsor'),


        ];

        $aa = $this->db->insert('tbl_register', $data);




      


        // input bonus point

        $data = [

            'kode_member' => $this->input->post('kode_user'),
            'kode_rule_member' =>$this->session->kode_user,
            'bonus_point' => $this->input->post('bonus_point'),

        ];

          $input_point = $this->db->insert('tbl_bonus_point', $data);

    	if ($input) {


            // input cashbeack 5%, 10%,
            // $cashb = 5; 
            // $harga2 = $result['gross_amount'];
            // $persen2 = $cashb / 100;
            // $ecash2 = $persen2 * $harga2;

            //  $data = [
            //             'kode_user' => $this->input->post('kode_user'),
            //             'jml_cash' => $ecash2
            //             ,
            //      ];

            // $this->db->insert('tbl_cash', $data);
            // end

            // input bonus lider
            
            // $lider = $this->db->get_where('tbl_lider')->row_array();
            // $persen_lider = $lider['bonus'] / 100;
            // $bonus_lider = $persen_lider * $harga2;

            // $data_lider = $this->db->get('tbl_lider')->result_array();
            // foreach ($data_lider as $lider) {
            //     $data = [
            //         'kode_user' => $lider['kode_user'],
            //         'jml_bonus' => $bonus_lider,
            //     ];

            //     $input_lider = $this->db->insert('tbl_bonus_lider', $data);
            // }
            
            // end


            // bonus vendor 0,2 setiap pembelian produk, persen bersifat dinamis dapat di ganti2
            // $vendor = $this->db->get('tbl_register', 1)->row_array();
            // $persen3 = 0.2 / 100;
            // $data = [
            //     'kode_user' => $vendor['kode_user'],
            //     'jml_cash' => $persen3 * $result['gross_amount'],
            // ];
            // $this->db->insert('tbl_cash', $data);
            // end


    		$kode_user = $this->input->post('kode_user');
    		$dataku =  $this->db->get_where('tbl_register',['kode_user' => $kode_user])->row_array();
    		$kode = $dataku['kode_jaringan'];
            $arr = explode (" ",$kode);
            $jm_arr = count($arr);



            if ($jm_arr  == 2) {

                 // $jm = 3;

                for ($i=0; $i < 2 ; $i++) { 

                    
                     if ($i == 0) {
                    $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();
                    $harga = $result['gross_amount'];
                    $persen = $level_1['jml_level'] / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }else{
                    $level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();
                    $harga = $result['gross_amount'];
                    $persen = $level_2['jml_level'] / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                }
                
            }elseif ($jm_arr == 1) {
                // $jm = 3;

                for ($i=0; $i < 1 ; $i++) { 
                   
                     if ($i == 0) {

                    $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();

                    $harga = $result['gross_amount'];
                    $persen = $level_1['jml_level'] / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                }
            } else {

                 

                for ($i=0; $i < 3 ; $i++) { 

                    if ($i == 0) {

                    $level_1 = $this->db->get_where('tbl_level',['name_level' => 'level 1'])->row_array();


                    $harga = $result['gross_amount'];
                    $persen = $level_1['jml_level'] / 100 ;
                    $ecash = $persen * $harga;

                    $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    } elseif ($i == 1) {
                        $level_2 = $this->db->get_where('tbl_level',['name_level' => 'level 2'])->row_array();

                         $harga = $result['gross_amount'];
                        $persen = $level_2['jml_level']/ 100 ;
                        $ecash = $persen * $harga;
                         $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    } else {
                        $level_3 = $this->db->get_where('tbl_level',['name_level' => 'level 3'])->row_array();

                        $harga =  $result['gross_amount'];
                        $persen = $level_3['jml_level'] / 100 ;
                        $ecash = $persen * $harga;

                         $data = [
                        'kode_user' => $arr[$i],
                        'jml_cash' => $ecash,
                    ];

                    $this->db->insert('tbl_cash', $data);
                    }
                   
                }
            }

            // $this->bonus2($this->input->post('kode_user'));
            $this->bonus_baru($this->input->post('kode_user'));

    		redirect('ptberkah/invoice');
    	}else {

            $this->session->set_flashdata('message', 'swal("Anda gagal mendaftarkan sponsor ", "mohon coba beberapa saat lagi", "error");');
            redirect('pptberkah/add-member');
    	}


    }

    }

    

    function bonus2($kode_user){
            // mengambil data sponsor yang di daftarkan
            $kode_sponsor = $kode_user;
            $user = $this->db->get_where('tbl_register',['kode_user' => $kode_sponsor])->row_array();
           // end

           // mengambil data user yang mendaftarkan

           $user_pembawa = $this->db->get_where('tbl_register',['kode_user' => $user['kode_rule']])->row_array();
            // echo $user['jenis_voucher'];

            // mengambil data produk yang di beli oleh sponsor
            $produk = $this->db->get_where('tbl_produk',['jenis_produk' => $user['jenis_paket']])->row_array();

            // mencari jumlah nilai bonus yang di berikan terhadap user yang mendaptarkan
            $harga = $produk['harga'];
            $persen = $user_pembawa['bonus_sponsor'] / 100 ;
            $hasil_bonus = $persen * $harga;


            // menyinpan data user yang mendaptarkan ke tbl_bonus_sponsor
            $data = [

                'kode_user' => $user['kode_rule'],
                'jml_bonus' => $hasil_bonus,

            ];

           $input =  $this->db->insert('tbl_bonus_sponsor', $data);

           // memanggil function bonus lider dan menginput bonus lider
           $this->bonus_lider($produk['harga']);
           // end

           // mengecek apakah data brhasil di input
           if ($input) {
                // jik berhasil maka akan mengambil data-data di atas user yang mendatarkan
                $sponsor = $this->db->get_where('tbl_register',['kode_user' => $user['kode_rule']])->row_array();

                // mengconversi data tersebut ke array
                $jaringan = $sponsor['kode_jaringan'];
                $arr = explode (" ",$jaringan);

                // $bonus = $user['bonus_sponsor'];

                $bonus = $sponsor['bonus_sponsor'];

                foreach ($arr as $data) {
                    $get_bonus = $this->db->get_where('tbl_register',['kode_user'=> $data])->row_array();

                    
                    // jika data bonus sponsor yang di atas sponsor sama dengan user yang mendaptarkan maka perulangan berhenti

                    if ($sponsor['bonus_sponsor'] == $get_bonus['bonus_sponsor']) {   

                        break;
                    }
                    // jika bonus sponsor sudah sama dengan sembilan maka berhenti
                    elseif ($get_bonus['bonus_sponsor'] == 9) {

                        $ml =  $get_bonus['bonus_sponsor'] - $bonus ;

                        $harga = $produk['harga'];
                        $persen = $ml / 100 ;
                        $hasil_bonus = $persen * $harga;

                        $data = [

                                'kode_user' => $get_bonus['kode_user'],
                                'jml_bonus' => $hasil_bonus,

                            ];

                           $this->db->insert('tbl_bonus_sponsor', $data);
                       
                       break;
                    }

                        $ml =  $get_bonus['bonus_sponsor'] - $bonus ;

                        $harga = $produk['harga'];
                        $persen = $ml / 100 ;
                        $hasil_bonus = $persen * $harga;


                        if ($hasil_bonus <= 0) {
                            break;
                        }

                        $data = [

                                'kode_user' => $get_bonus['kode_user'],
                                'jml_bonus' => $hasil_bonus,

                            ];

                           $this->db->insert('tbl_bonus_sponsor', $data);
                  

                    $bonus = $get_bonus['bonus_sponsor'];

                    // echo$rule = $get_bonus['bonus_sponsor'];

                }
                
              
           }




        }


        function bonus_lider($harga){
            $kode_user = 'Ebunga-31302';
            $data = $this->db->get_where('tbl_register', ['kode_user' => $kode_user])->row_array();

            $jaringan = $data['kode_jaringan'];
            $array = explode (" ",$jaringan);
            
            foreach ($array as $lider) {
                $liderData = $this->db->get_where('tbl_register',['kode_user' => $lider])->row_array();
               if ($liderData == null) {
                   echo "salah";
               }else{


                    if ($liderData['lider'] == 'Lider 1') {
                        $getBonus = $this->db->get_where('tbl_lider',['kode_user' => $liderData['kode_user']])->row_array();

                        $persen =$getBonus['bonus']/100;
                        $hasil = $persen * $harga;

                        $inputBonus = [

                            'kode_user' => $liderData['kode_user'],
                            'jml_bonus' => $hasil,
                        ];

                        $input = $this->db->insert('tbl_bonus_lider', $inputBonus);

                    }elseif ($liderData['lider'] == 'Lider 2') {
                        
                        $getBonus = $this->db->get_where('tbl_lider',['kode_user' => $liderData['kode_user']])->row_array();

                        $persen =$getBonus['bonus']/100;
                        $hasil = $persen * $harga;

                        $inputBonus = [

                            'kode_user' => $liderData['kode_user'],
                            'jml_bonus' => $hasil,
                        ];

                        $input = $this->db->insert('tbl_bonus_lider', $inputBonus);
                    }elseif ($liderData['lider'] == 'Lider 3') {
                        
                        $getBonus = $this->db->get_where('tbl_lider',['kode_user' => $liderData['kode_user']])->row_array();

                        $persen =$getBonus['bonus']/100;
                        $hasil = $persen * $harga;

                        $inputBonus = [

                            'kode_user' => $liderData['kode_user'],
                            'jml_bonus' => $hasil,
                        ];

                        $input = $this->db->insert('tbl_bonus_lider', $inputBonus);
                    }

               }
            }

           
    }


    function bonus_baru(){

        $kode_user = 'Ebunga-41805';

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
             } elseif ($data['bonus_sponsor'] == $sponsor ) {


                
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

            

             
        }


    }

}
