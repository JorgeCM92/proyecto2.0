<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca_model extends CI_Model {


	public function listamarcas()
	{
                $this->db->select('*'); //select *
                $this->db->from('marca'); //tabla
                $this->db->where('estado','1');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarmarca($data)
        {
                $this->db->insert('marca',$data);
	}

        public function eliminarmarca($idmarca)
        {
                $this->db->where('idMarca',$idmarca);
                $this->db->delete('marca');
        }

        public function recuperarmarca($idmarca)
        {
                $this->db->select('*'); //select *
                $this->db->from('marca'); //tabla
                $this->db->where('idMarca',$idmarca);
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        public function modificarmarca($idmarca,$data)
        {
                $this->db->where('idMarca',$idmarca);
                $this->db->update('marca',$data);
        }

        public function listamarcasdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('marca'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
