<?php

class ProductPageController extends CI_Controller {

    public function index() {  

        $this->load->helper('url');
        $this->load->view('product');
        $this->load->library('session');

        

    }

    public function display ($product = '') {

        
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

        $product = str_replace('%20', ' ', $product);

        $this->load->database();
        $query = $this->db->query("select item.id, item.name, item.image, item.price, item.description, discount.discount_percent,
        (item.price-item.price*(discount.discount_percent*(0.01))) as disc_price, item.category
        from item left join discount on item.id = discount.main_id where item.id = '".$product."' order by units_sold desc"); 

        $res = $query->result();
        foreach($res as $resRow)
        {
            $data['id'] = $resRow->id;
            $data['name'] = $resRow->name;
            $data['image'] = $resRow->image;
            $data['price'] = $resRow->price;
            $data['description'] = $resRow->description;
            $data['category'] = $resRow->category;

            if ($resRow->discount_percent != null) {
                $data['price'] = $resRow->disc_price;
            }

        }

        $this->load->view('product', $data);

    }

}

?>