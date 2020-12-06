<?php

    class Cart extends CI_Model {

        public function load($user_id) {
            $this->load->database();
            $query =  $this->db->query("select cart.cart_id, item.name, quantity, price, image, description from cart,item,users where item.id = cart.item_id and users.id = cart.user_id and cart.user_id = ".$user_id); 
            $res = $query->result();

            $data = [];
            $n = 0;

            $shipping = 15;
            $taxes = 0;
            $subtotal = 0;

            foreach($res as $resRow)
            {
                $data[$n][0] = $resRow->name;
                $data[$n][1] = $resRow->quantity;
                $data[$n][2] = $resRow->price;
                $data[$n][3] = $resRow->image;
                $data[$n][4] = $resRow->description;
                $n++;

                $subtotal += $resRow->price*$resRow->quantity;

            }

            $taxes = ($subtotal*5)/100;
            

            return array('array' => $data, 'n' => $n, 'shipping' => $shipping, 'taxes' => $taxes, 'subtotal' => $subtotal);

        }

        public function add($item_name, $user_id) {

            $this->load->database();
            $query =  $this->db->query("select id from item where name = '".$item_name."'");
            $res = $query->result();
            $item_id = 0;
            foreach($res as $resRow)
            {
                $item_id = $resRow->id;

            }
            
            $this->load->database();
            $this->db->set('quantity', 'quantity+1', FALSE);
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('cart');

            return 'Quantity increased';
        }

        public function subtract($item_name, $user_id) {
            $this->load->database();
            $query =  $this->db->query("select id from item where name = '".$item_name."'");
            $res = $query->result();
            $item_id = 0;
            foreach($res as $resRow)
            {
                $item_id = $resRow->id;

            }
            $this->db->set('quantity', 'quantity-1', FALSE);
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('cart');

            return 'Quantity decreased';
        }

        public function remove($item_name, $user_id) {
            $this->load->database();
            $query =  $this->db->query("select id from item where name = '".$item_name."'");
            $res = $query->result();
            $item_id = 0;
            foreach($res as $resRow)
            {
                $item_id = $resRow->id;

            }

            $this->load->database();
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->delete('cart');

            return 'Removed from cart';
        }

        public function insert($item_id, $user_id) {
            //TODO: Insert if !exist
            $this->load->database();

            $data = array(
                'user_id' => $user_id,
                'item_id' => $item_id,
                'quantity' => 1
            );
            
            $this->db->insert('cart', $data);
        }

    }
?>