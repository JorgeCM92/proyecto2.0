<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_model extends CI_Model {


	public function listaproductos()
	{
                $this->db->select('P.idProducto, P.color, P.anioModelo, P.nroChasis, P.nroMotor, 
                P.poliza, P.precio, P.estado, P.fechaRegistro, P.fechaActualizacion,
                P.idMarca, MA.nombreMarca, P.idModelo, MO.nombreModelo'); //select *
                $this->db->from('producto P'); //tabla
                $this->db->where('P.estado','1');
                $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
                $this->db->join('modelo MO', 'P.idModelo=MO.idModelo');
                return $this->db->get(); //devolucion del resultado de la consulta
                
        
	}

        public function agregarproducto($data)
        {
                $this->db->insert('producto',$data);
	}

        public function eliminarproducto($idproducto)
        {
                $this->db->where('idProducto',$idproducto);
                $this->db->delete('producto');
        }

        public function recuperarproducto($idproducto)
        {
                $this->db->select('P.idProducto, P.color, P.anioModelo, P.nroChasis, P.nroMotor, 
                P.poliza, P.precio, P.estado, P.fechaRegistro, P.fechaActualizacion,
                P.idMarca, MA.nombreMarca, P.idModelo, MO.nombreModelo'); //select *
                $this->db->from('producto P'); //tabla
                $this->db->where('idProducto',$idproducto);
                $this->db->join('marca MA', 'P.idMarca=MA.idMarca');
                $this->db->join('modelo MO', 'P.idModelo=MO.idModelo');
                return $this->db->get(); //devolucion del resultado de la consulta

                /*$this->db->select('*'); //select *
                $this->db->from('producto'); //tabla
                $this->db->where('idProducto',$idproducto);
                return $this->db->get(); //devolucion del resultado de la consulta*/
        }

        public function modificarproducto($idproducto,$data)
        {
                $this->db->where('idProducto',$idproducto);
                $this->db->update('producto',$data);
        }

        public function listaproductosdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('producto'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
