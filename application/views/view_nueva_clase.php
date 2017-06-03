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
	$CampoOpcionesClases = array (
		'0'	      => 'Seleccione Clase',
		'SAMUEL'  => 'SAMUEL',
		'DAVID'   => 'DAVID',
		'ESTER'   => 'ESTER',
		'JOEL'    => 'JOEL',
		'TIMOTEO' => 'TIMOTEO',
		'GEDEÓN'  => 'GEDEÓN',
		'DANIEL'  => 'DANIEL',
		'JOSUÉ'   => 'JOSUÉ',
		'CALEB'   => 'CALEB',
		'ABRAHAM' => 'ABRAHAM',
		'TITO'    => 'TITO',
		);  
	echo '<tr>';
    echo '<td>'.form_label("Nombre de la Clase:",'nombre_clase').'</td>';
    echo '<td>';
    echo  form_dropdown('nombre_clase', $CampoOpcionesClases, set_value('nombre_clase',@$datos_clase[0]->nombre_clase));
	//echo form_input ($Nombre_clase);
    echo '</td>';
    echo '<td><font color="red">'.form_error('nombre_clase').'</font></td>';
    echo '</tr>';	
	
	/* $Nombre_clase 	  = array(
	'name'        => 'nombre_clase',
	'id'          => 'nombre_clase',
	'size'        => 50,
	'value'		  => set_value('nombre_clase',@$datos_clase[0]->nombre_clase),
	'placeholder' => 'Nombre Clase',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre Clase:",'nombre_clase').'</td>';
	echo '<td>';
	echo form_input($Nombre_clase);
	echo '</td>';
	echo '<td><font color="red">'.form_error('nombre_clase').'</font></td>';
	echo '</tr>';
	*/
	
	$Fecha_clase = array(
	'name'        => 'fecha_clase',
	'id'          => 'fecha_clase',
	'size'        => 8,
	'value'		  => set_value('fecha_clase',@$datos_clase[0]->fecha_clase),
	'placeholder' => 'Fecha Clase',
	'type'        => 'date',
	);
	echo '<tr>';
	echo '<td>'.form_label("Fecha Clase:",'fecha_clase').'</td>';
	echo '<td>';
	echo form_input($Fecha_clase);
	echo '</td>';
	echo '<td><font color="red">'.form_error('fecha_clase').'</font></td>';
	echo '</tr>';
	
	/*$Rut_Maestro  = array(
	'name'        => 'rut_maestro',
	'id'          => 'rut_maestro',
	'size'        => 12,
	'value'		  => set_value('Rut_Maestro',@$datos_clase[0]->rut_maestro),
	'placeholder' => 'Rut Maestro',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut Maestro:",'rut_maestro').'</td>';
	echo '<td>';
	echo form_input($Rut_Maestro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('rut_maestro').'</font></td>';
	echo '</tr>';
	
		
	$Rut_Alumno = array(
	'name'        => 'rut_alumno',
	'id'          => 'rut_alumno',
	'size'        => 12,
	'value'		  => set_value('rut_alumno',@$datos_clase[0]->rut_alumno),
	'placeholder' => 'Rut Alumno',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut Alumno:",'rut_alumno').'</td>';
	echo '<td>';
	echo form_input($Rut_Alumno);
	echo '</td>';
	echo '<td><font color="red">'.form_error('rut_alumno').'</font></td>';
	echo '</tr>';

     */	     
		
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