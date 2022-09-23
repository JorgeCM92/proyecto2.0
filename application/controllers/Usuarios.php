<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	public function index()
	{
                $data['msg']=$this->uri->segment(3);

                if($this->session->userdata('login'))
                {
                        //El usuario ya esta logueado
                        redirect('usuarios/panel','refresh');
                }
                else
                {
                        //El usuario no esta logueado
                        //$this->load->view('inc/headersbadmin2');
                        //$this->load->view('inc/sidebarsbadmin2');
                        //$this->load->view('inc/topbarsbadmin2');
                        $this->load->view('login',$data);
                        //$this->load->view('inc/creditossbadmin2');
                        //$this->load->view('inc/footersbadmin2');

                }
        	
	}
        public function validar()
        {
                $login=$_POST['login'];
                $password=md5($_POST['password']);

                $consulta=$this->usuario_model->validar($login,$password);

                if($consulta->num_rows()>0)
                {
                        //tenemos una validacion efectiva
                        foreach ($consulta->result() as $row)
                        {
                                $this->session->set_userdata('idusuario',$row->idUsuario);
                                $this->session->set_userdata('login',$row->login);
                                $this->session->set_userdata('tipo',$row->tipo);
                                redirect('usuarios/panel','refresh');
                        }
                        
                }
                else
                {
                        //no hay validacion efectiva y se redirigira a login
                        redirect('usuarios/index/2','refresh');
                }
        }

        public function panel()
        {
               if($this->session->userdata('login'))
                {
                        if($this->session->userdata('tipo')=='admin')
                        {
                                //cargo panel admin
                                redirect('cliente/index','refresh');
                        }
                        else
                        {
                                //cargo panel guest
                                redirect('cliente/guest','refresh');
                        }
                }
                else
                {
                        //El usuario no esta logueado
                        redirect('usuarios/index/3','refresh');

                }     
        }

        public function logout()
        {
               $this->session->sess_destroy();  
               redirect('usuarios/index/1','refresh');
   
        }

        public function index2()
	{

                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->usuario_model->listausuarios();
                        $data['usuario']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('listausuarios',$data);
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');

                }
                else
                {
                        //El usuario no esta logueado
                        redirect('usuarios/panel','refresh');

                } 	
	}

        public function agregar()
	{

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariousuario');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');        
                /*$this->load->view('inc/header');
                $this->load->view('formulario');
                $this->load->view('inc/footer');	*/
	}
        public function agregarbd()
	{
                $data['login']=$_POST['login'];
                $data['password']=md5($_POST['password']);
                //$data['idSucursal']=$_POST['idsucursal'];
                $data['tipo']=$_POST['tipo'];
                $data['nombres']=$_POST['nombres'];
                $data['primerApellido']=$_POST['primerapellido'];
                $data['segundoApellido']=$_POST['segundoapellido'];
                $data['cedulaIdentidad']=$_POST['cedulaidentidad'];
                $data['telefono']=$_POST['telefono'];
                $data['direccion']=$_POST['direccion'];
                
                $this->usuario_model->agregarusuario($data);
                redirect('usuarios/index2','refresh');
	}

        public function eliminarbd()
        {
                $idusuario=$_POST['idusuario'];
                $this->usuario_model->eliminarusuario($idusuario);
                redirect('usuarios/index2','refresh');
        }

        public function modificar()
        {
                $idusuario=$_POST['idusuario'];
                $data['infousuario']=$this->usuario_model->recuperarusuario($idusuario);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodificarusuario',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                $data['fechaActualizacion']=date('Y-m-d H:i:s');

        }

        public function modificarbd()
        {
                $idusuario=$_POST['idusuario'];
                $data['login']=$_POST['login'];
                $data['password']=md5($_POST['password']);
                $data['tipo']=$_POST['tipo'];
                $data['nombres']=$_POST['nombres'];
                $data['primerApellido']=$_POST['primerapellido'];
                $data['segundoApellido']=$_POST['segundoapellido'];
                $data['cedulaIdentidad']=$_POST['cedulaidentidad'];
                $data['telefono']=$_POST['telefono'];
                $data['direccion']=$_POST['direccion'];
                
                
                $this->usuario_model->modificarusuario($idusuario,$data);
                $this->upload->data();
                redirect('usuarios/index2','refresh');
        }

        public function deshabilitarbd()
        {
                $idusuario=$_POST['idusuario'];
                $data['estado']='0';

                $this->usuario_model->modificarusuario($idusuario,$data);
                redirect('usuarios/index2','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->usuario_model->listausuariosdeshabilitados();
                $data['usuario']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listausuariodeshabilitados',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');

        }

        public function habilitarbd()
        {
                $idusuario=$_POST['idusuario'];
                $data['estado']='1';

                $this->usuario_model->modificarusuario($idusuario,$data);
                redirect('usuarios/deshabilitados','refresh');
        }

        
}
