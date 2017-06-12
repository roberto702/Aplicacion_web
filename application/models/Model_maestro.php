<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_maestro extends CI_Model {
	public function ListarMaestro(){
		$this->db->order_by('rut_maestro ASC');
		return $this->db->get('maestro')->result();
	}
	public function ExisteMaestro($rut_maestro){
          $this->db->from('maestro');
          $this->db->where('rut_maestro',$rut_maestro);
          return $this->db->count_all_results();
     }
     public function SaveMaestro($arrayMaestro){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('maestro', $arrayMaestro);
     	$this->db->trans_complete();	
     }
	 function BuscarID($rut_maestro){

		$query = $this->db->where('rut_maestro',$rut_maestro);
		$query = $this->db->get('maestro');
		return $query->result();
		
	}
	function edit($data,$rut_maestro){

		$this->db->where('rut_maestro',$rut_maestro);
		$this->db->update('maestro',$data);
		
	}
	function Eliminar($rut_maestro){

		$this->db->where('rut_maestro',$rut_maestro);
		$this->db->delete('maestro');
		
	}
}
?>