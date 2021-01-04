<?php

class AdminViewController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('adminview');
    }


    public function index() {  

        $this->load->database();
        $sqlCode = "SELECT * FROM item";
        $query = $this->db->query($sqlCode);

        $i = 0;
        $names = [];
        $images = [];
        $prices = [];
        $descriptions = [];
        $ids = [];

        $res = $query->result();

        foreach($res as $resRow)
        {
            $names[$i] = $resRow->name;
            $images[$i] = $resRow->image;
            $prices[$i] = $resRow->price;
            $descriptions[$i] = $resRow->description;
            $ids[$i] = $resRow->id;

            $i++;

        }

        $data['i'] = $i;

        $data['name'] = $names;
        $data['image'] = $images;
        $data['price'] = $prices;
        $data['description'] = $descriptions;
        $data['id'] = $ids;

        $this->load->view('adminview.php', $data);

    }

    public function csv() {
        echo $this->adminview->export();
    }

}

?>