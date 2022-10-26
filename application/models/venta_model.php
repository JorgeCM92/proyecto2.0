<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venta_model extends CI_Model
{


   public function listaventa() //select
   {
      $this->db->select('venta.idVenta, venta.fechaRegistro, venta.fechaActualizacion, cliente.idCliente, cliente.nombres, 
                        cliente.primerApellido, cliente.segundoApellido, cliente.cedulaIdentidad, usuario.idUsuario, usuario.login,
                        sucursal.idSucursal, sucursal.nombreSucursal, sucursal.direccion, detalleventa.precioVenta, detalleventa.cantidad, producto.nroChasis, producto.color, 
                        modelo.nombreModelo, marca.nombreMarca'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.estado', '1'); //condición where estado = 1
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario= usuario.idUsuario');
      $this->db->join('sucursal', 'usuario.idSucursal = sucursal.idSucursal');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('modelo', 'producto.idModelo = modelo.idModelo');
      $this->db->join('marca', 'producto.idMarca = marca.idMarca');

      //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
      return $this->db->get(); //devolucion del resultado de la consulta
   }


   public function buscarProducto($data) //get
   {
      $this->db->like('producto.idProducto', $data);
      $this->db->from('producto.producto'); //tabla productos
      $this->db->where('producto.estado', '1'); //condición where estado = 1
      return $this->db->get();
   }


   public function getProducts($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('*');
         $this->db->from('producto'); //tabla productos
         $this->db->where("nroChasis like '%".$postData['search']."%' ");
         $this->db->where('estado', '1'); //condición where estado = 1


         $records = $this->db->get()->result();


         foreach ($records as $row) {
            //$value = $row->nroChasis . ' - ' . $row->nombreMarca;
            $response2[] = array(
               //"value" => $value,
               "value" => $row->nroChasis,
               "nroChasis" => $row->nroChasis,
               "idProducto"=> $row->idProducto,
               //"modelo" => $row->nombreModelo,
               //"marca" => $row->nombreMarca,
               "precioUnitario" => $row->precio
            );
         }
      }
      return $response2;
   }



   // function getClients($postData,$idProducto){

   //     $response2 = array();
   //     if(isset($postData['search']) ){
   //       // Select record
   //       $this->db->select('*');
   //       $this->db->from('bddMilivoy.marca'); //tabla productos
   //       $this->db->join('bddMilivoy.producto ', 'marca.idMarca = producto.idMarca');
   //       $this->db->where("persona.marca like '%".$postData['search']."%' ");
   //       $this->db->where('producto.idProducto',$idProducto); //condición where estado = 1

   //       $records = $this->db->get()->result();

   //       foreach($records as $row ){
   //          $response2[] = array("value"=>$row->nombreMarca,"primerApellido"=>$row->primerApellido
   //          ,"segundoApellido"=>$row->segundoApellido,"carnet"=>$row->numeroCI);
   //         }

   //     }
   //     return $response2;
   //  }

  /* function getMarcas($postData)
   {

      $response2 = array();
      if (isset($postData['search'])) {
         // Select record
         $this->db->select('*');
         $this->db->from('marca.marca'); //tabla productos
         $this->db->join('producto.producto ', 'marca.idMarca = producto.idMarca');
         $this->db->where("marca.nombreMarca like '%" . $postData['search'] . "%' ");
         $this->db->where('producto.nroChasis', $postData); //condición where estado = 1

         $records = $this->db->get()->result();

         foreach ($records as $row) {
            $response2[] = array(
               "value" => $row->nombreMarca,"idMarca"=>$row->idMarca
            );
         }
      }
      return $response2;
   }*/




   public function registrar($data)
   {
      //Iniciamos la transacción.    
      $this->db->trans_begin();
      //Intenta insertar un cliente.    
      $this->db->insert('venta', array(
         'idCliente' => $data['idCliente'],
         'idUsuario' => $data['idUsuario'],
         'estado' => $data['estado'],
      ));
      //Recuperamos el id del cliente registrado.    
      $venta_id = $this->db->insert_id();
      //Insertamos los servicios que desea adquirir el cliente.    

      $this->db->insert('detalleventa', array(
         'idVenta' => $venta_id,
         'idProducto' => $data['idProducto'],
         'cantidad' => $data['cantidad'],
         'precioVenta' => $data['precioTotal'],
      ));

      if ($this->db->trans_status() === FALSE) {
         //Hubo errores en la consulta, entonces se cancela la transacción.   
         $this->db->trans_rollback();
         return false;
      } else {
         //Todas las consultas se hicieron correctamente.  
         $this->db->trans_commit();
         return true;
      }
   }

   public function actualizar($idVenta,$data)
   {
      $this->db->where('idVenta', $idVenta);
      $this->db->update('venta',  array(
         'idCliente' => $data['idCliente'],
         'idUsuario' => $data['idUsuario'],
         'estado' => $data['estado'],
      ));

      $this->db->where('idVenta', $idVenta);
      $this->db->update('detalleventa', array(
         'idProducto' => $data['idProducto'],
         'cantidad' => $data['cantidad'],
         'precioVenta' => $data['precioTotal'],
      ));

   }


   public function recuperarVenta($idVenta) //get
   {
      $this->db->select('*'); //select *
      $this->db->from('venta'); //tabla productos
      $this->db->where('venta.idVenta', $idVenta); //condición where estado = 1
      $this->db->join('cliente', 'venta.idCliente = cliente.idCliente');
      $this->db->join('usuario', 'venta.idUsuario = usuario.idUsuario');
      $this->db->join('detalleventa', 'venta.idVenta = detalleventa.idVenta');
      $this->db->join('producto', 'producto.idProducto = detalleventa.idProducto');
      $this->db->join('marca', 'marca.idMarca = producto.idMarca');

      return $this->db->get(); //devolucion del resultado de la consulta

   }
}
