<?php

    class AdminLogin extends CI_Controller {
        
        public function index() {
            $this->load->helper(array('form', 'url', 'file'));
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == FALSE)  {
                    $this->load->view('AdminLogin');
                    return;
                }

            $username = set_value('username');
            $password = set_value('password');

            $this->load->model('AdminLoginModel');
            
            $success = $this->AdminLoginModel->Login($username, $password);
            $result = ($success) ? 'AdminCtrl' : 'AdminLogin';
            $this->load->view($result);
            
        } // index
    } // class
