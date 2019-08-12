
<?php  

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mahasiswa_model');
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		$data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
		if($this->input->post('keyword')){
			$data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
		}
		$data['judul'] = 'Daftar Mahasiswa';
		$this->load->view("templetes/header",$data);
		$this->load->view("index",$data);
		$this->load->view("templetes/footer");
	}
	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data Mahasiswa';

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nrp','Nrp','required|numeric');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if ($this->form_validation->run() == FALSE ) {
		$this->load->view("templetes/header",$data);
		$this->load->view("tambah",$data);
		$this->load->view("templetes/footer");
		} else{
		$this->Mahasiswa_model->tambahDataMahasiswa();
		$this->session->set_flashdata('flash','Ditambahkan');
		redirect('Mahasiswa');
		}
	}
	public function hapus($id)	
	{
		$this->Mahasiswa_model->hapusDataMahasiswa($id);
		$this->session->set_flashdata('flash','Dihapus');
		redirect('mahasiswa');
	}
	public function detail($id)
	{
		$data['judul'] = 'Detail Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
		$this->load->view("templetes/header",$data);
		$this->load->view("detail",$data);
		$this->load->view("templetes/footer");
	}
	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data Mahasiswa';
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
		$data['jurusan'] = ['Teknik Informatika','Teknik Industri','Teknik Pangan','Teknik Pertanian'];
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('nrp','Nrp','required|numeric');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if ($this->form_validation->run() == FALSE ) {
		$this->load->view("templetes/header",$data);
		$this->load->view("ubah",$data);
		$this->load->view("templetes/footer");
		} else{
		$this->Mahasiswa_model->ubahDataMahasiswa();
		$this->session->set_flashdata('flash','Diubah');
		redirect('Mahasiswa');
		}
	}
}
