<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {

            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('dashboard-home');
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');
        }
        else
        {
            //El usuario no esta logueado
            redirect('usuarios/panel','refresh');

        } 	
	}

}