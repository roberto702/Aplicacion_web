<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class Ofrendas extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo del controlador
          $this->load->model('model_ofrendas');
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
		  $data['ofrendas'] = $this->model_ofrendas->ListarOfrendas();         
		  //obtenemos el array de clase y lo preparamos para enviar
		  //$datos['arrClase'] = $this->model_ofrendas->get_ListarClase();
		  
		  //cargamos la interfaz y le enviamos datos
		  $this->load->view('view_ofrendas', $data);
          $this->load->view('footer');
	}
     public function nuevo()
	 {
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE)
		{
				//Verificamos si existe el registro de ofrenda
			   $VerifyExist = $this->model_ofrendas->ExisteOfrenda($this->input->post("id_registro"));
               if($VerifyExist==0){
               	    $OfrendasInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    //$OfrendasInsertar["fecha_registro"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_ofrendas->SaveOfrenda($OfrendasInsertar);
               	    redirect("ofrendas?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Registro Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nueva_ofrenda');
					$this->load->view('footer');
               }

		}else{
			  $this->load->view('header');
			  $this->load->view('view_nueva_ofrenda');
			  $this->load->view('footer');
		}
     }
	 function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		
		 $this->form_validation->set_rules("id_clase", "Id_clase", "callback_select_clase");
		 $this->form_validation->set_rules("ofrenda_clase", "Ofrenda_clase", "trim|required");
		 $this->form_validation->set_rules("fecha_ofrenda", "Fecha_ofrenda", "trim|required");
		 
	}
	
	function select_clase($campo)
	{
		//Validamos nombre de la clase
		if($campo=="0"){
			$this->form_validation->set_message('select_clase', 'El campo Nombre Clase es Obligatorio.');
			return false;
		} else{
		// Retornamos
		return true;
		}
	}
			
	public function editar($id_registro = NULL){
		
		if ($id_registro == NULL){
			$data['Modulo']  = "Ofrendas";
			$data['Error']   = "Error: El ID <strong>".$id_registro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			
			$this->ValidaCampos();
				
			if ($this->form_validation->run() == TRUE){
				$datos_update = $this->input->post();
				$id_insertado = $this->model_ofrendas->edit($datos_update,$id_registro);
				redirect('ofrendas?update=true');
				
			}else{
				$this->Nuevo();
			}
			
		}else{
			$data['datos_ofrendas'] = $this->model_ofrendas->BuscarID($id_registro);
			if (empty($data['datos_ofrendas'])){
				$data['Modulo']  = "Ofrendas";
				$data['Error']   = "Error: El ID <strong>".$id_registro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_nueva_ofrenda',$data);
				$this->load->view('footer');
			}
		}
		
	}
	public function eliminar($id_registro = NULL){
		if ($id_registro == NULL ){
			$data['Modulo']  = "Ofrendas";
			$data['Error']   = "Error: El ID <strong>".$id_registro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
			$this->load->view('header');
			$this->load->view('view_errors',$data);
			$this->load->view('footer');
			return;
		}
		if ($this->input->post()) {
			$id_eliminar = $this->input->post('id_registro');
			$boton       = strtoupper($this->input->post('btn_guardar'));
			if($boton=="NO"){
				redirect("ofrendas");
			}else{
                                $this->model_ofrendas->Eliminar($id_eliminar);
				redirect("ofrendas?delete=true");
			}
		}else{
			$data['datos_ofrendas'] = $this->model_ofrendas->BuscarID($id_registro);
			if (empty($data['datos_ofrendas'])){
				$data['Modulo']  = "Ofrendas";
				$data['Error']   = "Error: El ID <strong>".$id_registro."</strong> No es Válido, Verifica tu Búsqueda !!!!!!!";
				$this->load->view('header');
				$this->load->view('view_errors',$data);
				$this->load->view('footer');
			}else{
				$this->load->view('header');
				$this->load->view('view_delete_ofrenda',$data);
				$this->load->view('footer');
			}
		}
	}
}
/* Archivo Ofrendas.php */
/* Location: ./application/controllers/Ofrendas.php */