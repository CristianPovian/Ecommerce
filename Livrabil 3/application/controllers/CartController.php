<?php

class CartController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('cart');
        $this->load->helper('url');
        $this->load->helper('cookie');

    }

    public function index() {  

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
            $username = $this->session->userdata('username');
            $loadData = $this->cart->load($username);
            $data['n'] = $loadData['n'];
            $data['cart_data'] = $loadData['array'];
            $data['subtotal'] = $loadData['subtotal'];
            $data['taxes'] = $loadData['taxes'];
            $data['shipping'] = $loadData['shipping'];
        }
        
        $this->load->view('cart', $data);

    }

    public function add() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == TRUE && !empty($logged_in))
        {
            $username = $this->session->userdata('username');
            echo $this->cart->add($_POST['item_name'], $username);
        }
    }

    public function subtract() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == TRUE && !empty($logged_in))
        {
            $username = $this->session->userdata('username');
            echo $this->cart->subtract($_POST['item_name'], $username);
        }
    }

    public function remove() {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == TRUE && !empty($logged_in))
        {
            $username = $this->session->userdata('username');
            echo $this->cart->remove($_POST['item_name'], $username);
        }
    }

    public function insert($item_id) {
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in == TRUE && !empty($logged_in))
        {
            $username = $this->session->userdata('username');
            $this->cart->insert($item_id, $username);
            redirect('CartController');

        }
        else {
            $this->load->view('cart');
        }
    }

}

?>