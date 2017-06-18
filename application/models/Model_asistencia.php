<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_asistencia extends CI_Model {
	public function ListarAsistencia(){
		$this->db->order_by('rut_asistencia ASC');
		return $this->db->get('asistencia')->result();
	}
	public function ExisteAsistencia($id_asistencia){
          $this->db->from('asistencia');
          $this->db->where('id_asistencia',$id_asistencia);
          return $this->db->count_all_results();
     }
     public function SaveAsistencia($arrayAsistencia){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
		$this->db->insert('asistencia', $arrayAsistencia);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id_nombre_asistencia){

		$query = $this->db->where('id_asistencia',$id_nombre_asistencia);
		$query = $this->db->get('asistencia');
		return $query->result();
		
	}
	function edit($data,$id_nombre_asistencia){

		$this->db->where('id_asistencia',$id_nombre_asistencia);
		$this->db->update('asistencia',$data);
		
	}
	function Eliminar($id_nombre_asistencia){

		$this->db->where('id_asistencia',$id_nombre_asistencia);
		$this->db->delete('asistencia');
		
	}
}
?>