<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = ' Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/Profile', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer', $data);
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/profile', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer', $data);
    }

    public function sewabuku()
    {
        $data['title'] = 'Sewa Buku';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/sewabuku', $data);
        $this->load->view('templates/copyright');
        $this->load->view('templates/footer', $data);
    }


    public function menubuku()
    {
        $data['title'] = 'Menu Buku';
        $data['buku'] = $this->db->get('buku')->result_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('User/menubuku', $data);
        $this->load->view('templates/footer', $data);
    }
}
