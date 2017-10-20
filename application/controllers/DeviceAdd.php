<?php
    class DeviceAdd extends CI_Controller {
        
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

                $this->form_validation->set_rules('AddDevice', 'Device name', 'required');
                $this->form_validation->set_rules('AddMacAddr', 'MAC-Address', 'required');
                $this->form_validation->set_rules('AddIpAddr', 'IP-Address', 'required');
                $this->form_validation->set_rules('AddOwner', 'Owner', 'required');

                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('DeviceAdd');
                        return;
                    }
    
                $Device = set_value('AddDevice');
                $MacAddr = set_value('AddMacAddr');
                $IpAddr = set_value('AddIpAddr');
                $Owner = set_value('AddOwner');
    
                $this->load->model('DeviceCtrlModel');
                
                $success = $this->DeviceCtrlModel->AddDevice($Device, $MacAddr, $IpAddr, $Owner);
                $result = ($success) ? 'AdminSuccess' : 'DeviceAdd';
                $this->load->view($result);

        }
    }