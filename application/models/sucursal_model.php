<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal_model extends CI_Model {


	public function listasucursales()
	{
                $this->db->select('*'); //select *
                $this->db->from('sucursal'); //tabla
                $this->db->where('estado','1');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarsucursal($data)
        {
                $this->db->insert('sucursal',$data);
	}

        public function eliminarsucursal($idsucursal)
        {
                $this->db->where('idSucursal',$idsucursal);
                $this->db->delete('sucursal');
        }

        public function recuperarsucursal($idsucursal)
        {
                $this->db->select('*'); //select *
                $this->db->from('sucursal'); //tabla
                $this->db->where('idSucursal',$idsucursal);
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        public function modificarsucursal($idsucursal,$data)
        {
                $this->db->where('idSucursal',$idsucursal);
                $this->db->update('sucursal',$data);
        }

        public function listasucursaleshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('sucursal'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
