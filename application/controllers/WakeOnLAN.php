<?php
    class WakeOnLan extends CI_Controller {

        public function index() {

            $this->load->helper(array('url', 'form'));
            $this->load->library('form_validation');
            
            $name = $this->session->username;
            $login = $this->session->logged_in;

            // if no session with a valid login is found show login form
                if (!$login) {
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('Login');
                        return;
                    }
                }

                

            $this->form_validation->set_rules('DeviceSelect', 'Device', 'required');
            
            // on form error show form again
            if ($this->form_validation->run() == FALSE)  {
                $this->load->model('ListDevices');
                $devices = $this->ListDevices->list();
                $data['devices'] = $devices;
                $data['deviceCount'] = count($devices);
                $this->parser->parse('WakeOnLAN', $data);
                return;
            }

            echo "test";
            
            $device = $this->input->post('DeviceSelect');
            $this->load->model("WakeOnLANModel");
            $this->WakeOnLANModel->wake($device);
            

            $this->load->model('WakeOnLANModel');
                        
            $success = $this->WakeOnLANModel->wake($device);
            $result = ($success) ? 'Success' : 'WakeOnLAN';
            redirect($result);
        
        }
    }