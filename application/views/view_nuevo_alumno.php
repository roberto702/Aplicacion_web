<script type="text/javascript">
           
            $(document).ready(function() {
                $('#clase').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>


<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Ingreso de Nuevos Alumnos :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$Rut		  = array(
	'name'		  => 'rut',
	'id'		  => 'rut',
	'size'        => 12,
	'value'       => set_value('rut',@$datos_alumnos_tabla[0]->rut),
	'placeholder' => 'Rut',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut:",'rut').'</td>';
	echo '<td>';
	echo form_input($Rut);
	echo '</td>';
	echo '<td><font color="red">'.form_error('rut').'</font></td>';
	echo '</tr>';
	
	//echo form_label('Nombre Clase: '), form_dropdown('selClase', $arrClase);
	
	
	 $arrClase = array(
	'0'  => '-SELECCIONE Nombre Clase-',
	'1'	 => 'SAMUEL',
	'2'	 => 'DAVID',
	'3'  => 'ESTER',
	'4'	 => 'JOEL',
	'5'  => 'TIMOTEO',
	'6'  => 'GEDEON',
	'7'  => 'DANIEL',
	'8'  => 'JOSUE',
	'9'  => 'CALEB',
	'10' => 'ABRAHAM',
	'11' => 'TITO',
	);
	echo '<tr>';
    echo '<td>'.form_label("Nombre Clase:",'nombre_clase').'</td>';
    echo '<td>';
    echo  form_dropdown('id_clase', $arrClase, set_value('id_clase',@$datos_alumnos_tabla[0]->id_clase));
    echo '</td>';
    echo '<td><font color="red">'.form_error('nombre_clase').'</font></td>';
    echo '</tr>'; 
	
	$Nombre 	  = array(
	'name'        => 'nombre',
	'id'          => 'nombre',
	'size'        => 50,
	'value'		  => set_value('nombre',@$datos_alumnos_tabla[0]->nombre),
	'placeholder' => 'Nombre',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre:",'nombre').'</td>';
	echo '<td>';
	echo form_input($Nombre);
	echo '</td>';
	echo '<td><font color="red">'.form_error('nombre').'</font></td>';
	echo '</tr>';
	
	$Apellidos = array(
	'name'        => 'apellidos',
	'id'          => 'apellidos',
	'size'        => 50,
	'value'		  => set_value('apellidos',@$datos_alumnos_tabla[0]->apellidos),
	'placeholder' => 'Apellidos',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Apellidos:",'apellidos').'</td>';
	echo '<td>';
	echo form_input($Apellidos);
	echo '</td>';
	echo '<td><font color="red">'.form_error('apellidos').'</font></td>';
	echo '</tr>';
	
	$Domicilio 		  = array(
	'name'        => 'domicilio',
	'id'          => 'domicilio',
	'size'        => 200,
	'value'		  => set_value('domicilio',@$datos_alumnos_tabla[0]->domicilio),
	'placeholder' => 'Domicilio',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Dirección:",'domicilio').'</td>';
	echo '<td>';
	echo form_input($Domicilio);
	echo '</td>';
	echo '<td><font color="red">'.form_error('domicilio').'</font></td>';
	echo '</tr>';
	
	$Telefono_fijo 		  = array(
	'name'        => 'telefono_fijo',
	'id'          => 'telefono_fijo',
	'size'        => 10,
	'value'		  => set_value('telefono_fijo',@$datos_alumnos_tabla[0]->telefono_fijo),
	'placeholder' => 'Telefono_fijo',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Teléfono Fijo:",'telefono_fijo').'</td>';
	echo '<td>';
	echo form_input($Telefono_fijo);
	echo '</td>';
	echo '<td><font color="red">'.form_error('telefono_fijo').'</font></td>';
	echo '</tr>';
	
	$N_celular 		  = array(
	'name'        => 'n_celular',
	'id'          => 'n_celular',
	'size'        => 12,
	'value'		  => set_value('n_celular',@$datos_alumnos_tabla[0]->n_celular),
	'placeholder' => 'N_celular',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Número Celular:",'n_celular').'</td>';
	echo '<td>';
	echo form_input($N_celular);
	echo '</td>';
	echo '<td><font color="red">'.form_error('n_celular').'</font></td>';
	echo '</tr>';
	
	$Fecha_nacimiento = array(
	'name'        => 'fecha_nacimiento',
	'id'          => 'fecha_nacimiento',
	'size'        => 8,
	'value'		  => set_value('fecha_nacimiento',@$datos_alumnos_tabla[0]->fecha_nacimiento),
	'placeholder' => 'Fecha_nacimiento',
	'type'        => 'date',
	);
	echo '<tr>';
	echo '<td>'.form_label("Fecha Nacimiento:",'fecha_nacimiento').'</td>';
	echo '<td>';
	echo form_input($Fecha_nacimiento);
	echo '</td>';
	echo '<td><font color="red">'.form_error('fecha_nacimiento').'</font></td>';
	echo '</tr>';
	
	$E_mail = array(
	'name'        => 'e_mail',
	'id'          => 'e_mail',
	'size'        => 50,
	'value'		  => set_value('e_mail',@$datos_alumnos_tabla[0]->e_mail),
	'placeholder' => 'e_mail',
	'type'        => 'email',
	);
	echo '<tr>';
	echo '<td>'.form_label("Correo Electrónico:",'e_mail').'</td>';
	echo '<td>';
	echo form_input($E_mail);
	echo '</td>';
	echo '<td><font color="red">'.form_error('e_mail').'</font></td>';
	echo '</tr>';
	
	$CampoOpcionesEstadoCivil = array(
	'0'               	=> '-SELECCIONE ESTADO CIVIL-',
	'Casado(a)'			=> 'Casado(a)',
	'Soltero(a)'	    => 'Soltero(a)',
	'Separado(a)'       => 'Separado(a)',
	'Viudo(a)'			=> 'Viudo(a)',
	);
	echo '<tr>';
    echo '<td>'.form_label("Estado Civil:",'estado_civil').'</td>';
    echo '<td>';
    echo  form_dropdown('estado_civil', $CampoOpcionesEstadoCivil, set_value('estado_civil',@$datos_alumnos_tabla[0]->estado_civil));
    echo '</td>';
    echo '<td><font color="red">'.form_error('estado_civil').'</font></td>';
    echo '</tr>';
	
	$Vive_con = array(
	'name'        => 'vive_con',
	'id'          => 'vive_con',
	'size'        => 20,
	'value'		  => set_value('vive_con',@$datos_alumnos_tabla[0]->vive_con),
	'placeholder' => 'Vive_con',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Alumno Vive con:",'vive_con').'</td>';
	echo '<td>';
	echo form_input($Vive_con);
	echo '</td>';
	echo '<td><font color="red">'.form_error('vive_con').'</font></td>';
	echo '</tr>';
		
	echo '<tr>';
	echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';
	echo '</tr>';
	echo '<tr><td colspan=3><hr/></td></tr>';
	echo '<tr>';
	echo '<td colspan=3><center>';
	echo '<input type="submit" class="btn btn-success" value="Guardar">';
    echo '</center></td></tr>';
    echo '</table></center>';
    echo form_close(); 
    echo '</td></tr>';
    echo '</table>';
    echo '</center>';
?>