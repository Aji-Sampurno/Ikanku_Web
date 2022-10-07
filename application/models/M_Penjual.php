<?php
    class M_Penjual extends CI_Model{
    
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
    	
    	function ceklog($username){
            $query = $this->db->query("SELECT * FROM pengguna WHERE username = '$username'");
            return $query->row_array();
        }
        
    	public function check_login($username, $password){
            $sql = "SELECT * FROM pengguna WHERE username = ?";
            $query = $this->db->query($sql, array($username));
            $row = $query->row_array();
    
            if (isset($row)) {
                $hashedPassword = $row['password'];
                if (password_verify($password, $hashedPassword)) return $row;
            } else return false;
        }
        
        function UpdateAkun($username,$nama,$telp, $alamat, $id){
    	    return $this->db->query("UPDATE pengguna SET username='$username', nama='$nama', telp='$telp', alamat='$alamat' WHERE id_pengguna='$id'");
    	}
    
    	function getListBarang(){
            $query = $this->db->query("SELECT * FROM produk ");
            return $query->result_array();
    	}
    
    	function getListProduk($id){
            $query = $this->db->query("SELECT * FROM produk WHERE idpenjual = $id");
            return $query->result_array();
    	}
    
    	function getDetailProduk($id){
    	    $query = $this->db->query("SELECT  * FROM produk WHERE idproduk = $id");
    	    return $query->result_array();
    	}
    	
    	function UpdateProduk($namaproduk,$stok,$hargaproduk,$deskripsi,$idproduk){
    	    return $this->db->query("UPDATE produk SET namaproduk='$namaproduk', stok='$stok', hargaproduk='$hargaproduk', deskripsi='$deskripsi' WHERE idproduk='$idproduk'");
    	}
    	
    	function DeleteProduk($idproduk){
    	    return $this->db->query("DELETE FROM produk WHERE idproduk='$idproduk'");
    	}
    	
    	function BuatPesanan($jumlah,$idproduk){
    	    return $this->db->query("UPDATE produk SET stok= stok - $jumlah WHERE idproduk='$idproduk'");
    	}
    
    	function getListTemp($pembeli){
            $query = $this->db->query("SELECT * FROM produk INNER JOIN temp USING (idproduk) WHERE pembeli = $pembeli");
            return $query->result_array();
    	}
    	
    	function getCheckout($pembeli){
    	    return $this->db->query(" INSERT INTO pesanan (invoice,pembeli,idproduk,jumlah,bayar,pengiriman,alamat,telp,tglpesanan,status) SELECT invoice,pembeli,idproduk,jumlah,bayar,pengiriman,alamat,telp,tglpesanan,status FROM temp WHERE pembeli='$pembeli' ");
    	}
    	
    	function getHapusTemp($pembeli){
    	    return $this->db->query("DELETE FROM temp WHERE pembeli='$pembeli'");
    	}
    
    	function getListKeranjang($id){
            $query = $this->db->query("SELECT * FROM produk INNER JOIN keranjang USING (idproduk) WHERE idpengguna = $id AND jumlah > 0");
            return $query->result_array();
    	}
    	
    	function getDetailKeranjang($id){
    	    $query = $this->db->query("SELECT  * FROM produk INNER JOIN keranjang USING (idproduk) WHERE idkeranjang = $id");
    	    return $query->result_array();
    	}
    
    	function getListPesananDikemas($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli = $id AND status = 'baru' AND jumlah > 0");
            return $query->result_array();
    	}
    
    	function getListPesananDikirim($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli = $id AND status = 'dikirim' AND jumlah > 0");
            return $query->result_array();
    	}
    
    	function getListPesananDiterima($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli = $id AND status = 'selesai' AND jumlah > 0");
            return $query->result_array();
    	}
    	
    	function getDetailPesanan($id){
    	    $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpesanan = $id");
    	    return $query->result_array();
    	}
    
    	function getListPenjualanBaru($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual = $id AND status = 'baru' AND jumlah > 0");
            return $query->result_array();
    	}
    
    	function getListPenjualanDikirim($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual = $id AND status = 'dikirim' AND jumlah > 0");
            return $query->result_array();
    	}
    
    	function getListPenjualanSelesai($id){
            $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual = $id AND status = 'selesai' AND jumlah > 0");
            return $query->result_array();
    	}
    	
    	function getDetailPenjualan($id){
    	    $query = $this->db->query("SELECT  * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpesanan = $id");
    	    return $query->result_array();
    	}
    	
    	function KirimPesanan($idpesanan,$status){
    	    return $this->db->query("UPDATE pesanan SET status='$status' WHERE idpesanan ='$idpesanan'");
    	}
    	
    	function TerimaPesanan($idpesanan,$status){
    	    return $this->db->query("UPDATE pesanan SET status='$status' WHERE idpesanan ='$idpesanan'");
    	}
    	
    	function getPendapatan($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS beli, SUM(bayar) AS total FROM pesanan INNER JOIN produk USING (idproduk) WHERE idpenjual = $id AND status='selesai'");
    	    return $query->result_array();
    	}
    	
    	function getPengeluaran($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS beli, SUM(bayar) AS total FROM pesanan WHERE pembeli = $id AND status='selesai'");
    	    return $query->result_array();
    	}
    	
    	function getPesananDikemas($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan WHERE pembeli = $id AND status='baru'");
    	    return $query->result_array();
    	}
    	
    	function getPesananDikirim($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan WHERE pembeli = $id AND status='dikirim'");
    	    return $query->result_array();
    	}
    	
    	function getPesananSelesai($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan WHERE pembeli = $id AND status='selesai'");
    	    return $query->result_array();
    	}
    	
    	function getPenjualanBaru($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan INNER JOIN produk USING (idproduk) WHERE idpenjual = $id AND status='baru'");
    	    return $query->result_array();
    	}
    	
    	function getPenjualanDikirim($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan INNER JOIN produk USING (idproduk) WHERE idpenjual = $id AND status='dikirim'");
    	    return $query->result_array();
    	}
    	
    	function getPenjualanSelesai($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS total FROM pesanan INNER JOIN produk USING (idproduk) WHERE idpenjual = $id AND status='selesai'");
    	    return $query->result_array();
    	}
    
    	function getKeranjang($id){
            $query = $this->db->query("SELECT COUNT(*) AS total FROM produk INNER JOIN keranjang USING (idproduk) WHERE idpengguna = $id AND jumlah > 0");
            return $query->result_array();
    	}
    
    	function getTemp($id){
            $query = $this->db->query("SELECT COUNT(*) AS total FROM temp WHERE pembeli = $id");
            return $query->result_array();
    	}
    	
    	function DeleteKeranjang($idkeranjang){
    	    return $this->db->query("DELETE FROM keranjang WHERE idkeranjang='$idkeranjang'");
    	}
    
    	function getListEdukasi(){
            $query = $this->db->query("SELECT * FROM edukasi");
            return $query->result_array();
    	}
    
    	function getListKategori(){
            $query = $this->db->query("SELECT * FROM kategori");
            return $query->result_array();
    	}
    
    	function getListProvinsi(){
            $query = $this->db->query("SELECT * FROM provinsi");
            return $query->result_array();
    	}
    
    	function getListKabupaten(){
            $query = $this->db->query("SELECT * FROM kabupaten");
            return $query->result_array();
    	}
    
    	function getListKecamatan(){
            $query = $this->db->query("SELECT * FROM kecamatan");
            return $query->result_array();
    	}
    	
    	function getListProdukKategori($namakategori){
            $query = $this->db->query("SELECT * FROM `produk` WHERE `kategoriproduk` = '$namakategori'");
            return $query->result_array();
    	}
    	
    	function getListFilterLaporanPendapatan($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
            $query = $this->db->query("SELECT * FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
            return $query->result_array();
    	}
    	
    	function getListFilterLaporanPengeluaran($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
            $query = $this->db->query("SELECT * FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
            return $query->result_array();
    	}
    	
    	function Laporkan($idproduk,$laporan){
    	    return $this->db->query("UPDATE produk SET laporan='$laporan' WHERE idproduk ='$idproduk'");
    	}
    	
    	function getTotalBayar($id){
    	    $query = $this->db->query("SELECT COUNT(*) AS beli, SUM(bayar) AS total FROM temp WHERE pembeli = $id");
    	    return $query->result_array();
    	}
    	
    	function getProdukTerjual($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
    	    $query = $this->db->query("SELECT COUNT(*) AS beli FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
    	    return $query->result_array();
    	}
    	
    	function getProdukDibeli($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
    	    $query = $this->db->query("SELECT COUNT(*) AS beli FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
    	    return $query->result_array();
    	}
    	
    	function getProdukPendapatan($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
    	    $query = $this->db->query("SELECT COUNT(*) AS beli, SUM(bayar) AS total FROM produk INNER JOIN pesanan USING (idproduk) WHERE idpenjual='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
    	    return $query->result_array();
    	}
    	
    	function getProdukPengeluaran($idpengguna){
    	    $tahun = date("Y");
            $bulan = date("m");
    	    $query = $this->db->query("SELECT COUNT(*) AS beli, SUM(bayar) AS total FROM produk INNER JOIN pesanan USING (idproduk) WHERE pembeli='$idpengguna' AND (YEAR(tglpesanan),'/',MONTH(tglpesanan))=('$tahun','/','$bulan') AND status='selesai' ");
    	    return $query->result_array();
    	}
    	
    } 
?>
