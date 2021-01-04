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
            $this->load->database();
            $user_id = $this->session->userdata('username');
            $this->db->where('id', $user_id);
            $query = $this->db->get('users');
            $queryResult = $query->result();
            foreach($queryResult as $resultRow) {

                $data['username'] = $resultRow->name;
                $data['password'] = $resultRow->pass;
                $data['email'] = $resultRow->email;
                $data['fullname'] = $resultRow->full_name;
                $data['phone'] = $resultRow->phone;
                $data['address'] = $resultRow->address;

            }

            $this->load->view("profile", $data);
        }

    }

    public function logout() {

        $this->load->driver('cache');
        $this->load->helper('url');
        $this->session->sess_destroy();
        $this->cache->clean();
        ob_clean();
        redirect('mainpagecontroller');

    }

    public function saveEdit() {
        //TODO: change email
        $this->load->database();

        $username = $_POST["username"];
        if ($_POST["full_name"] == '') $full_name = ''; else $full_name = strip_tags($_POST["full_name"]);
        //if ($_POST["email"] == '') $email = ''; else $email = $_POST["email"];
        if ($_POST["phone"] == '') $phone = ''; else $phone = $_POST["phone"];
        if ($_POST["address"] == '') $address = ''; else $address = $_POST["address"];

        $this->db->set('full_name', $full_name);
        //$this->db->set('email', $email);
        $this->db->set('phone', $phone);
        $this->db->set('address', $address);
        $this->db->where('name', $username);

        $this->db->update('users');

        echo "Info updated";
    }

}

?>