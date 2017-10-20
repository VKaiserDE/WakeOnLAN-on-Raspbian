<?php
    class System extends CI_Controller {

        public function index() {
            $this->load->helper(array('form', 'url', 'file'));
            $this->load->library('form_validation');
        
            $name = $this->session->username;
            $login = $this->session->logged_in;

                if (!$login) {
                    if ($this->form_validation->run() == FALSE)  {
                        $this->load->view('Login');
                        return;
                    }

                }
                    
            $this->load->model('SysInfo');;
            $ret = $this->SysInfo->get_sysinfo();
            
                
                $data['system_model'] = $ret[0];                  
                $data['system_time'] = $ret[1];            
                $data['system_runningtime'] = $ret[2];        
            
                $data['cpu'] = $ret[3];
                $data['cpu_model'] = $ret[4];
                $data['cpu_temp'] = $ret[5];
                    
                $data['mem_total'] = $ret[6];
                $data['mem_free'] = $ret[7];
                $data['mem_used'] = $ret[8];
                $data['mem_percent'] = $ret[9];
                   
                $data['hdd_total'] = $ret[10];
                $data['hdd_free'] = $ret[11];
                $data['hdd_used'] = $ret[12];
                $data['hdd_percent'] = $ret[13];
        
                $data['network_rx'] = $ret[14];
                $data['network_tx'] = $ret[15];

            
                $this->load->model('Umrechnen');
                
                                $data['hdd_free_percent'] = $this->Umrechnen->zuProzent($data['hdd_free'], $data['hdd_total']);
                                $data['hdd_used_percent'] = $this->Umrechnen->zuProzent($data['hdd_used'], $data['hdd_total']);

                                $data['mem_free_percent'] = $this->Umrechnen->zuProzent($data['mem_free'], $data['mem_total']);
                                $data['mem_used_percent'] = $this->Umrechnen->zuProzent($data['mem_used'], $data['mem_total']);
        
        
                    
            $this->parser->parse('System', $data);
        }
    }