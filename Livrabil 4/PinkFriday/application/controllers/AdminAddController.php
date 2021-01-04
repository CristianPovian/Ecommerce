<?php

class AdminAddController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function index() {  

        $this->load->view('adminadd.php');

    }

}

?>