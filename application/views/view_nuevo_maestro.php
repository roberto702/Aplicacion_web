<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Ingreso de Maestros :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$Rut_maestro  = array(
	'name'		  => 'rut_maestro',
	'id'		  => 'rut_maestro',
	'size'        => 12,
	'value'       => set_value('rut_maestro',@$datos_maestro[0]->rut_maestro),
	'placeholder' => 'Rut_maestro',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Rut:",'rut_maestro').'</td>';
	echo '<td>';
	echo form_input($Rut_maestro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('rut_maestro').'</font></td>';
	echo '</tr>';
		
	$Nombre_maestro = array(
	'name'        	=> 'nombre_maestro',
	'id'          	=> 'nombre_maestro',
	'size'        	=> 50,
	'value'		  	=> set_value('nombre_maestro',@$datos_maestro[0]->nombre_maestro),
	'placeholder' 	=> 'Nombre_maestro',
	'type'        	=> 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre:",'nombre_maestro').'</td>';
	echo '<td>';
	echo form_input($Nombre_maestro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('nombre_maestro').'</font></td>';
	echo '</tr>';
	
	$Apellidos_maestro = array(
	'name'        => 'apellidos_maestro',
	'id'          => 'apellidos_maestro',
	'size'        => 50,
	'value'		  => set_value('apellidos_maestro',@$datos_maestro[0]->apellidos_maestro),
	'placeholder' => 'Apellidos_maestro',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Apellidos:",'apellidos_maestro').'</td>';
	echo '<td>';
	echo form_input($Apellidos_maestro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('apellidos_maestro').'</font></td>';
	echo '</tr>';
	
	$CampoOpcionesIdClase = array(
	'0'               	=> '-SELECCIONE CLASE-',
	'SAMUEL'			=> 'SAMUEL',
	'DAVID'	    		=> 'DAVID',
	'ESTER'       		=> 'ESTER',
	'JOEL'				=> 'JOEL',
	'TIMOTEO'			=> 'TIMOTEO',
	'GEDEON'	    	=> 'GEDEON',
	'DANIEL'       		=> 'DANIEL',
	'JOSUE'				=> 'JOSUE',
	'CALEB'				=> 'CALEB',
	'ABRAHAM'	    	=> 'ABRAHAM',
	);
	echo '<tr>';
    echo '<td>'.form_label("Nombre Clase:",'id_clase').'</td>';
    echo '<td>';
    echo  form_dropdown('id_clase', $CampoOpcionesIdClase, set_value('id_clase',@$datos_maestro[0]->id_clase));
    echo '</td>';
    echo '<td><font color="red">'.form_error('id_clase').'</font></td>';
    echo '</tr>';
	
	$Fecha_registro = array(
	'name'        => 'fecha_registro',
	'id'          => 'fecha_registro',
	'size'        => 8,
	'value'		  => set_value('fecha_registro',@$datos_maestro[0]->fecha_registro),
	'placeholder' => 'Fecha_registro',
	'type'        => 'date',
	);
	echo '<tr>';
	echo '<td>'.form_label("Fecha Registro:",'fecha_registro').'</td>';
	echo '<td>';
	echo form_input($Fecha_registro);
	echo '</td>';
	echo '<td><font color="red">'.form_error('fecha_registro').'</font></td>';
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