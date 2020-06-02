<?php 
/**
 * 
 */
class Admin extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->session->userdata('admin')){
			redirect('auth');
		}
	}
	
	public function index(){
		$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
		$data['title'] = 'Administrator';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('admin/home');
		$this->load->view('templates/footer');
	}

	public function kelas(){
		$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
		$this->db->order_by('kelas','asc');
		$data['kelas'] = $this->db->get('tbl_kelas')->result_array();
		$data['title'] = 'Kelas';
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/kelas', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_kelas(){
		$this->form_validation->set_rules('kelas','Nama Kelas','required|trim|is_unique[tbl_kelas.kelas]');
		$this->form_validation->set_rules('wali','Nama Wali Kelas','required|trim|min_length[3]');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Kesalahan penulisan harap coba lagi</div>');
            redirect('admin/kelas');
		} else {
			$data = [
				'kelas' => $this->input->post('kelas',true),
				'walikelas' => $this->input->post('wali',true)
			];

			if($this->db->insert('tbl_kelas',$data)){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Data Berhasil ditambahkan</div>');
            redirect('admin/kelas');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Data Gagal ditambahkan</div>');
            redirect('admin/kelas');
			}
		}
	}

	public function detail_kelas($id){
		$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
		$data['kelas'] = $this->db->get_where('tbl_kelas',['id' => $id])->row_array();
		$data['siswa'] = $this->db->get_where('tbl_siswa',['id_kelas' => $id])->result_array();
		$data['title'] = 'Detail Kelas';

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/detail_kelas',$data);
		$this->load->view('templates/footer');
	}

	public function tambah_siswa(){
		$this->form_validation->set_rules('nis','Nis','required|trim|numeric|min_length[4]|max_length[4]|is_unique[tbl_siswa.nis]');
		$this->form_validation->set_rules('siswa','Siswa','required|trim');
		$id = $this->input->post('id_kls');
		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Kesalahan Penulisan Harap Coba Lagi</div>');
            redirect('admin/detail_kelas/'. $id);
		} else {
			$data = [
				'nis' => $this->input->post('nis'),
				'nama' => $this->input->post('siswa'),
				'id_kelas' => $this->input->post('id_kls'),
				'memilih' => 'tidak'
			];

			if($this->db->insert('tbl_siswa',$data)){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Data Berhasil Ditambahkan</div>');
            redirect('admin/detail_kelas/'. $id);
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Data Gagal Ditambahkan</div>');
            redirect('admin/detail_kelas/'. $id);
			}
		}
			
	}

	public function hapus_kelas($id){
		if($this->db->delete('tbl_kelas',['id' => $id])){
			if($this->db->delete('tbl_siswa',['id_kelas' => $id])){
				$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Berhasil menghapus data kelas & siswa</div>');
				redirect('admin/kelas');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal menghapus data siswa dari Kelas</div>');
				redirect('admin/kelas');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal menghapus data kelas</div>');
            redirect('admin/kelas');
		}
	}

	public function edit_kelas($id){
		$data['title'] = 'Edit Kelas';
		$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
		$data['kelas'] = $this->db->get_where('tbl_kelas',['id' => $id])->row_array();

		$this->form_validation->set_rules('kelas', 'Kelas','required|trim|min_length[5]');
		$this->form_validation->set_rules('wali','Walikelas','required|trim|min_length[3]');
		if($this->form_validation->run() == false){
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/edit_kelas',$data);
		$this->load->view('templates/footer');
			
	} else {
		$data = [
			'kelas' => $this->input->post('kelas',true),
			'walikelas' => $this->input->post('wali',true)
		];

		$this->db->where(['id' => $id]);
		if($this->db->update('tbl_kelas',$data)){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Berhasil mengubah data kelas</div>');
            redirect('admin/kelas');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal mengubah data.Coba lagi</div>');
            redirect('admin/edit_kelas/' . $id);
		}
	}
	}

	public function calon(){
		$data['title'] = 'Calon';
		$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
		$data['calon'] = $this->db->get('tbl_calon')->result_array();

		$this->form_validation->set_rules('no','No','required|trim|numeric');
		$this->form_validation->set_rules('nama','Nama','required|trim');

		if($this->form_validation->run() == false){
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar',$data);
		$this->load->view('admin/calon',$data);
		$this->load->view('templates/footer');
	} else {
		$img = $_FILES['img'];

		if($img){
			$config['upload_path'] = './asset/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '5000';
  
			$this->load->library('upload',$config);

			if($this->upload->do_upload('img')){
				$gmb = $this->upload->data('file_name');
			} else {
				$gmb = 'default.jpg';
			}
		
	} 
	$data = [
		'no_urut' => $this->input->post('no'),
		'nama' => $this->input->post('nama'),
		'img' => $gmb,
		'jml_suara' => 0
	];
	if($this->db->insert('tbl_calon',$data)){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Berhasil menambahkan data</div>');
        redirect('admin/calon');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal menambahkan data</div>');
        redirect('admin/calon');
	}
	}

}

public function hapus_calon($no_urut){
	$calon = $this->db->get_where('tbl_calon',['no_urut' => $no_urut])->row_array();
$img = $calon['img'];
	if($this->db->delete('tbl_calon',['no_urut' => $no_urut])){
		unlink(FCPATH .'/asset/img/'. $img);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Berhasil menghapus data</div>');
        redirect('admin/calon');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal menghapus data</div>');
        redirect('admin/calon');
	}
}

public function edit_calon($no_urut){
	$data['title'] = 'Calon';
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
	$data['calon'] = $this->db->get_where('tbl_calon',['no_urut' => $no_urut])->row_array();

	$this->form_validation->set_rules('no' ,'No Urut','required|trim|numeric');
	$this->form_validation->set_rules('nama', 'Nama','required|trim|min_length[3]');

	if($this->form_validation->run() == false){
	
	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar');
	$this->load->view('templates/sidebar',$data);
	$this->load->view('admin/edit_calon',$data);
	$this->load->view('templates/footer');
} else {
	$img = $_FILES['img'];
	if($img) {
		$config['upload_path']          = './asset/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;
		$this->load->library('upload',$config);

		if($this->upload->do_upload('img')){
			$old_img = $data['calon']['img'];
			if($old_img != 'default.jpg'){
				unlink(FCPATH .'asset/img/'. $old_img);
			}
			 $image = $this->upload->data('file_name');
		} else {
			$image = $data['calon']['img'];
		}
	}
	$no = $this->input->post('no', true);
	$nama = $this->input->post('nama', true);

	$this->db->set('no_urut', $no);
	$this->db->set('nama' , $nama);
	$this->db->set('img', $image);
	$this->db->where(['no_urut' => $no_urut]);
	if($this->db->update('tbl_calon')){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Berhasil mengedit data</div>');
        redirect('admin/calon');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Gagal mengedit data</div>');
        redirect('admin/calon');
	}
}
}

public function progres(){
	$data['title'] = 'Progres';
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
	$data['calon'] = $this->db->get('tbl_calon')->result_array();

	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar');
	$this->load->view('templates/sidebar',$data);
	$this->load->view('admin/progres',$data);
	$this->load->view('templates/footer');
}

public function hapus_siswa($nis){
	if($this->db->delete('tbl_siswa',['nis' => $nis])){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Data Berhasil dihapus</div>');
		redirect('admin/kelas');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Data gagal dihapus9</div>');
		redirect('admin/kelas');
	}
}

public function edit_siswa($nis){
	$data['title'] = 'Edit Siswa';
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();
	$data['siswa'] = $this->db->get_where('tbl_siswa',['nis' => $nis])->row_array();

	$this->form_validation->set_rules('nis','NIS','required|trim|numeric');
	$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]');

	if($this->form_validation->run() == false){
	
	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar');
	$this->load->view('templates/sidebar',$data);
	$this->load->view('admin/edit_siswa',$data);
	$this->load->view('templates/footer');
		
} else {
	$ns = $this->input->post('nis',true);
	$nama = $this->input->post('nama',true);
	$this->db->set('nis',$ns);
	$this->db->set('nama',$nama);
	$this->db->where(['nis' => $nis]);
	if($this->db->update('tbl_siswa')){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Data Berhasil diubah</div>');
		redirect('admin/kelas');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Data gagal diubah</div>');
		redirect('admin/kelas');
	}
}
}

public function logout(){
	$this->session->sess_destroy();
	redirect('auth');
}

public function profile(){
	$data['title'] = 'Profile';
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();

	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar');
	$this->load->view('templates/sidebar',$data);
	$this->load->view('admin/profile',$data);
	$this->load->view('templates/footer');
}

public function settings(){
	$data['title'] = 'Settings';
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();

	$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]');
	$this->form_validation->set_rules('pb','required|min_length[3]');
	$this->form_validation->set_rules('kpb','required|min_length[3]');
	$this->form_validation->set_rules('pl','required|min_length[3]');

	if($this->form_validation->run() == false){

	$this->load->view('templates/header',$data);
	$this->load->view('templates/navbar');
	$this->load->view('templates/sidebar',$data);
	$this->load->view('admin/settings',$data);
	$this->load->view('templates/footer');
} else {
	$img = $_FILES['img'];

	if($img){
		$config['upload_path']          = './asset/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 5000;

		$this->load->library('upload',$config);

		if($this->upload->do_upload('img')){
			$old_image = $data['user']['img'];
			if($old_image != 'default.jpg'){
				unlink(FCPATH .'asset/img/'. $old_image);
			}
			$new_img = $this->upload->data('file_name');
		} else {
			$new_img = $data['user']['img'];
		}
	}

	$nama = $this->input->post('nama');
	$id = $data['user']['id'];

	$this->db->set('nama',$nama);
	$this->db->set('img',$new_img);
	$this->db->where(['id' => $id]);

	if($this->db->update('db_admin')){
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Data berhasil diubah</div>');
		redirect('admin/profile');
	} else {
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Data gagal dibah</div>');
		redirect('admin/profile');
	}
}
}

public function change_pass(){
	$data['user'] = $this->db->get_where('db_admin',['username' => $this->session->userdata('admin')])->row_array();

	$pl = $this->input->post('pl');
	$pb = $this->input->post('pb');
	$kpb =  $this->input->post('kpb');

		if($pb == $pl){
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Password lama tidak boleh sama dengan Password Baru</div>');
			redirect('admin/settings');
		} else {
			if($pb != $kpb){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Konfirmasi Password harus sama</div>');
				redirect('admin/settings');
			} else {
				if(password_verify($pl,$data['user']['password'])){
					$p = password_hash($pb,PASSWORD_DEFAULT);
					$this->db->set('password',$p);
					$this->db->where(['username' => $data['user']['username']]);
					if($this->db->update('db_admin')){
						$this->session->set_flashdata('pesan', '<div class="alert alert-success mt-2" role="alert">Password Berhasil Diubah</div>');
			redirect('admin/settings');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Password Gagal diubah</div>');
			redirect('admin/settings');
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger mt-2" role="alert">Password Lama Salah</div>');
			redirect('admin/settings');
				}
			}
		}
}
}