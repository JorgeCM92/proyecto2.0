<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

        public function index()
	{

                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->cliente_model->listaclientes();
                        $data['clientes']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('lista',$data);
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
                        $lista=$this->cliente_model->listaclientes();
                        $data['clientes']=$lista;

                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('panelguestlistaclientes',$data);
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
                $this->load->view('formulario');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }
                else
                {
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2guest');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulario');
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                }        
                /*$this->load->view('inc/header');
                $this->load->view('formulario');
                $this->load->view('inc/footer');	*/
	}

        public function agregarbd()
	{
                $data['nombres']=$_POST['nombres'];
                $data['primerApellido']=$_POST['primerapellido'];
                $data['segundoApellido']=$_POST['segundoapellido'];
                $data['cedulaIdentidad']=$_POST['cedulaidentidad'];
                $data['fechaNacimiento']=$_POST['fechanacimiento'];
                $data['telefono']=$_POST['telefono'];
                $data['correoElectronico']=$_POST['correoelectronico'];
                $data['direccion']=$_POST['direccion'];
                
                $this->cliente_model->agregarcliente($data);
                redirect('cliente/index','refresh');
	}

        public function eliminarbd()
        {
                $idcliente=$_POST['idcliente'];
                $this->cliente_model->eliminarcliente($idcliente);
                redirect('cliente/index','refresh');
        }

        public function modificar()
        {
                $idcliente=$_POST['idcliente'];
                $data['infocliente']=$this->cliente_model->recuperarcliente($idcliente);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomodificar',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('formulariomodificar',$data);
                $this->load->view('inc/footer');*/
        }

        public function modificarbd()
        {
                $idcliente=$_POST['idcliente'];
                $data['nombres']=$_POST['nombres'];
                $data['primerApellido']=$_POST['primerapellido'];
                $data['segundoApellido']=$_POST['segundoapellido'];
                $data['cedulaIdentidad']=$_POST['cedulaidentidad'];
                $data['fechaNacimiento']=$_POST['fechanacimiento'];
                $data['telefono']=$_POST['telefono'];
                $data['correoElectronico']=$_POST['correoelectronico'];
                $data['direccion']=$_POST['direccion'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');

                
                $this->cliente_model->modificarcliente($idcliente,$data);
                redirect('cliente/index','refresh');
        }

        public function deshabilitarbd()
        {
                $idcliente=$_POST['idcliente'];
                $data['estado']='0';

                $this->cliente_model->modificarcliente($idcliente,$data);
                redirect('cliente/index','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->cliente_model->listaclientesdeshabilitados();
                $data['clientes']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listadeshabilitados',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('listadeshabilitados',$data);
                $this->load->view('inc/footer');*/
        }

        public function habilitarbd()
        {
                $idcliente=$_POST['idcliente'];
                $data['estado']='1';

                $this->cliente_model->modificarcliente($idcliente,$data);
                redirect('cliente/deshabilitados','refresh');
        }

        public function listapdf()
	{

                if($this->session->userdata('login'))
                {
                        $lista=$this->cliente_model->listaclientes();
                        $lista=$lista->result();

                        $this->pdf=new Pdf();
                        $this->pdf->AddPage('L','Letter');
                        /* 
                        AddPage:
                                L Orientacion Horizontal
                                P Orientacion Vertical
                        Size: tamaño hoja
                                A3,A4,A5,Letter,Legal
                        */
                        $this->pdf->AliasNbPages();
                        $this->pdf->SetTitle("Lista de clientes");//Configuaraion del titulo
                        $this->pdf->SetLeftMargin(15);//Configuaraion del margen izquierdo
                        $this->pdf->SetRightMargin(15);//Configuaraion del margen derecho
                        $this->pdf->SetFillColor(210,210,210);//Configuaraion del color de fondo
                        $this->pdf->SetFont('Arial','BU',13);//Configuaraion de la fuente de la letre
                        $this->pdf->Cell(30);//Configuaraion de una celda
                        $this->pdf->Cell(120,10,'LISTA DE CLIENTE',0,0,'C',1);
                        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

                        //ORDEN DE LA SIGUIENTE CELDA
                        //SI ES 0 = DERECHA
                        //SI ES 1 = SIGUIENTE LINEA
                        //SI ES 2 = DEBAJO

                        $this->pdf->Ln(15);//COMO UN MARGEN

                        //FILA FIJA DE TITULOS
                        $this->pdf->SetFont('Arial','B',9);
                        $this->pdf->Cell(7,5,'No.','TBLR',0,'L',1);
                        $this->pdf->Cell(25,5,'NOMBRE','TBLR',0,'L',1);
                        $this->pdf->Cell(22,5,'APELLIDO 1','TBLR',0,'L',1);
                        $this->pdf->Cell(22,5,'APELLIDO 2','TBLR',0,'L',1);
                        $this->pdf->Cell(18,5,'CI','TBLR',0,'L',1);
                        $this->pdf->Cell(20,5,'F.NACIM.','TBLR',0,'L',1);
                        $this->pdf->Cell(35,5,'TELEFONO','TBLR',0,'L',1);
                        $this->pdf->Cell(45,5,'CORREO ELECTRONICO','TBLR',0,'L',1);
                        $this->pdf->Cell(55,5,'DIRECCION','TBLR',0,'L',1);
                        $this->pdf->Ln(5);

                                                
                        /*
                        SETFONT
                         -FAMILY:
                                Arial
                                Courier
                                Times
                                Symbol
                                ZapfDingbats
                        -Style:
                                ' ' por defecto
                                B bold
                                I italic
                                U underline
                        -Tamaño
                                9 tamaño de letra
                        */

                        $this->pdf->SetFont('Arial','',9);// el FONT para la parte de abajo del documento
                        $num=1;//nos creamos un correlativo 
                        foreach($lista as $row){
                                $nombres=$row->nombres;
                                $primerapellido=$row->primerApellido;
                                $segundoapellido=$row->segundoApellido;
                                $cedulaidentidad=$row->cedulaIdentidad;
                                $fecha=formatearFecha($row->fechaNacimiento);
                                $telefono=$row->telefono; 
                                $correoelectronico=$row->correoElectronico;
                                $direccion=$row->direccion;

                                /*CELL (ancho,alto,impresion,,borde, ln)
                                
                                borde:
                                0 sin borde
                                1 borde total
                                TBLR borde total
                                T -> Top
                                B -> bottom
                                L -> Left
                                R -> Right

                                ln
                                0: a la derecha
                                1: al principio de la siguiente fila
                                2: la siguiente celda DEBAJO


                                */
                                $this->pdf->Cell(7,5,$num,'TBLR',0,'L',0);
                                $this->pdf->Cell(25,5,$nombres,'TBLR',0,'L',0);
                                $this->pdf->Cell(22,5,$primerapellido,'TBLR',0,'L',0);
                                $this->pdf->Cell(22,5,$segundoapellido,'TBLR',0,'L',0);
                                $this->pdf->Cell(18,5,$cedulaidentidad,'TBLR',0,'L',0);
                                $this->pdf->Cell(20,5,$fecha,'TBLR',0,'L',0);
                                $this->pdf->Cell(35,5,$telefono,'TBLR',0,'L',0);
                                $this->pdf->Cell(45,5,$correoelectronico,'TBLR',0,'L',0);
                                $this->pdf->Cell(55,5,$direccion,'TBLR',0,'L',0);
                                $this->pdf->Ln(5);
                        }

                        $this->pdf->Output("listaclientes.pdf","I");
                        /* 
                        I muestra en navegador
                        D descarga el archivo
                        */       
                }
                else
                {
                        //El usuario no esta logueado
                        redirect('usuarios/panel','refresh');
                } 	
	}

}
