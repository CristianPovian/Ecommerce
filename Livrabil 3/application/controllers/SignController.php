<?php

class SignController extends CI_Controller {

    public function index() {  

        $this->output->delete_cache();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->view('loginsignup');

    }

    public function signin() {

        $this->load->model('loginsignup');
        echo $this->loginsignup->signin($_POST["username"], $_POST["password"]);

    }

    public function signup() {

        $this->load->model('loginsignup');
        echo $this->loginsignup->signup($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmPassword"]);

    }

}

?>