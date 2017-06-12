<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class Maestro extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_maestro');
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
		  $data['maestro'] = $this->model_maestro->ListarMaestro();         
          $this->load->view('view_maestro', $data);
          $this->load->view('footer');
	}
     public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el alumno
			   $VerifyExist = $this->model_maestro->ExisteMaestro($this->input->post("rut_maestro"));
               if($VerifyExist==0){
               	    $MaestroInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $MaestroInsertar["fecha_registro"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_maestro->SaveMaestro($MaestroInsertar);
               	    redirect("maestro?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Rut del Maestro Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_maestro');
					$this->load->view('footer');
               }

		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_maestro');
			  $this->load->view('footer');
		}
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("rut_maestro", "RutMaestro", "trim|required");
		 $this->form_validation->set_rules("nombre_maestro", "NombreMaestro", "trim|required");
		 $this->form_validation->set_rules("apellidos_maestro", "ApellidosMaestro", "trim|required");
		 $this->form_validation->set_rules("id_clase", "IdClase", "callback_select_nomclase");
		 $this->form_validation->set_rules("fecha_registro", "FechaRegistro", "trim|required");
		 //$this->form_validation->set_rules("n_celular", "N_celular", "trim|required");
		 //$this->form_validation->set_rules("fecha_nacimiento", "Fecha_nacimiento", "trim|required");
		 //$this->form_validation->set_rules("e_mail", "E_mail", "trim|required");
		 //$this->form_validation->set_rules("estado_civil", "Estado_civil", "callback_select_estadocivil");
		 //$this->form_validation->set_rules("vive_con", "Vive_con", "trim|required");
	 }
	 function select_nomclase($campo)
	{
		//Validamos tipo de estado_civil
		if($campo=="0"){
			$this->form_validation->set_message('select_nomclase', 'El Campo Clase Es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
	
	 public function editar($rut_maestro = NULL){
		
		if ($rut_maestro == NULL){
			$data['Modulo']  = "Maestro";
			$data['Error']   = "Error: El ID <strong>".$rut_maestro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_maestro->edit($datos_update,$rut_maestro);
				redirect('maestro?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_maestro'] = $this->model_maestro->BuscarID($rut_maestro);
			if (empty($data['datos_maestro'])){
				$data['Modulo']  = "Maestro";
				$data['Error']   = "Error: El ID <strong>".$rut_maestro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nuevo_maestro',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($rut = NULL){
		if ($rut == NULL ){
			$data['Modulo']  = "Maestro";
			$data['Error']   = "Error: El ID <strong>".$rut_maestro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('rut_maestro');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("maestro");
			}else{
                                $this->model_maestro->Eliminar($id_eliminar);
				redirect("maestro?delete=true");
			}
		}else{
			$data['datos_maestro'] = $this->model_maestro->BuscarID($rut_maestro);
			if (empty($data['datos_maestro'])){
				$data['Modulo']  = "Maestro";
				$data['Error']   = "Error: El ID <strong>".$rut_maestro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_maestro',$data);
				$this->load->view('footer');
			}
		}
	}
}
/* Archivo Maestro.php */
/* Location: ./application/controllers/Maestro.php */