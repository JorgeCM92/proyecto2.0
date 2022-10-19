<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_model extends CI_Model {

    //cantidad de clientes
    public function cantidadCliente()
    {
        $this->db->from('cliente');
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de modelos
    public function cantidadModelo()
    {
        $this->db->from('modelo');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de modelos
    public function cantidadMarca()
    {
        $this->db->from('marca');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }
    //cantidad de productos
    public function cantidadProducto()
    {
        $this->db->from('producto');		
        $this->db->where('estado', 1);
        return $this->db->count_all_results();
    }

}
