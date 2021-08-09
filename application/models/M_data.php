<?php 
	
	/**
	 * 
	 */
	class M_data extends CI_Model
	{
		
		function __construct()
		{
			parent:: __construct();
		}


		function get($table){

			return $this->db->get($table)->result_array();

		}


		function get_user($table, $kode_user){

			return $this->db->get_where($table,['kode_user' => $kode_user])->row_array();
		}

		function get_produk($bonus_sponsor){

			$data = $this->db->get_where('tbl_produk',['bonus_sponsor' => $bonus_sponsor])->row_array();

			return $data;
		}
	}

 ?>