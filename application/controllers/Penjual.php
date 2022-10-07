<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
	
	class Penjual extends CI_Controller{
	
		function __construct(){
			parent::__construct();
			$this->load->model('M_Penjual');
            $this -> load -> helper('url');
			$this -> load -> library('form_validation');
		}
		
		public function Login(){
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');
		    
		    $pengguna = $this->M_Penjual->ceklog($username);
		    
		    $result = array();
		    $result['login'] = array();
		    
		    if ($pengguna) {
                if (password_verify($password, $pengguna['password'])) {
                    $index['id_pengguna'] = $pengguna['id_pengguna'];
                    $index['username'] = $pengguna['username'];
                    $index['nama'] = $pengguna['nama'];
                    $index['telp'] = $pengguna['telp'];
                    $index['alamat'] = $pengguna['alamat'];
                    $index['namatoko'] = $pengguna['namatoko'];
                    $index['status'] = $pengguna['status'];
    
                    array_push($result['login'], $index);
    
                    $result['success'] = "1";
                    $result['message'] = "success";
                    echo json_encode($result);
                } else {
    
                    $result['success'] = "0";
                    $result['message'] = "Username dan password salah";
                    echo json_encode($result);
                }
            } else {
                $result['success'] = "0";
                $result['message'] = "Username dan password salah";
                echo json_encode($result);
            }
	    }
		
		public function Daftar_Pengguna(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
		        $username = $_POST['username'];
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $no = ltrim($telp, '0');;
                $alamat = $_POST['alamat'];
                $provinsi = $_POST['provinsi'];
                $kabupaten = $_POST['kabupaten'];
                $kecamatan = $_POST['kecamatan'];
                $password = $_POST['password'];
                $status = '1';
            
                $password = password_hash($password, PASSWORD_DEFAULT);
    			
    			
    			$data = array(
        			'username' => $username,
        			'nama' => $nama,
        			'telp' => $no,
        			'password' => $password,
        			'alamat' => $alamat,
        			'provinsi' => $provinsi,
        			'kabupaten' => $kabupaten,
        			'kecamatan' => $kecamatan,
        			'status' => $status,
        		);
        		$this->M_Penjual->input_data($data,'pengguna');
        		echo json_encode($data);
		        
		    }
		}
		
		public function Daftar_Penjual(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
		        $username = $_POST['username'];
                $nama = $_POST['nama'];
                $telp = $_POST['telp'];
                $alamat = $_POST['alamat'];
                $namatoko = $_POST['namatoko'];
                $password = $_POST['password'];
                $status = '2';
                $id = $_POST['id_pengguna'];
                
                $password = password_hash($password, PASSWORD_DEFAULT);
    			
    			
    			$data = array(
        			'username' => $username,
        			'nama' => $nama,
        			'telp' => $telp,
        			'alamat' => $alamat,
        			'namatoko' => $namatoko,
        			'password' => $password,
        			'status' => $status,
        		);
        		
        		$where = array('id_pengguna' => $id);
        		$this->M_Penjual->update_data($where,$data,'pengguna');
        		echo json_encode($data);
		    }
		}
		
		public function Edit_Akun(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
		        $username = $this->input->post('username');
                $nama = $this->input->post('nama');
                $telp = $this->input->post('telp');
                $alamat = $this->input->post('alamat');
                $id = $this->input->post('id_pengguna');
    			
    			$data = array(
        			'username' => $username,
        			'nama' => $nama,
        			'telp' => $telp,
        			'alamat' => $alamat,
        		);
        		
        		$this->M_Penjual->UpdateAkun($username,$nama,$telp, $alamat, $id);
        		echo json_encode($data);
		    }
		}
		
		public function ListBarang(){
            $data = $this->M_Penjual->getListBarang();
            echo json_encode($data);
		}
		
		public function TambahProduk(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
		        $target = "gambar/produk";
    			$idpenjual = $this->input->post('idpenjual');
    			$namaproduk = $this->input->post('namaproduk');
    			$kategoriproduk = $this->input->post('kategoriproduk');
    			$stok = $this->input->post('stok');
    			$hargaproduk = $this->input->post('hargaproduk');
    			$deskripsi = $this->input->post('deskripsi');
    			$gambarproduk = $this->input->post('gambarproduk');
    			
    			$target = $target."/".rand()."_".time().".jpeg";
    			$gambar = "https://jualikanku.my.id/".$target;
    			
    			$data = array(
        			'idpenjual' => $idpenjual,
        			'namaproduk' => $namaproduk,
        			'kategoriproduk' => $kategoriproduk,
        			'stok' => $stok,
        			'hargaproduk' => $hargaproduk,
        			'deskripsi' => $deskripsi,
        			'gambarproduk' => $gambar,
        		);
        		$this->M_Penjual->input_data($data,'produk');
        		echo json_encode($data);
    			
    			if(file_put_contents($target, base64_decode($gambarproduk))){
    			    echo json_encode([
    			        "Message" => "Produk Berhasil Ditambahkan",
    			        "Status" => "OK"
    			        ]);
    			} else {
    			    echo json_encode([
    			        "Message" => "Gagal Menambahkan Produk",
    			        "Status" => "Error"
    			        ]);
    			}   
		        
		    }
		}
		
		public function ListProduk(){
			$idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListProduk($idpenjual);
            echo json_encode($data);
		}
		
		public function DetailProduk(){
		    $idproduk = filter_var($_GET['idproduk'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getDetailProduk($idproduk);
		    echo json_encode($rawData);
		}
		
		public function EditProduk(){
			$idproduk = $this->input->post('idproduk');
    		$namaproduk = $this->input->post('namaproduk');
    		$stok = $this->input->post('stok');
    		$hargaproduk = $this->input->post('hargaproduk');
			$deskripsi = $this->input->post('deskripsi');
    			
    		$data = array(
    		    'idproduk' => $idproduk,
    		    'namaproduk' => $namaproduk,
			    'stok' => $stok,
    		    'hargaproduk' => $hargaproduk,
    		    'deskripsi' => $deskripsi,
    		    );
    			
    		$this->M_Penjual->UpdateProduk($namaproduk,$stok,$hargaproduk,$deskripsi,$idproduk);
    		echo json_encode($data);
		}
		
		public function DeleteProduk(){
		    $idproduk = $this->input->post('idproduk');
    		$data = $this->M_Penjual->DeleteProduk($idproduk);
		}
		
		public function TambahKeranjang(){
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $idpengguna = $this->input->post('idpengguna');
                $idproduk = $this->input->post('idproduk');
                $jumlah = $this->input->post('jumlah');
                
                $data = array(
                    'idproduk' => $idproduk,
                    'idpengguna' => $idpengguna,
                    'jumlah' => $jumlah,
                    );
                    
                $this->M_Penjual->input_data($data,'keranjang');
                echo json_encode($data);
            }
        }
        
		public function ListKeranjang(){
			$idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListKeranjang($idpengguna);
            echo json_encode($data);
		}
		
		public function DetailKeranjang(){
		    $idkeranjang = filter_var($_GET['idkeranjang'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getDetailKeranjang($idkeranjang);
		    echo json_encode($rawData);
		}
		
		public function TambahPesanan(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
		        $invoice    = "IKN".rand();
    			$pembeli    = $this->input->post('idpengguna');
    			$idproduk   = $this->input->post('idproduk');
    			$jumlah     = $this->input->post('jumlah');
    			$bayar      = $this->input->post('bayar');
    			$pengiriman = $this->input->post('pengiriman');
    			$alamat     = $this->input->post('alamat');
    			$telp       = $this->input->post('telp');
    			$tgl        = date('Y-m-d');
    			$status     = "baru";
    			
    			$data = array(
        			'invoice'    => $invoice,
        			'pembeli'    => $pembeli,
        			'idproduk'   => $idproduk,
        			'jumlah'     => $jumlah,
        			'bayar'      => $bayar,
        			'pengiriman' => $pengiriman,
        			'alamat'     => $alamat,
        			'telp'       => $telp,
        			'tglpesanan' => $tgl,
        			'status'     => $status,
        		);
        		$this->M_Penjual->input_data($data,'temp');
    		    $this->M_Penjual->BuatPesanan($jumlah,$idproduk);
                echo json_encode($data);
		        
		    }
		}
		
		public function Checkout(){
		    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		        
    			$pembeli    = $this->input->post('idpengguna');
    			
    			$data = array(
        			'pembeli'    => $pembeli,
        		);
    		    $this->M_Penjual->getCheckout($pembeli);
    		    $this->M_Penjual->getHapusTemp($pembeli);
                echo json_encode($data);
		        
		    }
		}
        
		public function ListTemp(){
			$pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListTemp($pembeli);
            echo json_encode($data);
		}
        
		public function ListPesananDikemas(){
			$pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPesananDikemas($pembeli);
            echo json_encode($data);
		}
        
		public function ListPesananDikirim(){
			$pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPesananDikirim($pembeli);
            echo json_encode($data);
		}
        
		public function ListPesananDiterima(){
			$pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPesananDiterima($pembeli);
            echo json_encode($data);
		}
		
		public function DetailPesanan(){
		    $idpesanan = filter_var($_GET['idpesanan'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getDetailPesanan($idpesanan);
		    echo json_encode($rawData);
		}
        
		public function ListPenjualanBaru(){
			$idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPenjualanBaru($idpenjual);
            echo json_encode($data);
		}
        
		public function ListPenjualanDikirim(){
			$idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPenjualanDikirim($idpenjual);
            echo json_encode($data);
		}
        
		public function ListPenjualanSelesai(){
			$idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListPenjualanSelesai($idpenjual);
            echo json_encode($data);
		}
		
		public function DetailPenjualan(){
		    $idpesanan = filter_var($_GET['idpesanan'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getDetailPenjualan($idpesanan);
		    echo json_encode($rawData);
		}
		
		public function KirimPesanan(){
		    
		    $idpesanan  = $this->input->post('idpesanan');
			$status     = "dikirim";
    			
    		$data = array(
    			'idpesanan'  => $idpesanan,
        		'status'     => $status,
        	);
    			
    		$this->M_Penjual->KirimPesanan($idpesanan,$status);
    		echo json_encode($data);
		}
		
		public function TerimaPesanan(){
		    
		    $idpesanan  = $this->input->post('idpesanan');
			$status     = "selesai";
    			
    		$data = array(
    			'idpesanan'  => $idpesanan,
        		'status'     => $status,
        	);
    			
    		$this->M_Penjual->TerimaPesanan($idpesanan,$status);
    		echo json_encode($data);
		}
		
		public function Pendapatan(){
		    $idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPendapatan($idpenjual);
		    echo json_encode($rawData);
		}
		
		public function Pengeluaran(){
		    $idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPengeluaran($idpenjual);
		    echo json_encode($rawData);
		}
		
		public function PesananDikemas(){
		    $pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPesananDikemas($pembeli);
		    echo json_encode($rawData);
		}
		
		public function PesananDikirim(){
		    $pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPesananDikirim($pembeli);
		    echo json_encode($rawData);
		}
		
		public function PesananDiterima(){
		    $pembeli = filter_var($_GET['pembeli'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPesananSelesai($pembeli);
		    echo json_encode($rawData);
		}
		
		public function PenjualanBaru(){
		    $idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPenjualanBaru($idpenjual);
		    echo json_encode($rawData);
		}
		
		public function PenjualanDikirim(){
		    $idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPenjualanDikirim($idpenjual);
		    echo json_encode($rawData);
		}
		
		public function PenjualanSelesai(){
		    $idpenjual = filter_var($_GET['idpenjual'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getPenjualanSelesai($idpenjual);
		    echo json_encode($rawData);
		}
		
		public function Keranjang(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getKeranjang($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function Temp(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getTemp($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function HapusKeranjang(){
		    $idkeranjang = $this->input->post('idkeranjang');
    		$data = $this->M_Penjual->DeleteKeranjang($idkeranjang);
		}
		
		public function LaporkanProduk(){
		    $idproduk  = $this->input->post('idproduk');
			$laporan     = "dilaporkan";
    			
    		$data = array(
    			'idproduk'  => $idproduk,
        		'laporan'     => $laporan,
        	);
    			
    		$this->M_Penjual->Laporkan($idproduk,$laporan);
    		echo json_encode($data);
		}
		
		public function Edukasi(){
		    $data = $this->M_Penjual->getListEdukasi();
            echo json_encode($data);
		}
		
		public function Kategori(){
		    $data = $this->M_Penjual->getListKategori();
            echo json_encode($data);
		}
		
		public function Provinsi(){
		    $data = $this->M_Penjual->getListProvinsi();
            echo json_encode($data);
		}
		
		public function Kabupaten(){
		    $data = $this->M_Penjual->getListKabupaten();
            echo json_encode($data);
		}
		
		public function Kecamatan(){
		    $data = $this->M_Penjual->getListKecamatan();
            echo json_encode($data);
		}
		
		public function ListProdukkategori(){
			$namakategori = filter_var($_GET['namakategori'], FILTER_SANITIZE_STRING);
            $data = $this->M_Penjual->getListProdukKategori($namakategori);
            echo json_encode($data);
		}
		
		public function ListFilterLaporanPendapatan(){
			$idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getListFilterLaporanPendapatan($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function ListFilterLaporanPengeluaran(){
			$idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getListFilterLaporanPengeluaran($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function TotalBayar(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getTotalBayar($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function ProdukTerjual(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getProdukTerjual($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function ProdukDibeli(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getProdukDibeli($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function ProdukPendapatan(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getProdukPendapatan($idpengguna);
		    echo json_encode($rawData);
		}
		
		public function ProdukPengeluaran(){
		    $idpengguna = filter_var($_GET['idpengguna'], FILTER_SANITIZE_STRING);
		    $rawData = $this->M_Penjual->getProdukPengeluaran($idpengguna);
		    echo json_encode($rawData);
		}
		
	}
	
?>