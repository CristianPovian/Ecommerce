<?php

class CheckoutController extends CI_Controller {

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
            echo "Logged out";
            redirect('MainPageController');
        }
        else
        {
            //echo 'Logged in';
            $data['profilepage'] = "ProfilePageController";
            $username = $this->session->userdata('username');
            $loadData = $this->cart->load($username);
            $data['n'] = $loadData['n'];
            if ($loadData['n'] == 0) redirect('MainPageController');
            $data['cart_data'] = $loadData['array'];
            $data['subtotal'] = $loadData['subtotal'];
            $data['taxes'] = $loadData['taxes'];
            $data['shipping'] = $loadData['shipping'];
            $data['total'] = $data['subtotal'] + $data['taxes'] + $data['shipping'];

            $this->load->database();
            $user_id = $this->session->userdata('username');
            $this->db->where('id', $user_id);
            $query = $this->db->get('users');
            $queryResult = $query->result();
            foreach($queryResult as $resultRow) {

                $data['email'] = $resultRow->email;
                $data['id'] = $resultRow->id;
                $data['fullname'] = $resultRow->full_name;
                $data['phone'] = $resultRow->phone;
                $data['address'] = $resultRow->address;

            }

            $this->load->view('checkout', $data);
        }

    }

}

?>