<?php 

class Home extends CI_Controller {
	

	public function index($nama = '')
	{	
		$data['judul'] = 'Halaman Home';
		$data['nama'] = '';
	
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->load->view('templetes/header',$data);
			$this->load->view('home/index',$data);
			$this->load->view('templetes/footer');
		} else {
			$this->_sendEmail();
			$data['nama'] = 'Email Terkirim';
			$this->load->view('templetes/header',$data);
			$this->load->view('home/index',$data);
			$this->load->view('templetes/footer');
		}
	}

	private function _sendEmail()
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'septianferi74@gmail.com',
			'smtp_pass' => '',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];
		$this->load->library('email',$config);
		$this->email->initialize($config);
		
		$this->email->from('septianferi74@gmail.com', 'My App');
		$this->email->to($this->input->post('email'));
		$this->email->subject('hello');
		$this->email->message('hello world');
		
		
		if ($this->email->send()) {
			return true;
		}else{
		echo $this->email->print_debugger();
		die;
		}
		
	}

}
