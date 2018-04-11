<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->model('user_model','user');
        $this->load->model('link_model','link');
        $this->load->model('link_stat_model','link_stat');
    }

    public function index() {
        $this->load->view('dashboard');
    }

    public function generate() {
        $this->form_validation->set_rules('link', 'Link', 'required|prep_url');
        if ($this->form_validation->run()) {
            $randomstring = $this->randomstring();
            $data = array(
               'user_id' => $this->session->userdata('user_id'),
               'code'    => $randomstring,
               'link'    => $this->input->post('link')
            );
            $insert = $this->link->insert($data);
            if($insert){
                die('Generated link is '.$randomstring);
            } else {
                die('Generated link is '.$randomstring);
            }
        } else {
            echo json_encode($this->form_validation->error_array());
        }
    }

    public function randomstring($length = 8) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function links_page() {
        $this->load->view('links_page');
    }

    public function get_links() {
        $links = $this->link->getdata();
        $data = array();
        $no = 0;
        foreach ($links as $link) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $link->code;
            $row[] = $link->link;
            $row[] = '<a href="'.base_url().'dashboard/linkstat/'.$link->id.'">View</a>';
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function linkstat($id) {
        $data = array(
           'link_id'  => $id,
           'ip'       => $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']),
           'browser'  => $this->agent->browser(),
           'time'     => date('Y-m-d H:i:s')
        );

        $insert = $this->link_stat->insert($data);
        if($insert){
            redirect('dashboard/linkstats_page/'.$id);
        }
    }

    public function linkstats_page($id_link='') {
        $data['id_link'] = $id_link;
        $this->load->view('linkstats_page',$data);
    }

    public function get_linkstats($id_link='') {
        $linkstats = $this->link_stat->get_data_by_linkid($id_link);
        $data = array();
        $no = 0;
        foreach ($linkstats as $linkstat) {
            $no++;
            $row = array();
            $row[] = date('d F Y H:i:s',strtotime($linkstat->time));
            $row[] = $linkstat->ip;
            $row[] = $linkstat->browser;
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => count($data),
            "recordsFiltered" => count($data),
            "data" => $data
        );
        echo json_encode($output);
    }
}
