<?php 
    class Loginmodels extends CI_Model {

        /**
         * Check user login. 
         * @param string - username
         * @param string - password
         * @return bool - success status
         * 
         */
        public function Login ($username, $password) {
            
            $password = md5($password);
            
            $sql = "SELECT * FROM UserTable WHERE Username = '$username' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if (!$ret) {
                    return false;
                }

            $row = $ret[0]; 
            $uid = $row['ID'];
            $user = $row['Username'];
            $pass = $row['Password'];
            
                if ($password != $pass) {
                    return false;
                }
            
                $newdata = array(
                    'username' => $username,
                    'logged_in' => TRUE
                );
            
            $this->session->set_userdata($newdata);

            return true;
            
        } // login
    } // class