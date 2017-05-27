<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Nueva Clase :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$Nombre_clase 	  = array(
	'name'        => 'NOMBRE_CLASE',
	'id'          => 'NOMBRE_CLASE',
	'size'        => 50,
	'value'		  => set_value('NOMBRE_CLASE',@$datos_clase[0]->NOMBRE_CLASE),
	'placeholder' => 'Nombre_clase',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre_clase:",'NOMBRE_CLASE').'</td>';
	echo '<td>';
	echo form_input($Nombre_clase);
	echo '</td>';
	echo '<td><font color="red">'.form_error('NOMBRE_CLASE').'</font></td>';
	echo '</tr>';
	
	$Fecha_clase = array(
	'name'        => 'FECHA_CLASE',
	'id'          => 'FECHA_CLASE',
	'size'        => 8,
	'value'		  => set_value('FECHA_CLASE',@$datos_clase[0]->FECHA_CLASE),
	'placeholder' => 'Fecha_clase',
	'type'        => 'date',
	);
	echo '<tr>';
	echo '<td>'.form_label("Fecha_clase:",'FECHA_CLASE').'</td>';
	echo '<td>';
	echo form_input($Fecha_clase);
	echo '</td>';
	echo '<td><font color="red">'.form_error('FECHA_CLASE').'</font></td>';
	echo '</tr>';
	
	$Rut_Maestro  = array(
	'name'        => 'RUT_MAESTRO',
	'id'          => 'RUT_MAESTRO',
	'size'        => 12,
	'value'		  => set_value('Rut_Maestro',@$datos_clase[0]->RUT_MAESTRO),
	'placeholder' => 'Rut_Maestro',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut_Maestro:",'RUT_MAESTRO').'</td>';
	echo '<td>';
	echo form_input($Rut_Maestro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('RUT_MAESTRO').'</font></td>';
	echo '</tr>';
	
		
	$Rut_Alumno = array(
	'name'        => 'RUT_ALUMNO',
	'id'          => 'RUT_ALUMNO',
	'size'        => 12,
	'value'		  => set_value('Rut_Alumno',@$datos_clase[0]->RUT_ALUMNO),
	'placeholder' => 'Rut_Alumno',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut_Alumno:",'RUT_ALUMNO').'</td>';
	echo '<td>';
	echo form_input($Rut_Alumno);
	echo '</td>';
	echo '<td><font color="red">'.form_error('RUT_ALUMNO').'</font></td>';
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