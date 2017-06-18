<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class Asistencia extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_alumnos');#No quitar esto
          $this->load->model('model_clases'); #Tampoco esto
          $this->load->model('model_asistencia');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
     }
     function Seguridad(){
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $data['alumnos'] = $this->model_alumnos->ListarAlumnos(); #No quitar esto
          $data['clase'] = $this->model_clases->ListarClases(); #Tampoco esto
		  $data['asistencia'] = $this->model_asistencia->ListarAsistencia();          
          $this->load->view('view_asistencia', $data);
          $this->load->view('footer');
          /*Si el usuario esta logeado*/
        
	}
     public function nuevo(){
	      $this->Seguridad();
		  $hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
				//Verificamos si existe la clase
               	    $AsistenciaInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $AsistenciaInsertar["fecha_asistencia"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_asistencia->SaveAsistencia($AsistenciaInsertar);
               	    redirect("asistencia?save=true");
        
         }
	 	
	public function editar($nombre_clase = NULL){
		
		if ($nombre_clase == NULL){
			$data['Modulo']  = "Asistencia";
			$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_asistencia->edit($datos_update,$nombre_clase);
				redirect('asistencia?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_asistencia'] = $this->model_asistencia->BuscarID($nombre_clase);
			if (empty($data['datos_asistencia'])){
				$data['Modulo']  = "Asistencia";
				$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nueva_asistencia',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($nombre_clase = NULL){
		if ($nombre_clase == NULL ){
			$data['Modulo']  = "Asistencia";
			$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('nombre_clase');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("asistencia");
			}else{
                                $this->model_asistencia->Eliminar($id_eliminar);
				redirect("asistencia?delete=true");
			}
		}else{
			$data['datos_asistencia'] = $this->model_asistencia->BuscarID($nombre_clase);
			if (empty($data['datos_asistencia'])){
				$data['Modulo']  = "Asistencia";
				$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_asistencia',$data);
				$this->load->view('footer');
			}
		}
	}
}
/* Archivo Asistencia.php */
/* Location: ./application/controllers/Asistencia.php */