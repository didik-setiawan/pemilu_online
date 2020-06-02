<?php 
/**
 * 
 */
class Auth extends CI_Controller
{


	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}
	
	public function index(){
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('pass','Password','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/index');
		} else {
			$this->pv_login();
		}
	}

	private function pv_login(){
		$username = $this->input->post('username');
		$pass = $this->input->post('pass');
		$admin = $this->db->get_where('db_admin',['username' => $username])->row_array();

		if ($admin) {
			if (password_verify($pass, $admin['password'])) {
				$data = [
					'admin' => $username
				];
				$this->session->set_userdata($data);
				redirect('admin/index');
			} else {
				 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah</div>');
            redirect('auth');
			}
		} else {
			 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar</div>');
            redirect('auth');
		}
	}
}