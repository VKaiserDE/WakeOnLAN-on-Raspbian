<?php 
    class WakeOnLANModel extends CI_Model {

        /**
         * Check user login. 
         * @param string - username
         * @param string - password
         * @return bool - success status
         * 
         */
        public function wake($device) {
            $name = $this->session->username;

            print_r($device);

            $sql = "SELECT * FROM Devices WHERE ID = '$device' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if (!$ret) {
                    return false;
                }
            $row = $ret[0]; 
            
                $sql = "SELECT Besitzer FROM Devices WHERE ID = '$device' LIMIT 1";
                $query = $this->db->query($sql);
    
                $ret = $query->result_array();
    
                    if (!$ret) {
                        return false;
                    }
                
                $owner = $ret[0];
                $owner = implode($owner);

                if ($owner != $name) {
                    if ($name != "root") {
                        return false;
                    }
                }

            $WakeDev = $row['Device'];
            $WakeAddr = $row['Address'];
        
            $WakeThis = "wakeonlan $WakeAddr";            
            shell_exec($WakeThis);
            
            print_r($WakeThis);
            // return true;
            
        } // login
    } // class