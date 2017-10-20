<?php
    class DeviceDel extends CI_Controller {
        
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

                $this->form_validation->set_rules('DelDevice', 'Device name', 'required');
                $this->form_validation->set_rules('rootPassword', 'Password', 'required');
                $this->form_validation->set_rules('rootPasswordCtrl', 'Password Confirmation', 'required');
    
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('DeviceDel');
                        return;
                    }
    
                $DelDevice = set_value('DelDevice');
                $rootPassword = set_value('rootPassword');
                $rootPasswordCtrl = set_value('rootPasswordCtrl');
            
    
                $this->load->model('DeviceCtrlModel');
                
                $success = $this->DeviceCtrlModel->DelDevice($DelDevice, $rootPassword, $rootPasswordCtrl);
                $result = ($success) ? 'AdminSuccess' : 'DeviceDel';
                $this->load->view($result);

        }
    }