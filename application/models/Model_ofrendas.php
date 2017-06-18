<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_ofrendas extends CI_Model {
	public function ListarOfrendas(){
		$this->db->order_by('id_registro ASC');
		return $this->db->get('ofrendas')->result();
	}
	
	public function ExisteOfrenda($id_registro){
          $this->db->from('ofrendas');
          $this->db->where('id_registro',$id_registro);
          return $this->db->count_all_results();
    }
    
	public function SaveOfrenda($arrayOfrenda){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
		$this->db->insert('ofrendas', $arrayOfrenda);
     	$this->db->trans_complete();	
    }

	function BuscarID($id_Registro){

		$query = $this->db->where('id_registro',$id_Registro);
		$query = $this->db->get('ofrendas');
		return $query->result();
		
	}
	function edit($data,$id_Registro){

		$this->db->where('id_registro',$id_Registro);
		$this->db->update('ofrendas',$data);
		
	}
	function Eliminar($id_Registro){

		$this->db->where('id_registro',$id_Registro);
		$this->db->delete('ofrendas');
		
	}
}
?>