<?php

    class Login extends CI_Controller {
        
        public function index() {
            $this->load->helper(array('form', 'url', 'file'));
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == FALSE)  {
                    $this->load->view('Login');
                    return;
                }

            $username = set_value('username');
            $password = set_value('password');

            $this->load->model('Loginmodels');
            
            $success = $this->Loginmodels->Login($username, $password);
            $result = ($success) ? 'WakeOnLAN' : 'Login';
            redirect($result);
            
        } // index
    } // class
