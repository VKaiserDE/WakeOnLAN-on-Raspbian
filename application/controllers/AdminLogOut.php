<?php
    class AdminLogOut extends CI_Controller {

        public function index() {
            $this->load->helper('url');

            $this->session->sess_destroy();;
            header("Refresh:0; url=AdminLogin");

        }
    }