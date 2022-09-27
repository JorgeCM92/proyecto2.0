<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function validar($login,$password)
	{
        //$this->db->select('idUusuario,login,tipo'); //para saleccionar campos especificos

        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('login',$login);
        $this->db->where('password',$password);
        return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function listausuarios()
	{
                $this->db->select('U.idUsuario, U.login, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
                U.telefono, U.direccion, U.estado, U.idSucursal, S.idSucursal, S.nombreSucursal'); //select *
                $this->db->from('usuario U'); //tabla
                $this->db->where('U.estado','1');
                $this->db->join('sucursal S', 'S.idSucursal=U.idSucursal');
                return $this->db->get(); //devolucion del resultado de la consulta
	}

        public function agregarusuario($data)
        {
                $this->db->insert('usuario',$data);
	}

        public function eliminarusuario($idusuario)
        {
                $this->db->where('idUsuario',$idusuario);
                $this->db->delete('usuario');
        }

        public function recuperarusuario($idusuario)
        {

                $this->db->select('U.idUsuario, U.login, U.password, U.tipo, U.nombres, U.primerApellido, U.segundoApellido, U.cedulaIdentidad, 
                U.telefono, U.direccion, U.estado, U.idSucursal, S.idSucursal, S.nombreSucursal'); //select *
                $this->db->from('usuario U'); //tabla
                $this->db->where('U.idUsuario',$idusuario);
                $this->db->join('sucursal S', 'S.idSucursal=U.idSucursal');
                return $this->db->get(); //devolucion del resultado de la consulta
                
                /*$this->db->select('*'); //select *
                $this->db->from('usuario'); //tabla
                $this->db->where('idUsuario',$idusuario);
                return $this->db->get(); //devolucion del resultado de la consulta*/
        }

        public function modificarusuario($idusuario,$data)
        {
                $this->db->where('idUsuario',$idusuario);
                $this->db->update('usuario',$data);
        }

        public function listausuariosdeshabilitados()
        {
                $this->db->select('*'); //select *
                $this->db->from('usuario'); //tabla
                $this->db->where('estado','0');
                return $this->db->get(); //devolucion del resultado de la consulta
        }

}
