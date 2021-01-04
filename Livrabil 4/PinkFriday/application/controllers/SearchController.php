<?php

class SearchController extends CI_Controller {

    public function index() {  

        $this->searchbyfilter();

    }

    public function searchbyfilter($category = '', $filter = 'nodiscount', $namesearch = '') {

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('cookie');

        $data = [];
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in != TRUE || empty($logged_in))
        {
            $this->session->set_flashdata('error', 'Session has Expired');
            $data['profilepage'] = "SignController";
            $data['logged_in'] = false;
        }
        else
        {
            $data['profilepage'] = "ProfilePageController";
            $data['logged_in'] = true;
        }

        $this->load->database();

        // APPLY DISCOUNT FILTER

        if ($filter == 'discount') {
            $sqlCode = "select item.name, item.image, item.price, item.description, discount.discount_percent,
            (item.price-item.price*(discount.discount_percent*(0.01))) as disc_price, item.category, item.id
            from item, discount where item.id = discount.main_id and ";
        }
        else if ($filter == 'nodiscount')  {
            $sqlCode = "select item.name, item.image, item.price, item.description, discount.discount_percent,
            (item.price-item.price*(discount.discount_percent*(0.01))) as disc_price, item.category, item.id
            from item left join discount on item.id = discount.main_id where "; 
        }

        // APPLY NAMESEARCH FILTER

        if ($namesearch != '') {
            $sqlCode = $sqlCode." name like '%".$namesearch."%' and ";
        }

        // APPLY CATEGORY FILTER

        if ($category == '' || $category == 'ALL') {
            $sqlCode = $sqlCode." 1 = 1 order by units_sold desc"; 
        }
        else {
            $sqlCode = $sqlCode."item.category = '".$category."' order by units_sold desc";
        }

        $query = $this->db->query($sqlCode);

        $i = 0;
        $names = [];
        $images = [];
        $prices = [];
        $descriptions = [];
        $categories = [];
        $ids = [];

        $res = $query->result();

        foreach($res as $resRow)
        {
            $names[$i] = $resRow->name;
            $images[$i] = $resRow->image;
            $prices[$i] = $resRow->price;
            $descriptions[$i] = $resRow->description;
            $categories[$i] = $resRow->category;
            $ids[$i] = $resRow->id;

            if ($resRow->discount_percent != null) {
                $prices[$i] = $resRow->disc_price;
            }
            
            $i++;

        }

        $data['name'] = $names;
        $data['image'] = $images;
        $data['price'] = $prices;
        $data['description'] = $descriptions;
        $data['category'] = $categories;
        $data['id'] = $ids;

        $data['i'] = $i;
        if ($namesearch != '') $data['search'] = $namesearch."   // "; else $data['search'] = "ALL   //";
        if ($category != '') $data['search'] = $data['search']." category ".$category; else $data['search'] = $data['search']."category ALL";
        if ($filter == 'discount') $data['search'] = $data['search'].' with DISCOUNT filter';
        $data['search'] = $data['search']." //";
        

        $this->load->helper('url');
        $this->load->view('searches', $data);

    }

}

?>