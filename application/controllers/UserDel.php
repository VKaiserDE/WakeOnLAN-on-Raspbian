<?php
    class UserDel extends CI_Controller {
        
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

                $this->form_validation->set_rules('DelUsername', 'Username', 'required');
                $this->form_validation->set_rules('rootPassword', 'Password', 'required');
                $this->form_validation->set_rules('rootPasswordCtrl', 'Password Confirmation', 'required');
    
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('UserDel');
                        return;
                    }
    
                $DelUsername = set_value('DelUsername');
                $rootPassword = set_value('rootPassword');
                $rootPasswordCtrl = set_value('rootPasswordCtrl');
            
    
                $this->load->model('UserCtrlModel');
                
                $success = $this->UserCtrlModel->DelUser($DelUsername, $rootPassword, $rootPasswordCtrl);
                $result = ($success) ? 'AdminSuccess' : 'UserDel';
                $this->load->view($result);

        }
    }