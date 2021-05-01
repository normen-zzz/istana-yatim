<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
		
	}

	public function index(){
		$this->load->library('leaflet');
		$this->load->model('M_menu');
		$this->load->model('M_slidefoto');
		$this->load->model('M_footer');
		$this->load->model('M_bank');
		$config = array(
 		'center'         => '-0.959, 100.39716', // Center of the map
 		'zoom'           => 12, // Map zoom 
 		);
		$this->leaflet->initialize($config);

		$marker = array(
 		'latlng' 		=>'-0.959, 100.39716', // Marker Location
 		'popupContent' 	=> 'Hi, iam a popup!!', // Popup Content
		 );
		$this->leaflet->add_marker($marker);
		
		$data['map'] =  $this->leaflet->create_map();
		$data['active'] = 'active';
		$data['slidefoto'] = $this->M_slidefoto->tampil_data()->result_array();
		$data['menu'] = $this->M_menu->tampil_data()->result_array();
		$data['bank'] = $this->M_bank->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/index',$data);
	}



	public function artikel(){
		$this->load->model('M_footer');
		$this->load->model('M_artikel');
		$data['active'] = 'active';
		$data['title'] = 'Artikel';
		$data['artikel'] = $this->M_artikel->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/artikel/artikel',$data);
	}

	public function detailartikel(){
		$this->load->model('M_footer');
		$this->load->model('M_artikel');
		$data['active'] = 'active';
		$data['title'] = 'Artikel';
		$data['artikel'] = $this->M_artikel->artikelWhere(['slug_artikel' => $this->uri->segment(3)])->row();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/artikel/detailartikel',$data);
	}


	public function acara(){
		$this->load->model('M_footer');
		$this->load->model('M_acara');
		$data['title'] = 'Acara';
		$data['acara'] = $this->M_acara->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/acara/acara',$data);
	}

	public function detailacara(){
		$this->load->model('M_footer');
		$this->load->model('M_acara');
		$data['active'] = 'active';
		$data['title'] = 'Acara';
		$data['acara'] = $this->M_acara->acaraWhere(['id_acara' => $this->uri->segment(3)])->row();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/acara/detailacara',$data);
	}

	public function tambahdonasiAct()
	{
		$this->load->model('Kirim');
        $config['upload_path'] = './assets/images/donasi/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->upload->initialize($config);
            if(!empty($_FILES['filebukti']['name'])){
            	if ($this->upload->do_upload('filebukti')){
            		$gbr = $this->upload->data();
                    //Compress Image
            		$config['image_library']='gd2';
            		$config['source_image']='./assets/images/donasi/'.$gbr['file_name'];
            		$config['create_thumb']= FALSE;
            		$config['maintain_ratio']= FALSE;
            		$config['quality']= '100%';
            		$config['width']= 710;
            		$config['height']= 420;
            		$config['new_image']= './assets/images/donasi/'.$gbr['file_name'];
            		$this->load->library('image_lib', $config);
            		$this->image_lib->resize();

            		$gambar=$gbr['file_name'];

            		$data = [
            			'nama' => $this->input->post('nama'),
            			'nowa' => $this->input->post('nowa',TRUE),
            			'jumlah' => $this->input->post('jumlah',TRUE),
            			'id_bank' => $this->input->post('bank'),
            			'tanggal' => date("Y-m-d H:i:s"),
            			'bukti' => $gambar,

            		];

            		$this->db->insert('donasi', $data);
            		$this->session->set_flashdata('success-donasi', 'berhasil');
            		$this->Kirim->kirimWablas($this->input->post('nowa'), 'Assalamualaikum '.$this->input->post('nama').' Terima Kasih Anda Sudah Melakukan Donasi Sebesar '. $this->input->post('jumlah'));
            		redirect('User');
            	}else{  
            		redirect('user');
            	}

            }else{
            	redirect('user');
            }
        }


    }
