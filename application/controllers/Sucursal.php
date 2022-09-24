<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal extends CI_Controller {

        public function index()
	{

                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->sucursal_model->listasucursales();
                        $data['sucursales']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('listasucursal',$data);
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
                        $lista=$this->sucursal_model->listasucursales();
                        $data['sucursales']=$lista;

                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('panelguestlistasucursales',$data);
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
                $this->load->view('formulariosucursal');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }
                else
                {
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2guest');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariosucursal');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }        
                /*$this->load->view('inc/header');
                $this->load->view('formulario');
                $this->load->view('inc/footer');	*/
	}

        public function agregarbd()
	{
                $data['nombreSucursal']=$_POST['nombresucursal'];
                $data['direccion']=$_POST['direccion'];
                
                $this->sucursal_model->agregarsucursal($data);
                redirect('sucursal/index','refresh');
	}

        public function eliminarbd()
        {
                $idsucursal=$_POST['idsucursal'];
                $this->sucursal_model->eliminarsucursal($idsucursal);
                redirect('sucursal/index','refresh');
        }

        public function modificar()
        {
                $idsucursal=$_POST['idsucursal'];
                $data['infosucursal']=$this->sucursal_model->recuperarsucursal($idsucursal);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodificarsucursal',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('formulariomodificar',$data);
                $this->load->view('inc/footer');*/
        }

        public function modificarbd()
        {
                $idsucursal=$_POST['idsucursal'];
                $data['nombreSucursal']=$_POST['nombresucursal'];
                $data['direccion']=$_POST['direccion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');

                
                $this->sucursal_model->modificarsucursal($idsucursal,$data);
                redirect('sucursal/index','refresh');
        }

        public function deshabilitarbd()
        {
                $idsucursal=$_POST['idsucursal'];
                $data['estado']='0';

                $this->sucursal_model->modificarsucursal($idsucursal,$data);
                redirect('sucursal/index','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->sucursal_model->listasucursalesdeshabilitados();
                $data['sucursales']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listasucursaldeshabilitado',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('listadeshabilitados',$data);
                $this->load->view('inc/footer');*/
        }

        public function habilitarbd()
        {
                $idsucursal=$_POST['idsucursal'];
                $data['estado']='1';

                $this->sucursal_model->modificarsucursal($idsucursal,$data);
                redirect('sucursal/deshabilitados','refresh');
        }

}
