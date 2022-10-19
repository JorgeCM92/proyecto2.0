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


    
}
