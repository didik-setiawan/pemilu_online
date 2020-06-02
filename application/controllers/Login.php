<?php

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        $data['title'] = 'Login Page';
        $this->form_validation->set_rules('nis','NIS','required|trim|numeric');
        $this->form_validation->set_rules('nama','Nama','required|trim');
        if($this->form_validation->run() == false){
            $this->load->view('login/header', $data);
            $this->load->view('login/index');
            $this->load->view('login/footer');
        } else {
           $this->pv_login();
        
    }
}

private function pv_login(){
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $user = $this->db->get_where('tbl_siswa',['nis' => $nis])->row_array();

    if($user){
        if($user['nama'] == $nama){
            if($user['memilih'] == 'tidak'){
            
            $data = [
                'user' => $nis,
                'akses' => 'aku'
            ];
            $this->session->set_userdata($data);
            redirect('menu');
                
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Maaf anda sudah memilih</div>');
            redirect('login');
        }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Nama Anda Salah</div>');
            redirect('login');
        }
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Nis Tidak Ditemukan</div>');
            redirect('login');
    }
}
}