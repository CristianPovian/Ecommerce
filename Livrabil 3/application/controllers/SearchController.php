<?php

class SearchController extends CI_Controller {

    public function index() {  

        $this->searchbyfilter();

    }

    public function searchbyfilter($filter = '') {

        $this->load->database();

        if ($filter == '' || $filter == 'ALL') {
            $query =  $this->db->query("select item.name, item.image, item.price, item.description, discount.discount_percent,
            (item.price-item.price*(discount.discount_percent*(0.01))) as disc_price, item.category, item.id
            from item left join discount on item.id = discount.main_id order by units_sold desc"); 
        }
        else {
            $query = $this->db->query("select item.name, item.image, item.price, item.description, discount.discount_percent,
            (item.price-item.price*(discount.discount_percent*(0.01))) as disc_price, item.category, item.id
            from item left join discount on item.id = discount.main_id where item.category = '".$filter."' order by units_sold desc"); 
        }
        
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
        if ($filter != '') $data['search'] = $filter; else $data['search'] = "ALL";

        $this->load->helper('url');
        $this->load->view('searches', $data);

    }

}

?>