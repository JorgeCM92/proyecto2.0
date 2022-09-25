<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_model extends CI_Model {


	public function listamodelos()
	{
                $this->db->select('*'); //select *
                $this->db->from('modelo'); //tabla
                $this->db->where('estado','1');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarmodelo($data)
        {
                $this->db->insert('modelo',$data);
	}

        public function eliminarmodelo($idmodelo)
        {
                $this->db->where('idModelo',$idmodelo);
                $this->db->delete('modelo');
        }

        public function recuperarmodelo($idmodelo)
        {
                $this->db->select('*'); //select *
                $this->db->from('modelo'); //tabla
                $this->db->where('idModelo',$idmodelo);
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        public function modificarmodelo($idmodelo,$data)
        {
                $this->db->where('idModelo',$idmodelo);
                $this->db->update('modelo',$data);
        }

        public function listamodelosdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('modelo'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
