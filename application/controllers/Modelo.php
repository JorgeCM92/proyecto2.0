<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Controller {

        public function index()
	{

                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->modelo_model->listamodelos();
                        $data['modelos']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('listamodelo',$data);
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');

                }
                else
                {
                        //El usuario no esta logueado
                        redirect('usuarios/panel','refresh');

                } 	
	}

        public function guest()
	{
                if($this->session->userdata('tipo')=='guest')
                {
                        $lista=$this->modelo_model->listamodelos();
                        $data['modelos']=$lista;

                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('panelguestlistamodelos',$data);
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');
                }  
	}

        public function agregar()
	{
                if($this->session->userdata('tipo')=='admin')
                {
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodelo');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }
                else
                {
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2guest');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodelo');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }        
                /*$this->load->view('inc/header');
                $this->load->view('formulario');
                $this->load->view('inc/footer');	*/
	}

        public function agregarbd()
	{
                $data['nombreModelo']=$_POST['nombremodelo'];
                $this->modelo_model->agregarmodelo($data);
                redirect('modelo/index','refresh');
	}

        public function modificar()
        {
                $idmodelo=$_POST['idmodelo'];
                $data['infomodelo']=$this->modelo_model->recuperarmodelo($idmodelo);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodificarmodelo',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('formulariomodificar',$data);
                $this->load->view('inc/footer');*/
        }

        public function modificarbd()
        {
                $idmodelo=$_POST['idmodelo'];
                $data['nombreModelo']=$_POST['nombremodelo'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');

                
                $this->modelo_model->modificarmodelo($idmodelo,$data);
                redirect('modelo/index','refresh');
        }

        public function deshabilitarbd()
        {
                $idmodelo=$_POST['idmodelo'];
                $data['estado']='0';

                $this->modelo_model->modificarmodelo($idmodelo,$data);
                redirect('modelo/index','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->modelo_model->listamodelosdeshabilitados();
                $data['modelos']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listamodelodeshabilitado',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('listadeshabilitados',$data);
                $this->load->view('inc/footer');*/
        }

        public function habilitarbd()
        {
                $idmodelo=$_POST['idmodelo'];
                $data['estado']='1';

                $this->modelo_model->modificarmodelo($idmodelo,$data);
                redirect('modelo/deshabilitados','refresh');
        }

}