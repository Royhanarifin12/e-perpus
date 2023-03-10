<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/Auth_header');
            $this->load->view('Auth/login');
            $this->load->view('templates/Auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // usernya aktif
            if ($user['is_active'] == 1) {
                //  cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        "email" => $user['email'],
                        "role_id" => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            User is not active!</div>');
            redirect('Auth');
        }
    }

    public function input_registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        [
            'is_unique' => 'this email has already registered!'
        ];

        $this->form_validation->set_rules('Password1', 'Password1', 'required|trim|min_length[3]|matches[Password2]', [
            'matches' => 'Password dont match!',
        ]);
        $this->form_validation->set_rules('Password2', 'Password2', 'required|matches[Password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'e-perpus User Registration';
            $this->load->view('templates/Auth_header', $data);
            $this->load->view('Auth/registration');
            $this->load->view('templates/Auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'email' => htmlspecialchars($this->input->post('email', 'true')),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('Password1'),
                    PASSWORD_DEFAULT
                ),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date('d:m:y')
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! your account has been created. Please Login!</div>');
            redirect('Auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        you have been logout</div>');
        redirect('Auth');
    }
}
