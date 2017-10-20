<?php
    class UserAdd extends CI_Controller {
        
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

                $this->form_validation->set_rules('AddUsername', 'Username', 'required');
                $this->form_validation->set_rules('AddPassword', 'Password', 'required');
                $this->form_validation->set_rules('AddPasswordCtrl', 'Password Confirmation', 'required');
    
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('UserAdd');
                        return;
                    }
    
                $username = set_value('AddUsername');
                $password = set_value('AddPassword');
                $passwordCtrl = set_value('AddPasswordCtrl');
            
    
                $this->load->model('UserCtrlModel');
                
                $success = $this->UserCtrlModel->AddUser($username, $password, $passwordCtrl);
                $result = ($success) ? 'AdminSuccess' : 'UserAdd';
                $this->load->view($result);

        }
    }