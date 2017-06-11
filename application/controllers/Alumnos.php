<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class Alumnos extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_alumnos');
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
		  $data['alumnos'] = $this->model_alumnos->ListarAlumnos();         
          $this->load->view('view_alumnos', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el alumno
			   $VerifyExist = $this->model_alumnos->ExisteAlumno($this->input->post("rut"));
               if($VerifyExist==0){
               	    $AlumnosInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $AlumnosInsertar["fecha_nacimiento"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_alumnos->SaveAlumno($AlumnosInsertar);
               	    redirect("alumnos?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Rut del Alumno Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_alumno');
					$this->load->view('footer');
               }

		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_alumno');
			  $this->load->view('footer');
		}
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("rut", "Rut", "trim|required");
		 $this->form_validation->set_rules("nombre", "Nombre", "trim|required");
		 $this->form_validation->set_rules("apellidos", "Apellidos", "trim|required");
		 $this->form_validation->set_rules("domicilio", "Domicilio", "trim|required");
		 $this->form_validation->set_rules("telefono_fijo", "Telefono_fijo", "trim|required");
		 $this->form_validation->set_rules("n_celular", "N_celular", "trim|required");
		 $this->form_validation->set_rules("fecha_nacimiento", "Fecha_nacimiento", "trim|required");
		 $this->form_validation->set_rules("e_mail", "E_mail", "trim|required");
		 $this->form_validation->set_rules("estado_civil", "Estado_civil", "callback_select_estadocivil");
		 $this->form_validation->set_rules("vive_con", "Vive_con", "trim|required");
	 }
	 function select_estadocivil($campo)
	{
		//Validamos tipo de estado_civil
		if($campo=="0"){
			$this->form_validation->set_message('select_estadocivil', 'El Campo Estado Civil Es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	
	 public function editar($rut = NULL){
		
		if ($rut == NULL){
			$data['Modulo']  = "Alumnos";
			$data['Error']   = "Error: El ID <strong>".$rut."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_alumnos->edit($datos_update,$rut);
				redirect('alumnos?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_alumnos_tabla'] = $this->model_alumnos->BuscarID($rut);
			if (empty($data['datos_alumnos_tabla'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$rut."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nuevo_alumno',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($rut = NULL){
		if ($rut == NULL ){
			$data['Modulo']  = "Alumnos";
			$data['Error']   = "Error: El ID <strong>".$rut."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('rut');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("alumnos");
			}else{
                                $this->model_alumnos->Eliminar($id_eliminar);
				redirect("alumnos?delete=true");
			}
		}else{
			$data['datos_alumnos_tabla'] = $this->model_alumnos->BuscarID($rut);
			if (empty($data['datos_alumnos_tabla'])){
				$data['Modulo']  = "Alumnos";
				$data['Error']   = "Error: El ID <strong>".$rut."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_alumno',$data);
				$this->load->view('footer');
			}
		}
	}
}
/* Archivo Alumnos.php */
/* Location: ./application/controllers/Alumnos.php */