<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_clases extends CI_Model {
	public function ListarClases(){
		$this->db->order_by('NOMBRE_CLASE ASC');
		return $this->db->get('clase')->result();
	}
	public function ExisteClase($nombre_clase){
          $this->db->from('clase');
          $this->db->where('nombre_clase',$nombre_clase);
          return $this->db->count_all_results();
     }
     public function SaveClase($arrayCliente){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('clase', $arrayCliente);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id_NOMBRE_CLASE){

		$query = $this->db->where('NOMBRE_CLASE',$id_NOMBRE_CLASE);
		$query = $this->db->get('clase');
		return $query->result();
		
	}
	function edit($data,$id_NOMBRE_CLASE){

		$this->db->where('NOMBRE_CLASE',$id_NOMBRE_CLASE);
		$this->db->update('clase',$data);
		
	}
	function Eliminar($id_NOMBRE_CLASE){

		$this->db->where('NOMBRE_CLASE',$id_NOMBRE_CLASE);
		$this->db->delete('clase');
		
	}
}
?>