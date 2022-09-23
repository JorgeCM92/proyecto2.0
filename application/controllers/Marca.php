<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function index()
	{
                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->motocicleta_model->listamarcas();
                        $data['marca']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('listamarca',$data);
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');
                        /*$this->load->view('inc/header');
                        $this->load->view('listamotocicleta',$data);
                        $this->load->view('inc/footer');*/
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
                        $lista=$this->motocicleta_model->listamarcas();
                        $data['marca']=$lista;
                        
                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('panelguestlistamarcas',$data);
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
                        $this->load->view('formulariomarca');
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');  
                } 
                else
                {
                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('formulariomarca');
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');      
                }     
                /*$this->load->view('inc/header');
                $this->load->view('formulariomoto');
                $this->load->view('inc/footer');*/	
	}

        public function agregarbd()
	{
                $data['nombreMarca']=$_POST['nombremarca'];
                
                $this->marca_model->agregarmarca($data);
                redirect('marca/index','refresh');
	}

        public function eliminarbd()
        {
                $idmarca=$_POST['idmarca'];
                $this->motocicleta_model->eliminarmotocicleta($idmarca);
                redirect('marca/index','refresh');
        }

        public function modificar()
        {
                $idmarca=$_POST['idmarca'];
                $data['infomarca']=$this->marca_model->recuperarmarca($idmarca);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomarcamodificar',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('formulariomotomodificar',$data);
                $this->load->view('inc/footer');*/
        }

        public function modificarbd()
        {
                $idmarca=$_POST['idmarca'];
                $data['nombreMarca']=$_POST['nombreMarca'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                
                $this->marca_model->modificarmarca($idmarca,$data);
                redirect('motocicleta/index','refresh');
        }

        public function deshabilitarbd()
        {
                $idmarca=$_POST['idmarca'];
                $data['estado']='0';

                $this->marca_model->modificarmarca($idmarca,$data);
                redirect('marca/index','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->marca_model->listamarcasdeshabilitados();
                $data['marca']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listamarcadeshabilitados',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('listamotodeshabilitados',$data);////////
                $this->load->view('inc/footer');*/
        }

        public function habilitarbd()
        {
                $idmarca=$_POST['idmarca'];
                $data['estado']='1';

                $this->marca_model->modificarmarca($idmarca,$data);
                redirect('marca/deshabilitados','refresh');
        }
       

}
