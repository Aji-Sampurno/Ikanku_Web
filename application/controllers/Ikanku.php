<?php
	defined('BASEPATH')OR exit('No direct script access allowed');
	class Ikanku extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this -> load -> model('M_Ikanku');
			$this -> load -> helper('url');
			$this -> load -> library('form_validation');
		}
		
		public function index(){
		    redirect('Ikanku/login');
		}

        public function login(){
			$data['title'] = 'Login';
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->load->view('crud/login');
		}

		public function cek_log(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			$cek = $this->M_Ikanku->login($username,$password);
			
			if($cek != FALSE){
				$user = $cek->username;
                $id_admin = $cek->idadmin;
                $password = $cek->password;
		
				$this->session->set_userdata('session_user',$user);
                $this->session->set_userdata('session_id',$id_admin);
				$this->session->set_userdata('session_password',$password);
		
				redirect('Ikanku/dashboard');
			}else{
				redirect('Ikanku/login');
			}
		}

		public function logout(){
            $this->session->sess_destroy();
			redirect('Ikanku/login');
        }

        public function dashboard(){
			$data['title'] = 'Dashborad';
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/dashboard',$data);
		}

        public function penjual(){
			$data['title'] = 'Penjual';
			$data['penjual'] = $this->M_Ikanku->penjual()->result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/penjual/penjual',$data);
		}

        public function produk(){
			$data['title']  = 'Produk';
			$data['produk'] = $this->M_Ikanku->produk()->result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/produk/produk',$data);
		}

        public  function hapus_produk($id){
			$where = array('idproduk' => $id);
			$this->M_Ikanku->hapus_data($where,'produk');
			redirect('Ikanku/produk');
		}

        public function edukasi(){
			$data['title'] = 'Edukasi';
			$data['edukasi'] = $this->M_Ikanku->edukasi()->result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/edukasi',$data);
		}

        public function tambahedukasi(){
			$data['title'] = 'Tambah Edukasi';
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/tambah_edukasi',$data);
		}
		

        public function tambah_edukasi(){
            $tempdir = "gambar/edukasi/";
            $judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$sumber = $this->input->post('sumber');
            if (!file_exists($tempdir))
                mkdir($tempdir,0755); 
                $target_path = $tempdir . basename($_FILES['filegambar']['name']);
                
                //nama gambar
                $nama_gambar="https://jualikanku.my.id/gambar/edukasi/".$_FILES['filegambar']['name'];
                
                //ukuran gambar
                $ukuran_gambar = $_FILES['filegambar']['size'];
                
                if($ukuran_gambar > 5242880 ){ 
                    echo 'Ukuran gambar melebihi 80kb';
                }else{
                    if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
                        $data = array(
                            'judul' => $judul,
                            'isi' => $isi,
                            'sumber' => $sumber,
                            'gambar' => $nama_gambar,);
                        $this->M_Ikanku->input_data($data,'edukasi');
				        redirect('Ikanku/artikel');
                    } else {
                        echo 'Simpan data gagal';
                    }
                }
		}
		
		public function edit_edukasi($id){
			$data['title'] = 'Edit Edukasi';
			$where = array('idedukasi' => $id);
			$data['edukasi'] = $this -> M_Ikanku -> edit_data($where,'edukasi') -> result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/edit_edukasi',$data);
		}
		
		public function update_edukasi(){
			$idedukasi = $this->input->post('idedukasi');
			$judul = $this->input->post('judul');
			$isi = $this->input->post('isi');
			$sumber = $this->input->post('sumber');
            
            $data = array(
                    	'judul' => $judul,
                    	'isi' => $isi,
                        'sumber' => $sumber,
                    	);
                    			    
            $where = array(
			             'idedukasi' => $idedukasi
			             );
			                        
            $this->M_Ikanku->update_data($where,$data,'edukasi');
			redirect('Ikanku/artikel');
		}
		
		public  function hapus_edukasi($id){
			$where = array('idedukasi' => $id);
			$this->M_Ikanku->hapus_data($where,'edukasi');
			redirect('Ikanku/artikel');
		}
		
        public function artikel(){
			$data['title'] = 'Artikel';
			$data['edukasi'] = $this->M_Ikanku->edukasi()->result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/artikel',$data);
		}
		
        public function video(){
			$data['title'] = 'Video';
			$data['video'] = $this->M_Ikanku->video()->result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/video',$data);
		}

        public function tambahvideo(){
			$data['title'] = 'Tambah Video';
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/tambah_video',$data);
		}
		

        public function tambah_video(){
            $judul = $this->input->post('judul');
			$link = $this->input->post('link');
			$sumber = $this->input->post('sumber');
            $data = array(
                        'judul' => $judul,
                        'link' => $link,
                        'sumber' => $sumber,
                        );
            $this->M_Ikanku->input_data($data,'edukasi');
            redirect('Ikanku/video');
		}
		
		public function edit_video($id){
			$data['title'] = 'Edit Video';
			$where = array('idedukasi' => $id);
			$data['edukasi'] = $this -> M_Ikanku -> edit_data($where,'edukasi') -> result();
			$this->load->view('Admin/_Template/head', $data, TRUE);
			$this->template->views('crud/edukasi/edit_video',$data);
		}
		
		public function update_video(){
			$idedukasi = $this->input->post('idedukasi');
			$judul = $this->input->post('judul');
			$link = $this->input->post('link');
			$sumber = $this->input->post('sumber');
            
            $data = array(
                    	'judul' => $judul,
                    	'link' => $link,
                        'sumber' => $sumber,
                    	);
                    			    
            $where = array(
			             'idedukasi' => $idedukasi
			             );
			                        
            $this->M_Ikanku->update_data($where,$data,'edukasi');
			redirect('Ikanku/video');
		}
		
		public  function hapus_video($id){
			$where = array('idedukasi' => $id);
			$this->M_Ikanku->hapus_data($where,'edukasi');
			redirect('Ikanku/video');
		}
		
	}
	
?>
