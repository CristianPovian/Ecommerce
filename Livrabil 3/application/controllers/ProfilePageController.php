<?php

class ProfilePageController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        ob_start();
    }

    public function index() {  

        $this->load->helper('url');
        $this->load->helper('cookie');
        
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in != TRUE || empty($logged_in))
        {
            $this->session->set_flashdata('error', 'Session has Expired');
            echo "Logged out";
            redirect('MainPageController');
        }
        else
        {
            echo "Logged in ";
            $this->load->view("profile");
        }

    }

    public function logout () {

        $this->load->driver('cache');
        $this->load->helper('url');
        $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();
        redirect('mainpagecontroller');

    }

}

?>