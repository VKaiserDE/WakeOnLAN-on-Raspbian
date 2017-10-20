<?php
    class PingDevice extends CIModel{
        public function ping($device) {

            $sql = "SELECT * FROM Devices WHERE Device = '$device' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if (!$ret) {
                    return false;
                }

            $row = $ret[0]; 
            $dev= $row['Device'];
            $ip = $row['IpAddr'];

            $devStatus = shell_exec("Ping $ip");

            return $devStatus;

        }
    }