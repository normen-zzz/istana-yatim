<?php
defined('BASEPATH') OR exit('No direct script access allowed');


date_default_timezone_set('Asia/Jakarta');
setlocale(LC_TIME, "id_ID.UTF8");
class User extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('upload');
		$this->load->library('pagination');
		
	}

	public function index(){
		$this->load->library('leaflet');		
		$this->load->model('M_berkah');
		$this->load->model('M_ceritasantri');
		$this->load->model('M_acara');
		$this->load->model('M_donasi');
		$this->load->model('M_slidefoto');
		$this->load->model('M_footer');
		$this->load->model('M_bank');
		$this->load->model('M_youtube');
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
		$data['bank'] = $this->M_bank->tampil_data()->result_array();
		$data['donasi'] = $this->M_donasi->joinBank(['konfirmasi' =>'1'])->result_array();
		$data['youtube1'] = $this->M_youtube->youtubeWhere(['id_youtube' => 1])->row_array();
		$data['youtube2'] = $this->M_youtube->youtubeWhere(['id_youtube' => 2])->row_array();
		$data['youtube3'] = $this->M_youtube->youtubeWhere(['id_youtube' => 3])->row_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/index',$data);
	}



	public function berkah(){
		$this->load->model('M_footer');
		$this->load->model('M_berkah');


		//konfigurasi pagination
        $config['base_url'] = site_url('Berkah-List'); //site url
        $config['total_rows'] = $this->db->count_all('berkah'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['pagination'] = $this->pagination->create_links();





		$data['active'] = 'active';
		$data['title'] = 'berkah';
		$data['berkah'] = $this->M_berkah->tampil_datalimit($config["per_page"], $data['page'])->result_array();
		$data['berkahpopuler'] = $this->M_berkah->berkah_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/berkah/berkah',$data);
	}

	public function searchberkah(){
		$this->load->model('M_footer');
		$this->load->model('M_berkah');

		$keyword = $this->input->post('keyword');

    $data['pagination'] = '';
		$data['active'] = 'active';
		$data['title'] = 'berkah';
		$data['berkah'] = $this->M_berkah->search($keyword)->result_array();
		$data['berkahpopuler'] = $this->M_berkah->berkah_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/berkah/berkah',$data);
	}

	public function detailberkah(){
		$this->load->model('M_footer');
		$this->load->model('M_berkah');
		$data['active'] = 'active';
		$data['title'] = 'berkah';
		$data['berkah'] = $this->M_berkah->berkahWhere(['slug_berkah' => $this->uri->segment(2)])->row();
		$data['berkahpopuler'] = $this->M_berkah->berkah_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/berkah/detailberkah',$data);
		$this->add_count($this->uri->segment(2));
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

		//konfigurasi pagination
        $config['base_url'] = site_url('Ceritasantri-List'); //site url
        $config['total_rows'] = $this->db->count_all('ceritasantri'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['pagination'] = $this->pagination->create_links();




		$data['active'] = 'active';
		$data['title'] = 'Cerita Santri';
		$data['ceritasantri'] = $this->M_ceritasantri->tampil_datalimit($config["per_page"], $data['page'])->result_array();
		$data['ceritasantripopuler'] = $this->M_ceritasantri->ceritasantri_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/ceritasantri/ceritasantri',$data);
	}

	public function searchceritasantri(){
		$this->load->model('M_footer');
		$this->load->model('M_ceritasantri');

		
		$keyword = $this->input->post('keyword');
		$data['pagination'] = '';
		$data['active'] = 'active';
		$data['title'] = 'Cerita Santri';
		$data['ceritasantri'] = $this->M_ceritasantri->search($keyword)->result_array();
		$data['ceritasantripopuler'] = $this->M_ceritasantri->ceritasantri_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/ceritasantri/ceritasantri',$data);
	}

	public function detailceritasantri(){
		$this->load->model('M_footer');
		$this->load->model('M_ceritasantri');
		$data['active'] = 'active';
		$data['title'] = 'Cerita Santri';
		$data['ceritasantri'] = $this->M_ceritasantri->ceritasantriWhere(['slug_ceritasantri' => $this->uri->segment(2)])->row();
		$data['ceritasantripopuler'] = $this->M_ceritasantri->ceritasantri_populer()->result_array();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/ceritasantri/detailceritasantri',$data);
		$this->add_counting($this->uri->segment(2));
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
		$data['acara'] = $this->M_acara->acaraWhere(['slug_acara' => $this->uri->segment(2)])->row();
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$this->load->view('user/acara/detailacara',$data);
	}


	private function rupiah($angka){

		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;

	}


//DONASI

	public function infodonasi(){
		$this->load->model('M_footer');
		$this->load->model('M_acara');
		$this->load->model('M_donasi');
		$this->load->model('M_pengeluaran');
		$data['title'] = 'Info Donasi';
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$data['infodonasi'] = $this->db->get('update_donasi')->row_array();
		$data['donasiperbulan'] = $this->M_donasi->donasiperbulan(['konfirmasi' => 1])->row();
		$data['pengeluarandonasiperbulan'] = $this->M_pengeluaran->pengeluarandonasiperbulan()->row();
		$data['pengeluarandonasi'] = $this->M_pengeluaran->tampil_data()->result_array();
		$this->load->view('user/donasi/infodonasi',$data);
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
            		$this->db->insert('formall',['nama_formall' => $this->input->post('nama'),'nomor_formall' => $this->input->post('nowa',TRUE)]);
            		$this->session->set_flashdata('success-donasi', 'berhasil');
            		$this->Waapi->kirimWablas($this->input->post('nowa'), "Assalamu'alaikum warahmatullahi wabarakatuh, Yang terhormat Bp/ibu ".$this->input->post('nama').' Terima Kasih Anda Sudah Melakukan Donasi Sebesar '. ("Rp " . number_format($this->input->post('jumlah'),2,',','.')));
            		redirect('User');
            	}else{  
            		redirect('user');
            	}

            }else{
            	redirect('user');
            }
        }

        //tentang
        public function tentang(){
		$this->load->model('M_footer');
		$this->load->model('M_tentang');
		$data['title'] = 'Info Donasi';
		$data['footer'] = $this->M_footer->tampil_data()->row_array();
		$data['tentang'] = $this->M_tentang->tampil_data()->row();
		$this->load->view('user/tentang/tentang',$data);
	}

	public function tambahformAct()
    {
        $this->load->model('Waapi');
        $data = [
           'nama_form' => $this->input->post('nama'),
           'nomor_form' => $this->input->post('nomor', true),
           'kelamin_form' => $this->input->post('kelamin'),
           'acara_form' => $this->input->post('acara'),
       ];

       $this->db->insert('form', $data);
       $this->db->insert('formall',['nama_formall' => $this->input->post('nama'),'nomor_formall' => $this->input->post('nomor',TRUE)]);
       $this->Waapi->kirimWablas($this->input->post('nomor'), 'Assalamualaikum '.$this->input->post('nama').' Terima Kasih Anda Sudah Mendaftar Event '. $this->input->post('judul'));
       redirect('Acara-Detail/'. $this->input->post('slug'));

   }


 }
