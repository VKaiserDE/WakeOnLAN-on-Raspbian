<?php
    class UserEdit extends CI_Controller {
        
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

                $this->form_validation->set_rules('OldUsername', 'Old Username', 'required');
                $this->form_validation->set_rules('EditUsername', 'New Username', 'required');
                $this->form_validation->set_rules('EditPassword', 'Password Confirmation', 'required');
                $this->form_validation->set_rules('EditPasswordCtrl', 'Password Confirmation', 'required');
    
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('UserEdit');
                        return;
                    }
    
                $OldUsername = set_value('OldUsername');
                $EditUsername = set_value('EditUsername');
                $EditPassword = set_value('EditPassword');
                $EditPasswordCtrl = set_value('EditPasswordCtrl');
            
    
                $this->load->model('UserCtrlModel');
                
                $success = $this->UserCtrlModel->EditUser($OldUsername, $EditUsername, $EditPassword, $EditPasswordCtrl);
                $result = ($success) ? 'AdminSuccess' : 'UserEdit';
                $this->load->view($result);

        }
    }