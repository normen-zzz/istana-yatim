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
		$this->load->model('M_berkah');
		$this->load->model('M_ceritasantri');
		$this->load->model('M_acara');
		$this->load->model('M_donasi');
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
		$data['berkah'] = $this->M_berkah->tampil_data()->result_array();
		$data['hitungberkah'] = $this->M_berkah->hitung_berkah();
		$data['hitungceritasantri'] = $this->M_ceritasantri->hitung_ceritasantri();
		$data['hitungacara'] = $this->M_acara->hitung_acara();
		$data['menu'] = $this->M_menu->tampil_data()->result_array();
		$data['bank'] = $this->M_bank->tampil_data()->result_array();
		$data['donasi'] = $this->M_donasi->tampil_data()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/index',$data);
	}



	public function berkah(){
		$this->load->model('M_footer');
		$this->load->model('M_berkah');
		$data['active'] = 'active';
		$data['title'] = 'berkah';
		$data['berkah'] = $this->M_berkah->tampil_data()->result_array();
		$data['berkahpopuler'] = $this->M_berkah->berkah_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/berkah/berkah',$data);
	}

	public function detailberkah(){
		$this->load->model('M_footer');
		$this->load->model('M_berkah');
		$data['active'] = 'active';
		$data['title'] = 'berkah';
		$data['berkah'] = $this->M_berkah->berkahWhere(['slug_berkah' => $this->uri->segment(3)])->row();
		$data['berkahpopuler'] = $this->M_berkah->berkah_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/berkah/detailberkah',$data);
		$this->add_count($this->uri->segment(3));
	}

	// This is the counter function.. 
	private function add_count($slug)
	{
		$this->load->model('M_berkah');
	// load cookie helper
		$this->load->helper('cookie');
	// this line will return the cookie which has slug name
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);
	// this line will return the visitor ip address
		$ip = $this->input->ip_address();
	// if the visitor visit this article for first time then //
	//set new cookie and update article_views column  ..
	//you might be notice we used slug for cookie name and ip 
	//address for value to distinguish between articles  views
		if ($check_visitor == false) {
			$cookie = array(
				"name"   => urldecode($slug),
				"value"  => "$ip",
				"expire" =>  time() + 7200,
				"secure" => false
			);
			$this->input->set_cookie($cookie);
			$this->M_berkah->update_counter(urldecode($slug));
		}
	}

	public function ceritasantri(){
		$this->load->model('M_footer');
		$this->load->model('M_ceritasantri');
		$data['active'] = 'active';
		$data['title'] = 'Cerita Santri';
		$data['ceritasantri'] = $this->M_ceritasantri->tampil_data()->result_array();
		$data['ceritasantripopuler'] = $this->M_ceritasantri->ceritasantri_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/ceritasantri/ceritasantri',$data);
	}

	public function detailceritasantri(){
		$this->load->model('M_footer');
		$this->load->model('M_ceritasantri');
		$data['active'] = 'active';
		$data['title'] = 'Cerita Santri';
		$data['ceritasantri'] = $this->M_ceritasantri->ceritasantriWhere(['slug_ceritasantri' => $this->uri->segment(3)])->row();
		$data['ceritasantripopuler'] = $this->M_ceritasantri->ceritasantri_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/ceritasantri/detailceritasantri',$data);
		$this->add_counting($this->uri->segment(3));
	}

	// This is the counter function.. 
	private function add_counting($slug)
	{
		$this->load->model('M_ceritasantri');
	// load cookie helper
		$this->load->helper('cookie');
	// this line will return the cookie which has slug name
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);
	// this line will return the visitor ip address
		$ip = $this->input->ip_address();
	// if the visitor visit this article for first time then //
	//set new cookie and update article_views column  ..
	//you might be notice we used slug for cookie name and ip 
	//address for value to distinguish between articles  views
		if ($check_visitor == false) {
			$cookie = array(
				"name"   => urldecode($slug),
				"value"  => "$ip",
				"expire" =>  time() + 7200,
				"secure" => false
			);
			$this->input->set_cookie($cookie);
			$this->M_ceritasantri->update_counter(urldecode($slug));
		}
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
	$data['acara'] = $this->M_acara->acaraWhere(['slug_acara' => $this->uri->segment(3)])->row();
	$data['footer'] = $this->M_footer->tampil_data()->row_array();
	$this->load->view('user/acara/detailacara',$data);
}


public function tambahdonasiAct()
{
	$this->load->model('Waapi');
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
            		$this->Waapi->kirimWablas($this->input->post('nowa'), 'Assalamualaikum '.$this->input->post('nama').' Terima Kasih Anda Sudah Melakukan Donasi Sebesar '. $this->input->post('jumlah'));
            		redirect('User');
            	}else{  
            		redirect('user');
            	}

            }else{
            	redirect('user');
            }
        }


    }
