<?php 
    class ListDevices extends CI_Model { 
        public function list() { 
            $sql = "SELECT * FROM Devices";
            $query = $this->db->query($sql);

            $ret = $query->result_array();
            return $ret;
        }
    }
