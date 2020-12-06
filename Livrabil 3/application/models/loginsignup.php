<?php

    class LoginSignup extends CI_Model {

        public function signin($username, $password) {
            
            if ($username == '') return "No username entered";
            if ($password == '') return "No password entered";

            $this->load->database();

            $query =  $this->db->query("select id, name, pass, email from users");
            $result = $query->result();

            $usernameFound = 0;
            $passwordFound = '';
            $idFound = 0;
            foreach($result as $resultRow) {

                if ($username == $resultRow->name) {
                    $usernameFound = 1;
                    $passwordFound = $resultRow->pass;
                    $idFound = $resultRow->id;
                }

            }
            if ($usernameFound == 0) return "Username doesn't exist";
            if ($passwordFound != $password) return "Password doesn't match";

            //$this->load->helper('cookie');
            $this->load->library('session');
            //set_cookie("user", $username, time() + (86400 * 30));

            $session = array(
                'username'  => $idFound,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($session);

            return "User Found";

        }

        public function signup($username, $email, $password, $confirmPassword) {

            if ($username == '') return "No username entered";
            if ($email == '') return "No email entered";
            if ($password == '') return "No password entered";
            if ($confirmPassword == '') return "No confirm password entered";
            if ($password != $confirmPassword) return "Passwords don't match";

            $this->load->database();

            $query =  $this->db->query("select name, pass, email from users");
            $result = $query->result();
        
            foreach($result as $resultRow) {
                if ($username == $resultRow->name) return "Username already taken";
                if ($email == $resultRow->email) return "Email already taken";
            }

            $data = array(
                'name' => $username,
                'pass' => $password,
                'email' => $email
            );
            $this->db->insert("users", $data);

            return "Registered";

        }

    }

?>