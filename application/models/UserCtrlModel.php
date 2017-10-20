<?php
    class UserctrlModel extends CI_Model {
        
        public function AddUser($SetUsername, $SetPassword, $SetPasswordCtrl) {
            $SetPassword = md5($SetPassword);
            $SetPasswordCtrl = md5($SetPasswordCtrl);

            if ($SetPasswordCtrl != $SetPassword) {
                return false;
            }
            
            $sql = "SELECT * FROM UserTable WHERE Username = '$SetUsername' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if ($ret) {
                    return false;
                }

            
            $sql = "INSERT INTO UserTable(Username, Password) VALUES ('$SetUsername', '$SetPassword')";
            $query = $this->db->query($sql);
    
            
            
            $sql = "SELECT * FROM UserTable WHERE Username = '$SetUsername' LIMIT 1";
            $query = $this->db->query($sql);
    
            $ret = $query->result_array();
    
                if (!$ret) {
                    return false;
                }

            return true;
        }

        public function EditUser($OldUsername, $EditUsername, $EditPassword, $EditPasswordCtrl) {
            
            $EditPassword = md5($EditPassword);
            $EditPasswordCtrl = md5($EditPasswordCtrl);

            if ($EditPasswordCtrl != $EditPassword) {
                return false;
            }
            
            $sql = "SELECT * FROM UserTable WHERE Username = '$OldUsername' LIMIT 1";
            $query = $this->db->query($sql);

            $ret = $query->result_array();

                if (!$ret) {
                    return false;
                }

            

                $sql = "SELECT ID FROM UserTable WHERE Username = '$OldUsername' LIMIT 1";
                $query = $this->db->query($sql);
    
                $ret = $query->result_array();
    
                    if (!$ret) {
                        return false;
                    }


                
            $UID = $ret[0];
            $UID = implode(" ",$UID);

                    if ($UID == "1") {
                        return false;
                    }

                    if ($UID == "2") {
                        return false;
                    }
                
            $sql = "UPDATE UserTable SET Username = '$EditUsername', Password= '$EditPassword' WHERE ID = $UID;";
            $query = $this->db->query($sql);
        
            return true;
            

        }

        public function DelUser($DelUsername, $rootPassword, $rootPasswordCtrl) {
            
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
            

            if ($DelUsername == "root") {
                return false;
            }
            
            if ($DelUsername == "Backup") {
                return false;
            }

            $sql = "DELETE FROM UserTable WHERE Username='$DelUsername' ";
            $query = $this->db->query($sql);
    
            
            return true;

        }

        
    }