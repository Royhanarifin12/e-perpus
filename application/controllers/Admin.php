<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = ' Dashboard';
        $data['user'] = $this->db->get('buku')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dashboard()
    {
        $data['title'] = ' Dashboard';
        $data['user'] = $this->db->get('buku')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('Admin/dashboard', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer', $data);
    }

    public function myprofile()
    {
        $data['title'] = ' Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('User/profile', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer', $data);
    }

    public function menubuku()
    {
        $data['title'] = 'Menu Buku';
        $data['buku'] = $this->db->get('buku')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin');
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('Admin/menubuku', $data);
        $this->load->view('templates/footer', $data);
    }

    public function datauser()
    {
        $data['title'] = ' Data User';
        $data['datauser'] = $this->db->get('user')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbaradmin', $data);
        $this->load->view('Admin/datauser', $data);
        $this->load->view('templates/footer', $data);
    }
}
