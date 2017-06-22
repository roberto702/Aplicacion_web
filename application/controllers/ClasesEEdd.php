<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class Claseseedd extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_clases');
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
          $data['clase'] = $this->model_clases->ListarClases();         
          $this->load->view('view_clases', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe la clase
			   $VerifyExist = $this->model_clases->ExisteClase($this->input->post("nombre_clase"));
               if($VerifyExist==0){
               	    $ClaseInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $ClaseInsertar["fecha_clase"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_clases->SaveClase($ClaseInsertar);
               	    redirect("claseseedd?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Nombre de la Clase Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nueva_clase');
					$this->load->view('footer');
               }

		}else{
			  $this->load->view('header');
			  $this->load->view('view_nueva_clase');
			  $this->load->view('footer');
		}
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("nombre_clase", "Nombre_Clase", "trim|required");
		 $this->form_validation->set_rules("fecha_clase", "Fecha_clase", "trim|required");
		 //$this->form_validation->set_rules("rut_maestro", "Rut_Maestro", "trim|required");
		 //$this->form_validation->set_rules("rut_alumno", "Rut_Alumno", "callback_select_tipo");
		 //$this->form_validation->set_rules("ESTATUS", "Estatus", "callback_select_estatus");
	 }
	 function select_tipo($campo)
	{
		//Validamos tipo de usuario
		if($campo=="0"){
			$this->form_validation->set_message('select_tipo', 'El Campo Tipo Es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	
	 public function editar($nombre_clase = NULL){
		
		if ($nombre_clase == NULL){
			$data['Modulo']  = "Claseseedd";
			$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_clases->edit($datos_update,$nombre_clase);
				redirect('claseseedd?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_clase'] = $this->model_clases->BuscarID($nombre_clase);
			if (empty($data['datos_clase'])){
				$data['Modulo']  = "Claseseedd";
				$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nueva_clase',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($nombre_clase = NULL){
		if ($nombre_clase == NULL ){
			$data['Modulo']  = "Claseseedd";
			$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('nombre_clase');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("claseseedd");
			}else{
                                $this->model_clases->Eliminar($id_eliminar);
				redirect("claseseedd?delete=true");
			}
		}else{
			$data['datos_clase'] = $this->model_clases->BuscarID($nombre_clase);
			if (empty($data['datos_clase'])){
				$data['Modulo']  = "Claseseedd";
				$data['Error']   = "Error: El ID <strong>".$nombre_clase."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_clases',$data);
				$this->load->view('footer');
			}
		}
	}
}
/* Archivo Claseseedd.php */
/* Location: ./application/controllers/Claseseedd.php */