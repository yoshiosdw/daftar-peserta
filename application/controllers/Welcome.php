<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_model'); // sudah ada untuk login
		$this->load->model('Peserta_model'); // ← tambahkan ini
	}
	
	public function index()
	{
		$this->load->view('home');
	}

	function registerNow()
	{

		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('username','User Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$data = array(
					'username'=>$username,
					'email'=>$email,
					'password'=>sha1($password),
					'status'=>'1'
				);

				$this->load->model('user_model');
				$this->user_model->insertuser($data);
				$this->session->set_flashdata('success','Successfully User Created');
				redirect(base_url('welcome/index'));
			}
		}
	}

	function login()
	{
		$this->load->view('login');
	}

	function loginnow()
	{
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run()==TRUE)
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = sha1($password);

				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password,$email);
				if($status!=false)
				{
					$username = $status->username;
					$email = $status->email;

					$session_data = array(
						'username'=>$username,
						'email' => $email,
					);

					$this->session->set_userdata('UserLoginSession',$session_data);

					redirect(base_url('welcome/dashboard'));
				}
				else
				{
					$this->session->set_flashdata('error','Email or Password is Wrong');
					redirect(base_url('welcome/login'));
				}

			}
			else
			{
				$this->session->set_flashdata('error','Fill all the required fields');
				redirect(base_url('welcome/login'));
			}
		}
	}

	// function dashboard()
	// {
	// 	$this->load->view('dashboard');
	// }

	function dashboard() {
		if (!$this->session->userdata('UserLoginSession')) {
			redirect('welcome/login');
		}
	
		$this->load->library('pagination');
		$this->load->model('Peserta_model');
	
		// Konfigurasi pagination
		$config['base_url'] = base_url('welcome/dashboard');
		$config['total_rows'] = $this->Peserta_model->count_all_peserta();
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;
	
		// Styling CSS pagination
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '</span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
	
		$this->pagination->initialize($config);
	
		// Ambil data peserta per halaman
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['peserta'] = $this->Peserta_model->get_peserta_pagination($config['per_page'], $page);
		$data['pagination'] = $this->pagination->create_links();
		$data['total_rows'] = $config['total_rows'];
	
		$udata = $this->session->userdata('UserLoginSession');
		$data['username'] = $udata['username'];
	
		$this->load->view('dashboard', $data);
	}

	function logout()
	{
		session_destroy();
		redirect(base_url('welcome/login'));
	}

	// Form tambah peserta
 function tambah_peserta() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $this->input->post();
        $this->Peserta_model->insert_peserta($data);
        redirect('welcome/dashboard');
    }
    $this->load->view('tambah_peserta');
}

// Form edit peserta
 function edit_peserta($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $this->input->post();
        $this->Peserta_model->update_peserta($id, $data);
        redirect('welcome/dashboard');
    }
    $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id);
    $this->load->view('edit_peserta', $data);
}

// Hapus peserta
 function hapus_peserta($id) {
    $this->Peserta_model->delete_peserta($id);
    redirect('welcome/dashboard');
}

}
