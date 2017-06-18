<?php
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>.: Ingresar Ofrenda :.</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	  #dibujamos campos texto
      $CampoOpcionesClases = array (
		'0'	      => 'Seleccione Clase',
		'1'       => 'SAMUEL',
		'2'       => 'DAVID',
		'3'       => 'ESTER',
		'4'       => 'JOEL',
		'5'       => 'TIMOTEO',
		'6'       => 'GEDEÓN',
		'7'       => 'DANIEL',
		'8'       => 'JOSUÉ',
		'9'       => 'CALEB',
		'10'      => 'ABRAHAM',
		'11'      => 'TITO',
		);  
	echo '<tr>';
    echo '<td>'.form_label("Nombre de la Clase:",'nombre_clase').'</td>';
    echo '<td>';
    echo  form_dropdown('id_clase', $CampoOpcionesClases, set_value('id_clase',@$datos_ofrendas[0]->id_clase));
	
    echo '</td>';
    echo '<td><font color="red">'.form_error('id_clase').'</font></td>';
    echo '</tr>'; 	
	
	$Ofrenda_clase 	  = array(
	'name'        => 'ofrenda_clase',
	'id'          => 'ofrenda_clase',
	'size'        => 6,
	'value'		  => set_value('ofrenda_clase',@$datos_ofrendas[0]->ofrenda_clase),
	'placeholder' => 'Ofrenda recibida',
	'type'        => 'number_format',
	);
	echo '<tr>';
	echo '<td>'.form_label("Ofrenda recibida:",'ofrenda_clase').'</td>';
	echo '<td>';
	echo form_input($Ofrenda_clase);
	echo '</td>';
	echo '<td><font color="red">'.form_error('ofrenda_clase').'</font></td>';
	echo '</tr>';
	
	
	$Fecha_ofrenda = array(
	'name'        => 'fecha_ofrenda',
	'id'          => 'fecha_ofrenda',
	'size'        => 8,
	'value'		  => set_value('fecha_ofrenda',@$datos_ofrendas[0]->fecha_ofrenda),
	'placeholder' => 'Fecha Ofrenda',
	'type'        => 'date',
	);
	echo '<tr>';
	echo '<td>'.form_label("Fecha Clase:",'fecha_ofrenda').'</td>';
	echo '<td>';
	echo form_input($Fecha_ofrenda);
	echo '</td>';
	echo '<td><font color="red">'.form_error('fecha_ofrenda').'</font></td>';
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