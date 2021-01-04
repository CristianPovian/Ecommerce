<?php

class RestApi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');

    }

    public function createOrder() {

        $this->load->database();

        $incomingData = json_decode(file_get_contents("php://input"));

        $outgoingData = array(
            'user_id' => $incomingData->id,
            'full_name' => $incomingData->name,
            'email' => $incomingData->email,
            'phone' => $incomingData->phone,
            'address' => $incomingData->address,
            'country' => $incomingData->county,
            'city' => $incomingData->city,
            'zip' => $incomingData->zip,
            'card_name' => $incomingData->cardname,
            'card_number' => $incomingData->cardnumber,
            'exp_month' => $incomingData->expmonth,
            'exp_year' => $incomingData->expyear,
            'cvv' => $incomingData->cvv,
            'order_cost' => $incomingData->ordercost,
            'order_info' => $incomingData->orderinfo
        );
        
        $this->db->insert('orders', $outgoingData);

        http_response_code(201);
        echo json_encode(array("message" => "Order was created."));

    }

    public function getCart($user_id) {
        
        $this->load->database();

        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart');

        http_response_code(201);
        echo json_encode(array("payload" => $query->result(), "message" => "Retrieved cart of ".$user_id));

    }

    public function deleteCart($user_id) {
        
        $this->load->database();

        $this->db->where('user_id', $user_id);
        $this->db->delete('cart');

        http_response_code(201);
        echo json_encode(array("payload" => "Cart is cleared."));

    }

    public function createItem() {
        
        $this->load->database();

        $incomingData = json_decode(file_get_contents("php://input"));

        $outgoingData = array(
            'name' => $incomingData->name,
            'price' => $incomingData->price,
            'image' => $incomingData->image,
            'description' => $incomingData->description,
            'units_sold' => $incomingData->units_sold,
            'category' => $incomingData->category
        );
        
        $this->db->insert('item', $outgoingData);

        http_response_code(201);
        echo json_encode(array("message" => "Item was created."));

    }

    public function getItems() {
        
        $this->load->database();

        $query = $this->db->get('item');

        http_response_code(201);
        echo json_encode(array("payload" => $query->result(), "message" => "Retrieved all items"));

    }

    public function readItem() {
        
    }

    public function updateItem() {

    }

    public function deleteItem() {

    }

}

?>