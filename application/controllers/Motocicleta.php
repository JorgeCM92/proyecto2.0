<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motocicleta extends CI_Controller {

	public function index()
	{
                if($this->session->userdata('tipo')=='admin')
                {
                        $lista=$this->motocicleta_model->listamotocicletas();
                        $data['motocicletas']=$lista;


                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('listamotocicleta',$data);
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
                        $lista=$this->motocicleta_model->listamotocicletas();
                        $data['motocicletas']=$lista;
                        
                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('panelguestlistamotocicletas',$data);
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
                        $this->load->view('formulariomoto');
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');  
                } 
                else
                {
                        $this->load->view('inc/headersbadmin2');
                        $this->load->view('inc/sidebarsbadmin2guest');
                        $this->load->view('inc/topbarsbadmin2');
                        $this->load->view('formulariomoto');
                        $this->load->view('inc/creditossbadmin2');
                        $this->load->view('inc/footersbadmin2');      
                }     
                /*$this->load->view('inc/header');
                $this->load->view('formulariomoto');
                $this->load->view('inc/footer');*/	
	}

        public function agregarbd()
	{
                $data['marca']=$_POST['marca'];
                $data['tipoModelo']=$_POST['tipomodelo'];
                $data['color']=$_POST['color'];
                $data['anioModelo']=$_POST['aniomodelo'];
                $data['nroChasis']=$_POST['nrochasis'];
                $data['nroMotor']=$_POST['nromotor'];
                $data['poliza']=$_POST['poliza'];
                
                $this->motocicleta_model->agregarmotocicleta($data);
                redirect('motocicleta/index','refresh');
	}

        public function eliminarbd()
        {
                $idmotocicleta=$_POST['idmotocicleta'];
                $this->motocicleta_model->eliminarmotocicleta($idmotocicleta);
                redirect('motocicleta/index','refresh');
        }

        public function modificar()
        {
                $idmotocicleta=$_POST['idmotocicleta'];
                $data['infomotocicleta']=$this->motocicleta_model->recuperarmotocicleta($idmotocicleta);
                
                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('formulariomotomodificar',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('formulariomotomodificar',$data);
                $this->load->view('inc/footer');*/
        }

        public function modificarbd()
        {
                $idmotocicleta=$_POST['idmotocicleta'];
                $data['marca']=$_POST['marca'];
                $data['tipoModelo']=$_POST['tipomodelo'];
                $data['color']=$_POST['color'];
                $data['anioModelo']=$_POST['aniomodelo'];
                $data['nroChasis']=$_POST['nrochasis'];
                $data['nroMotor']=$_POST['nromotor'];
                $data['poliza']=$_POST['poliza'];
                $data['fechaActualizacion']=date('Y-m-d H:i:s');
                
                $this->motocicleta_model->modificarmotocicleta($idmotocicleta,$data);
                redirect('motocicleta/index','refresh');
        }

        public function deshabilitarbd()
        {
                $idmotocicleta=$_POST['idmotocicleta'];
                $data['estado']='0';

                $this->motocicleta_model->modificarmotocicleta($idmotocicleta,$data);
                redirect('motocicleta/index','refresh');
        }

        public function deshabilitados()
        {
                $lista=$this->motocicleta_model->listamotocicletasdeshabilitados();
                $data['motocicletas']=$lista;

                $this->load->view('inc/headersbadmin2');
                $this->load->view('inc/sidebarsbadmin2');
                $this->load->view('inc/topbarsbadmin2');
                $this->load->view('listamotodeshabilitados',$data);
                $this->load->view('inc/creditossbadmin2');
                $this->load->view('inc/footersbadmin2');
                /*$this->load->view('inc/header');
                $this->load->view('listamotodeshabilitados',$data);////////
                $this->load->view('inc/footer');*/
        }

        public function habilitarbd()
        {
                $idmotocicleta=$_POST['idmotocicleta'];
                $data['estado']='1';

                $this->motocicleta_model->modificarmotocicleta($idmotocicleta,$data);
                redirect('motocicleta/deshabilitados','refresh');
        }
        public function listapdf()
	{

                if($this->session->userdata('login'))
                {
                        $lista=$this->motocicleta_model->listamotocicletas();
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
                        $this->pdf->SetTitle("Lista de motocicletas");//Configuaraion del titulo
                        $this->pdf->SetLeftMargin(15);//Configuaraion del margen izquierdo
                        $this->pdf->SetRightMargin(15);//Configuaraion del margen derecho
                        $this->pdf->SetFillColor(210,210,210);//Configuaraion del color de fondo
                        $this->pdf->SetFont('Arial','BU',13);//Configuaraion de la fuente de la letre
                        $this->pdf->Cell(30);//Configuaraion de una celda
                        $this->pdf->Cell(120,10,'LISTA DE MOTOCICLETAS',0,0,'C',1);
                        //ANCHO/ALTO/TEXTO/BORDE/ORDEN DE LA SIGUIENTE CELDA/ALINEACION=C=CENTER,R=RIGHT,L=LEFT/FILL 0=NO,1=SI/

                        //ORDEN DE LA SIGUIENTE CELDA
                        //SI ES 0 = DERECHA
                        //SI ES 1 = SIGUIENTE LINEA
                        //SI ES 2 = DEBAJO

                        $this->pdf->Ln(15);//COMO UN MARGEN

                        //FILA FIJA DE TITULOS
                        $this->pdf->SetFont('Arial','B',10);
                        $this->pdf->Cell(7,5,'No.','TBLR',0,'L',1);
                        $this->pdf->Cell(25,5,'MARCA','TBLR',0,'L',1);
                        $this->pdf->Cell(22,5,'MODELO','TBLR',0,'L',1);
                        $this->pdf->Cell(22,5,'COLOR','TBLR',0,'L',1);
                        $this->pdf->Cell(18,5,'ANIO','TBLR',0,'L',1);
                        $this->pdf->Cell(40,5,'No. CHASIS','TBLR',0,'L',1);
                        $this->pdf->Cell(40,5,'No. MOTOR','TBLR',0,'L',1);
                        $this->pdf->Cell(40,5,'POLIZA','TBLR',0,'L',1);
                        $this->pdf->Cell(40,5,'FECHA REGISTRO','TBLR',0,'L',1);
                        $this->pdf->Ln(5);



                        $this->pdf->SetFont('Arial','',9);// el FONT para la parte de abajo del documento
                        $num=1;//nos creamos un correlativo 
                        foreach($lista as $row){
                                $marca=$row->marca;
                                $tipoModelo=$row->tipoModelo;
                                $color=$row->color;
                                $anioModelo=$row->anioModelo;
                                $nroChasis=$row->nroChasis;
                                $nroMotor=$row->nroMotor;
                                $poliza=$row->poliza;
                                $fecha=formatearFechaHora($row->fechaRegistro);

                                $this->pdf->Cell(7,5,$num++,'TBLR',0,'L',0);
                                $this->pdf->Cell(25,5,$marca,'TBLR',0,'L',0);
                                $this->pdf->Cell(22,5,$tipoModelo,'TBLR',0,'L',0);
                                $this->pdf->Cell(22,5,$color,'TBLR',0,'L',0);
                                $this->pdf->Cell(18,5,$anioModelo,'TBLR',0,'L',0);
                                $this->pdf->Cell(40,5,$nroChasis,'TBLR',0,'L',0);
                                $this->pdf->Cell(40,5,$nroMotor,'TBLR',0,'L',0);
                                $this->pdf->Cell(40,5,$poliza,'TBLR',0,'L',0);
                                $this->pdf->Cell(40,5,$fecha,'TBLR',0,'L',0);
                                $this->pdf->Ln(5);
                        }

                        $this->pdf->Output("listamotocicletas.pdf","I");
     
                }
                else
                {
                        //El usuario no esta logueado
                        redirect('usuarios/panel','refresh');
                } 	
	}

}
