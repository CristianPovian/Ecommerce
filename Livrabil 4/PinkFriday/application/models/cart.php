<?php

    class Cart extends CI_Model {
        //TODO: Do operations /w item_id
        public function load($user_id) {
            $this->load->database();
            $query =  $this->db->query("select cart.cart_id, item.id as i_id, item.name, quantity, price, image, description, discount.discount_percent,
            item.price-item.price*(discount.discount_percent*(0.01)) as disc_price from cart,users,
            item left join discount on item.id = discount.main_id where item.id = cart.item_id and users.id = cart.user_id and cart.user_id = ".$user_id); 
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
                $data[$n][5] = $resRow->i_id;
                if ($resRow->discount_percent != null) {
                    $data[$n][2] = $resRow->disc_price;
                }

                $subtotal += $data[$n][2]*$resRow->quantity;
                $n++;

            }

            $taxes = ($subtotal*5)/100;
            

            return array('array' => $data, 'n' => $n, 'shipping' => $shipping, 'taxes' => $taxes, 'subtotal' => $subtotal);

        }

        public function add($item_id, $user_id) {

            $this->load->database();
            $this->db->set('quantity', 'quantity+1', FALSE);
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('cart');

            return 'Quantity increased';
        }

        public function subtract($item_id, $user_id) {
            $this->load->database();
            $this->db->set('quantity', 'quantity-1', FALSE);
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->update('cart');

            return 'Quantity decreased';
        }

        public function remove($item_id, $user_id) {
            $this->load->database();
            $this->db->where('item_id', $item_id);
            $this->db->where('user_id', $user_id);
            $this->db->delete('cart');

            return 'Removed from cart';
        }

        public function insert($item_id, $user_id) {
            $this->load->database();

            $this->db->where('user_id', $user_id);
            $this->db->where('item_id', $item_id);
            $query = $this->db->get('cart');
            if (!empty($query->result())) {
                $this->db->set('quantity', 'quantity+1', FALSE);
                $this->db->where('item_id', $item_id);
                $this->db->where('user_id', $user_id);
                $this->db->update('cart');
                echo "Item in db"; 
            }
            else {

                $data = array(
                    'user_id' => $user_id,
                    'item_id' => $item_id,
                    'quantity' => 1
                );
                
                $this->db->insert('cart', $data);

            } 
            
        }

    }
?>