<?php
    class DeviceEdit extends CI_Controller {
        
        public function index() {
            $this->load->helper(array('url', 'form'));
            $this->load->library('form_validation');
            
            $Admin = $this->session->Admin;

                if (!$Admin) {
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('AdminLogin');
                        return;
                    }

                }

                $this->form_validation->set_rules('OldDevice', 'Old Device name', 'required');
                $this->form_validation->set_rules('EditDevice', 'New Device name', 'required');
                $this->form_validation->set_rules('EditMacAddr', 'New MAC-Address', 'required');
                $this->form_validation->set_rules('EditIpAddr', 'New IP-Address', 'required');
                $this->form_validation->set_rules('EditOwner', 'New Owner', 'required');
    
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('DeviceEdit');
                        return;
                    }
    
                $OldDevicename = set_value('OldDevice');
                $EditDevicename = set_value('EditDevice');
                $EditMacAddr = set_value('EditMacAddr');
                $EditIpAddr = set_value('EditIpAddr');
                $EditOwner = set_value('EditOwner');
            
    
                $this->load->model('DeviceCtrlModel');
                
                $success = $this->DeviceCtrlModel->EditDevice($OldDevicename, $EditDevicename, $EditMacAddr, $EditIpAddr, $EditOwner);
                $result = ($success) ? 'AdminSuccess' : 'DeviceEdit';
                $this->load->view($result);

        }
    }