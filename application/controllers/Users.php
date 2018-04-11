<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model','user');
    }

    public function index() {
        if($this->session->userdata('LoggedIn')){
            redirect('dashboard');
        }else{
            redirect('login');
        }
    }

    public function login() {
        if($this->input->post('form_submit')){
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            if ($this->form_validation->run() == true) {
                $con['returnType'] = 'single';
                $con['conditions'] = array(
                    'username'=>$this->input->post('username'),
                    'password' => md5($this->input->post('password'))
                );
                $checkLogin = $this->user->getRows($con);

                if($checkLogin){
                    $this->session->set_userdata('LoggedIn',TRUE);
                    $this->session->set_userdata('user_id',$checkLogin['id']);
                    redirect('dashboard');
                }else{
                    $data['error_msg'] = 'Wrong username or password, please try again.';
                }
            } else {
                $data['username'] = $this->input->post('username');
                $this->load->view('login',$data);
            }
        } else {
            $this->load->view('login');
        }
	  }

    public function register() {
        $data = array();
        if($this->input->post('form_register')){
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $data = array(
               'username' => $this->input->post('username'),
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
           );

           if($this->form_validation->run() == true){
               $insert = $this->user->insert($data);
               if($insert){
                   redirect('login');
                   $this->session->set_userdata('success_msg', 'Your registration was successfully. Please login.');
               }else{
                   $data['error_msg'] = 'Some problems occured, please try again.';
                   $this->load->view('register',$data);
               }
           } else {
               $this->load->view('register',$data);
           }
        } else {
            $this->load->view('register');
        }
	  }

    public function logout() {
        $this->session->unset_userdata('LoggedIn');
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect('login');
    }
}
