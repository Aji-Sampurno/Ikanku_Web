<?php
class M_Pengguna extends CI_Model{

	private $tabel_produk = "`produk`.`id_produk` AS `id_produk`, `produk`.`id_penjual` AS `id_penjual`, `produk`.`nama_produk` AS `nama_produk`, `produk`.`stok` AS `stok`";

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_data($where, $table){
		return $this -> db -> get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}
?>
