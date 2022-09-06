<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motocicleta_model extends CI_Model {


	public function listamotocicletas()
	{
                $this->db->select('*'); //select *
                $this->db->from('motocicleta'); //tabla
                $this->db->where('estado','1');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarmotocicleta($data)
        {
                $this->db->insert('motocicleta',$data);
	}

        public function eliminarmotocicleta($idmotocicleta)
        {
                $this->db->where('idMotocicleta',$idmotocicleta);
                $this->db->delete('motocicleta');
        }

        public function recuperarmotocicleta($idmotocicleta)
        {
                $this->db->select('*'); //select *
                $this->db->from('motocicleta'); //tabla
                $this->db->where('idMotocicleta',$idmotocicleta);
                return $this->db->get(); //devolucion del resultado de la consulta
        }

        public function modificarmotocicleta($idmotocicleta,$data)
        {
                $this->db->where('idMotocicleta',$idmotocicleta);
                $this->db->update('motocicleta',$data);
        }

        public function listamotocicletasdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('motocicleta'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
