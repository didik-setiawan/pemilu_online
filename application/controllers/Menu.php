<?php
class Menu extends CI_Controller{
    public function index(){
        if(!$this->session->userdata('user')){
            redirect('login');
        }

        if(!$this->session->userdata('akses')){
            redirect('menu/end');
        }
        
        $data['title'] = 'Menu Utama'; 
        $data['user'] = $this->db->get_where('tbl_siswa',['nis' => $this->session->userdata('user')])->row_array(); 
        $data['calon']  = $this->db->get('tbl_calon')->result_array();  
        $this->load->view('login/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('login/footer');
    }

    public function pilih($no_urut){
        $data['user'] = $this->db->get_where('tbl_siswa',['nis' => $this->session->userdata('user')])->row_array(); 
        $calon = $this->db->get_where('tbl_calon',['no_urut' => $no_urut])->row_array();

        $this->db->set('memilih','sudah');
        $this->db->set('dipilih',$no_urut);
        $this->db->where(['nis' => $data['user']['nis']]);
        if($this->db->update('tbl_siswa')){
            $hasil = $calon['jml_suara'] + 1;
            $this->db->set('jml_suara',$hasil);
            $this->db->where(['no_urut' => $no_urut]);
            if($this->db->update('tbl_calon')){
                $this->session->unset_userdata('akses');
                $data = [
                    'access' => 'saya'
                ];
                $this->session->set_userdata($data);
                redirect('menu/end');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal coba lagi</div>');
            redirect('menu');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal coba lagi</div>');
            redirect('menu');
        }
    }

    public function end(){
        if(!$this->session->userdata('user')){
            redirect('login');
        }

        if(!$this->session->userdata('access')){
            redirect('menu/index');
        }
        
        $data['user'] = $this->db->get_where('tbl_siswa',['nis' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Ending';
        $this->load->view('login/header', $data);
        $this->load->view('menu/end', $data);
        $this->load->view('login/footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }
}