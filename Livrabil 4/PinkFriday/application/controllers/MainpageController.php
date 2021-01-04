<?php

class MainPageController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    public function index() {  

        $this->load->helper('url');
        $this->load->helper('cookie');

        $data = [];
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in != TRUE || empty($logged_in))
        {
            $this->session->set_flashdata('error', 'Session has Expired');
            $data['profilepage'] = "SignController";
        }
        else
        {
            $data['profilepage'] = "ProfilePageController";
        }

        
        $this->load->view('mainpage', $data);

    }

    public function logout() {

        $this->load->helper('url');
        $this->load->helper('cookie');

        delete_cookie('user');
        $data['profilepage'] = "SignController";
        $this->load->view('mainpage', $data);

    }

}

?>