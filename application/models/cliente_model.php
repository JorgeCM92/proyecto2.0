<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {


	public function listaclientes()
	{
                $this->db->select('*'); //select *
                $this->db->from('cliente'); //tabla
                $this->db->where('estado','1');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarcliente($data)
        {
                $this->db->insert('cliente',$data);
	}

        public function eliminarcliente($idcliente)
        {
                $this->db->where('idCliente',$idcliente);
                $this->db->delete('cliente');
        }

        public function recuperarcliente($idcliente)
        {
                $this->db->select('*'); //select *
                $this->db->from('cliente'); //tabla
                $this->db->where('idCliente',$idcliente);
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        public function modificarcliente($idcliente,$data)
        {
                $this->db->where('idCliente',$idcliente);
                $this->db->update('cliente',$data);
        }

        public function listaclientesdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('cliente'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        function getClients($postData){
        // $postData['search'] = 7;
        $response2 = array();
        if(isset($postData['search']) ){
          // Select record
          $this->db->select('*');
          $this->db->from('cliente'); //tabla productos
          $this->db->where("cedulaIdentidad like '%".$postData['search']."%' ");
          $this->db->where('estado','1'); //condición where estado = 1
        
          $records = $this->db->get()->result();
   
          foreach($records as $row ){
             $response2[] = array("value"=>$row->cedulaIdentidad,"cedulaIdentidad"=>$row->cedulaIdentidad,"idCliente"=>$row->idCliente,"primerApellido"=>$row->primerApellido
             ,"segundoApellido"=>$row->segundoApellido,"nombres"=>$row->nombres);
            }
   
        }
        return $response2;
     }

}
