<?php

class AddingController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');

    }

    function index() {

        $this->load->database();

        $target_dir = "img/";
        $target_file = $target_dir .basename($_FILES["image"]["name"]);
        $image = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $target_dir = "ItemPictures/";
        $target_file = $target_dir .basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $outgoingData = array(
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'image' => $image,
            'description' => $_POST['desc'],
            'units_sold' => 0,
            'category' => $_POST['category']
        );
        
        $this->db->insert('item', $outgoingData);
        header("Location: AdminAddController");
    }

}

?>