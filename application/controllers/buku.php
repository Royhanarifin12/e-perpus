<?php defined('BASEPATH') or exit('No direct script access allowed');
class Buku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // cek_login();
    }
    public function ubahBuku($id_buku)
    {
        $data['judul'] = 'Ubah buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getBukubyid($id_buku);
        $this->form_validation->set_rules('judul', 'Judul buku', 'required|min_length[3]');
        $this->form_validation->set_rules('penerbit', 'Penerbit buku', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun buku', 'required|min_length[3]|numeric');
        $this->form_validation->set_rules('pengarang', 'pengarang buku', 'min_length[3]');
        $this->form_validation->set_rules('keterangan', 'Keterangan buku', 'min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/ubahbuku', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            $this->ModelBuku->ubahBuku();
            redirect('buku/tambahbuku');
        }
    }

    public function hapusBuku($id_buku)
    {
        $this->ModelBuku->hapusBuku($id_buku);
        redirect('buku/tambahbuku');
    }

    public function tambahBuku()
    {
        $data['judul'] = 'Tambah buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['daftar_buku'] = $this->ModelBuku->getBuku();
        $this->form_validation->set_rules('judul', 'Judul buku', 'required|min_length[3]');
        $this->form_validation->set_rules('penerbit', 'Penerbit buku', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun buku', 'required|min_length[3]|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan buku', 'required|min_length[3]|numeric');
        $this->form_validation->set_rules('pengarang', 'pengarang buku', 'required|min_length[3]|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/tambahbuku', $data);
            $this->load->view('templates/copyright');
            $this->load->view('buku/modaltambahbuku', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul_buku' => $this->input->post('judul'),
                'penerbit_buku' => $this->input->post('penerbit'),
                'tahun_buku' => $this->input->post('tahun'),
                'tahun_buku' => $this->input->post('keterangan'),
                'pengarang_buku' => $this->input->post('pengarang'),
                'foto_buku' => 'default',
            ];
            $this->ModelBuku->simpanBuku($data);
            redirect('buku/tambahBuku');
        }
    }
    public function index()
    {
        $data['judul'] = 'Data buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->Modelbuku->getbuku()->result_array();
        $data['kategori_buku'] = $this->Modelbuku->getKategori()->result_array();
        $this->form_validation->set_rules('id_buku', 'id_buku', 'required|min_length[3]');
        $this->form_validation->set_rules('judul_buku', 'judul_buku', 'required');
        $this->form_validation->set_rules('tahun_buku', 'tahun_buku', 'required|min_length[3]|numeric'); //konfigurasi sebelum gambar diupload 
        $this->form_validation->set_rules('penerbit_buku', 'penerbit_buku', 'required|min_length[3]|numeric'); //konfigurasi sebelum gambar diupload 
        $this->form_validation->set_rules('foto_buku', 'foto_buku', 'required|min_length[3]|numeric'); //konfigurasi sebelum gambar diupload 
        $this->form_validation->set_rules('pengarang_buku', 'pengarang_buku', 'required|min_length[3]|numeric'); //konfigurasi sebelum gambar diupload 
        $this->form_validation->set_rules('keterangan_buku', 'keterangan_buku', 'required|min_length[3]|numeric'); //konfigurasi sebelum gambar diupload 
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '5000';
        $config['max_height'] = '3000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('templates/copyright');
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'judul_buku' => $this->input->post('judul_buku', true),
                'penerbit_buku' => $this->input->post('penerbit_buku', true),
                'tahun_buku' => $this->input->post('tahun_buku', true),
                'tahun_buku' => $this->input->post('pengarang_buku', true),
                'tahun_buku' => $this->input->post('keterangan_buku', true),
                'foto_buku' => $gambar
            ];
            $this->Modelbuku->simpanbuku($data);
            redirect('buku');
        }
    }
}
