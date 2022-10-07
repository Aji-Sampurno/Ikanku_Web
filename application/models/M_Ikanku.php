<?php
class M_Ikanku extends CI_Model{

	function getALL(){
		$this -> db -> select('*');
		$this -> db -> from('barang');
		$this -> db -> join('kategori','barang.kategori = kategori.id_kategori');
		$query = $this -> db -> get();
		return $query;
	}
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	
	function login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('admin')->row();
	}

	function barang_user(){
		return $this -> db -> get('barang') -> result();
	}
    
	function find($id){
		$result = $this->db->where('id_barang',$id)
						   ->limit(1)
						   ->get('barang');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return array();
		}
	}

	function detail_barang($id_barang){
		$result = $this->db->where('id_barang',$id_barang)->get('barang');
		if($result->num_rows()>0){
			return $result->result();
		}else {
			return false;
		}
	}

	function barang_keranjang(){
		$this->db->where('keranjang.idpelanggan',$this->session->userdata('session_id'));
		return $this -> db -> get('keranjang') -> result();
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
	
	function penjual(){
	    return $this -> db -> query("SELECT * FROM pengguna WHERE status='2'");
	}
	
	function produk(){
	    return $this -> db -> query("SELECT * FROM produk 
                                    WHERE namaproduk NOT LIKE '%lele%' 
                                    OR namaproduk NOT LIKE '%gurame%' 
                                    OR namaproduk NOT LIKE '%mujair%' 
                                    OR namaproduk NOT LIKE '%mas%' 
                                    OR namaproduk NOT LIKE '%patin%' 
                                    OR namaproduk NOT LIKE '%bawal%' 
                                    OR namaproduk NOT LIKE '%nila%' 
                                    OR namaproduk NOT LIKE '%mbelut%' 
                                    OR namaproduk NOT LIKE '%gabus%' 
                                    OR namaproduk NOT LIKE '%sidat%'
                                    OR namaproduk NOT LIKE '%pakan%'
                                    OR namaproduk NOT LIKE '%obat%'
                                    OR namaproduk NOT LIKE '%alat%'
                                    OR laporan = 'dilaporkan'");
	}
	
	function edukasi(){
	    return $this -> db -> query("SELECT * FROM edukasi WHERE isi != ' ' ");
	}
	
	function video(){
	    return $this -> db -> query("SELECT * FROM edukasi WHERE link != ' ' ");
	}
	
	function countProdukLaporan(){
	    return $this->db->query(" SELECT COUNT(*) AS total FROM produk WHERE laporan = 'dilaporkan' ");
	}
	
	function countProdukStatistik1(){
        $tahun = date("Y");
        $bulan = date("m");
        $hari = date("d");
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik2(){
	    $d=strtotime("-1 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik3(){
	    $d=strtotime("-2 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik4(){
	    $d=strtotime("-3 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik5(){
	    $d=strtotime("-4 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik6(){
	    $d=strtotime("-5 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countProdukStatistik7(){
	    $d=strtotime("-6 day");
        $tahun = date("Y", $d);
        $bulan = date("m", $d);
        $hari = date("d", $d);
        
	    return $this->db->query(" SELECT COUNT(*) AS total FROM pesanan WHERE (YEAR(tglpesanan),'/',MONTH(tglpesanan),'/',DAY(tglpesanan))=('$tahun','/','$bulan','/','$hari') ");
	}
	
	function countEdukasi(){
	    return $this->db->query(" SELECT COUNT(*) AS total FROM edukasi ");
	}
}
?>
