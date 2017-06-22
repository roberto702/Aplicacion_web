<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_alumnos extends CI_Model {
	public function ListarAlumnos(){
		$this->db->order_by('rut ASC');
		return $this->db->get('datos_alumnos')->result();
	}
	
	function get_ArregloAlumnos(){
		// se arma la consulta
		$query_2 = $this->db->query('SELECT rut, id_clase FROM datos_alumnos');
		
		if ($query_2->num_rows() > 0){
			//se guarda los datos en arreglo bidimensional
			foreach($query_2->result() as $row)
			$arrDatos_2[htmlspecialchars($row->rut, ENT_QUOTES)]=htmlspecialchars($row->rut,ENT_QUOTES);
			$query_2->free_result();
			return $arrDatos_2;
		}	
		
	}
	
	function get_ListarClase(){
	// se arma la consulta
	$query = $this->db->query('SELECT id_clase, nombre_clase FROM clase');
	
	//si hay resultados 
	if ($query->num_rows() > 0){
		//almacenamos en una matriz bidimensional
		foreach($query->result() as $row)
		$arrDatos[htmlspecialchars($row->id_clase, ENT_QUOTES)]=htmlspecialchars($row->nombre_clase,ENT_QUOTES);
		$query->free_result();
		return $arrDatos;
	}
		
	$this->db->order_by('id_clase ASC');
	return $this->db->get('clase')->result();
	}
	
	public function ExisteAlumno($rut){
          $this->db->from('datos_alumnos');
          $this->db->where('rut',$rut);
          return $this->db->count_all_results();
     }
     public function SaveAlumno($arrayAlumno){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
		$this->db->insert('datos_alumnos', $arrayAlumno);
     	$this->db->trans_complete();	
     }
	 function BuscarID($id_RUT){

		$query = $this->db->where('rut',$id_RUT);
		$query = $this->db->get('datos_alumnos');
		return $query->result();
		
	}
	function edit($data,$id_RUT){

		$this->db->where('rut',$id_RUT);
		$this->db->update('datos_alumnos',$data);
		
	}
	function Eliminar($id_RUT){

		$this->db->where('rut',$id_RUT);
		$this->db->delete('datos_alumnos');
		
	}
}
?>