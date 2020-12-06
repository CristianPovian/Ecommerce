<?php

class CheckoutController extends CI_Controller {

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
            echo "Logged out";
            redirect('MainPageController');
        }
        else
        {
            echo 'Logged in';
            $data['profilepage'] = "ProfilePageController";
            $this->load->view('checkout', $data);
        }

    }

}

?>