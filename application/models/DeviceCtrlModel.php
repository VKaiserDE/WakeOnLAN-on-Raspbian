<?php
    class DeviceCtrlModel extends CI_Model {
        
        public function AddDevice($SetDevicename, $SetMacAddr, $SetIpAddr, $SetOwner) {
            
            
            $sql = "SELECT * FROM Devices WHERE Device = '$SetDevicename' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if ($ret) {
                    return false;
                }

            
            $sql = "INSERT INTO Devices(Device, Address, IpAddr, Besitzer) VALUES ('$SetDevicename', '$SetMacAddr', '$SetIpAddr', '$SetOwner')";
            $query = $this->db->query($sql);

            return true;
        }

        public function EditDevice($OldDevicename, $EditDevicename, $EditMacAddr, $EditIpAddr, $EditOwner) {;

            
            $sql = "SELECT * FROM Devices WHERE Device = '$OldDevicename' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if (!$ret) {
                    return false;
                }

            $sql = "SELECT ID FROM Devices WHERE Device = '$OldDevicename' LIMIT 1";
            $query = $this->db->query($sql);
    
            $ret = $query->result_array();
    
                if (!$ret) {
                    return false;
                }


                
            $UID = $ret[0];
            $UID = implode(" ",$UID);

                
            $sql = "UPDATE Devices SET Device = '$EditDevicename', Address = '$EditMacAddr', IpAddr = '$EditIpAddr', Besitzer  = '$EditOwner' WHERE ID = $UID;";
            $query = $this->db->query($sql);
        
            return true;
        }

        public function DelDevice($DelDevice, $rootPassword, $rootPasswordCtrl) {
            
            $rootPassword = md5($rootPassword);
            $rootPasswordCtrl = md5($rootPasswordCtrl);

            if ($rootPasswordCtrl != $rootPassword) {
                return false;
            }
            
            $sql = "SELECT Password FROM UserTable WHERE ID ='1' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

            
            $root = $ret[0];
            $root = implode($root);
            
            if ($root != $rootPassword) {
                return false;
            }

            $sql = "DELETE FROM Devices WHERE Device='$DelDevice' ";
            $query = $this->db->query($sql);
    
            
            return true;
        }
    
    }

        