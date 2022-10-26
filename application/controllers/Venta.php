<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Venta extends CI_Controller
{

    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->venta_model->listaventa();
            $data['venta'] = $lista;

            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('venta/venta_lista_read', $data);
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }
    public function index2()
    {
        if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->venta_model->listaventa();
            $data['venta'] = $lista;

            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('venta/venta_lista_read', $data);
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }
    public function vistaAgregarVenta()
    {

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('venta/venta_formulario_insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');

        
    }
    public function vistaActualizar()
    {
        $idVenta = $this->input->post('idVenta');

        $data['venta'] = $this->venta_model->recuperarVenta($idVenta);

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('venta/venta_formulario_update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }


    public function buscar()
    {
        $search_data = $this->input->post('producto');

        $query = $this->venta_model->buscarProducto($search_data);
        $datos = json_encode($query->result());
        if (!empty($query->result())) {


            foreach ($query->result() as $row) {
                echo "<li class='list-group-item'><a href='javascript:void(0)' data-producto='producto'>$row->idProducto</a></li>";
            }
        } else {
            echo "<li> <em> No se encuentra... </em> </li>";
        }
    }

    public function productList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->venta_model->getProducts($postData);

        echo json_encode($data);
    }

    /*public function marcaList()
    {

        // POST data
        $producto = $this->input->post('producto');

        // Get data
        $data = $this->venta_model->getMarcas($producto);

        echo json_encode($data);
    }*/

    public function clientList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->cliente_model->getClients($postData);

        echo json_encode($data);
    }

    
    public function insertVenta()
    {

        $data['idCliente'] = $_POST['idcli'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $data['estado'] = 1;

        // $data['idVenta'] = $_POST['idCliente'];
        $data['idProducto'] = $_POST['idProdu'];
        $data['cantidad'] =  $_POST['cantidad'];

        $data['precioTotal'] = $_POST['totalPrecio'];

        if ($this->venta_model->registrar($data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }


    public function modificarVenta()
    {
        $data['precioVenta'] = $_POST['totalPrecio'];
        $data['idCliente'] = $_POST['idcliente'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $id =  $_POST['idVenta'];
        $data['estado'] = 1;
        $data['idProducto'] = $_POST['idProducto'];
        $data['cantidad'] =  $_POST['cantidad'];


        if ($this->venta_model->actualizar($id,$data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }

public function listapdf()
	{

        if($this->session->userdata('login'))
        {

            $lista=$this->venta_model->listaventa();
            $lista=$lista->result();   
            

            $this->pdf=new Pdf('P', 'mm', 'letter');
            $this->pdf->AddPage();
            /* 
            AddPage:
                    L Orientacion Horizontal
                    P Orientacion Vertical
            Size: tamaño hoja
                    A3,A4,A5,Letter,Legal
            */

            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Ventas");//Configuaraion del titulo
            $this->pdf->SetMargins(10, 10, 10);
            //$this->pdf->SetLeftMargin(15);//Configuaraion del margen izquierdo
            //$this->pdf->SetRightMargin(15);//Configuaraion del margen derecho
            $this->pdf->SetFillColor(210,210,210);//Configuaraion del color de fondo
            $this->pdf->SetFont('Arial','BU',13);//Configuaraion de la fuente de la letre
            $this->pdf->Cell(30);//Configuaraion de una celda
            $this->pdf->SetFont('Arial', 'B', 12);
            //$this->pdf->SetFont('Arial', 'B', 12);
            $this->pdf->Cell(150, 5, utf8_decode("SISTEMA WEB DE VENTAS"), 0, 1, 'C');
            $this->pdf->Ln();
            $this->pdf->Ln();
            $this->pdf->Image("uploads/membrete1.png", 180, 10, 30, 30, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln();
            $this->pdf->Cell(20, 5, utf8_decode("Usuario: "), 0, 0, 'L');
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(20, 5, /$lista->login,/ 0, 1, 'L');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln();
            $this->pdf->Cell(20, 5, utf8_decode("Sucursal: "), 0, 0, 'L');
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(20, 5, /$lista->nombreSucursal,/ 0, 1, 'L');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln();
            $this->pdf->Cell(20, 5, utf8_decode("Dirección: "), 0, 0, 'L');
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(20, 5,/* $lista->direccion,*/ 0, 1, 'L');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln();
            $this->pdf->Cell(20, 5, "Fecha: ", 0, 0, 'L');
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(20, 5, /$lista->fechaRegistro,/ 0, 1, 'L');
            $this->pdf->Ln();
            $this->pdf->Ln();            
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->SetFillColor(0, 0, 0);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(196, 5, "Datos del cliente", 1, 1, 'C', 1);
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Cell(90, 5, utf8_decode('Nombre/Razon Social'), 0, 0, 'L');
            $this->pdf->Cell(50, 5, utf8_decode('C.I./NIT'), 0, 0, 'L');
            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(90, 5, /$lista->nombres,/ 0, 0, 'L');
            $this->pdf->Cell(50, 5,/*$lista->cedulaIdentidad, */0, 0, 'L');
            $this->pdf->Ln(3);
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(196, 5, "Detalle de Producto", 1, 1, 'C', 1);
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Cell(14, 5, utf8_decode('N°'), 0, 0, 'L');
            $this->pdf->Cell(90, 5, utf8_decode('Descripción'), 0, 0, 'L');
            $this->pdf->Cell(25, 5, 'Cantidad', 0, 0, 'L');
            $this->pdf->Cell(32, 5, 'Precio', 0, 0, 'L');
            $this->pdf->Cell(35, 5, 'Sub Total.', 0, 1, 'L');
            $this->pdf->SetFont('Arial', '', 10);
                $contador = 1;

                //$modelo=$lista->nombreModelo;
                //$cantidad=$lista->cantidad;
                //$precio=$lista->precioVenta;

                    //$this->pdf->Cell(14, 5, $contador, 0, 0, 'L');
                    //$this->pdf->Cell(90, 5, $modelo, 0, 0, 'L');
                    //$this->pdf->Cell(25, 5, $cantidad, 0, 0, 'L');
                    //$this->pdf->Cell(32, 5, $precio, 0, 0, 'L');
                    //$this->pdf->Cell(35, 5, number_format($row->cantidad * $row->precioVenta, 2, '.', ','), 0, 1, 'L');
//$contador++;
                
                    /*$this->pdf->SetFont('Arial','B',10);
                    $this->pdf->Cell(14, 5, '', 0, 0, 'L');
                    $this->pdf->Cell(90, 5, '', 0, 0, 'L');
                    $this->pdf->Cell(25, 5, '', 0, 0, 'L');
                    $this->pdf->Cell(32, 5, '', 0, 0, 'L');
                    $this->pdf->Cell(35, 5, '', 0, 1, 'L');*/

                $this->pdf->Output("ventas.pdf", "I");
            
        }
        else
        {
                //El usuario no esta logueado
                redirect('usuarios/panel','refresh');
	    }

    }
}