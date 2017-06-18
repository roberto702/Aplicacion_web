<script type="text/javascript">
           
            $(document).ready(function() {
                $('#clase').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<script type="text/javascript">
           
            $(document).ready(function() {
                $('#alumnos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
	</script>

<CENTER>
<form name="formulario" method="POST" action="asistencia"> 
<select name="cursos"> 
 <?php 

 if(!empty($clase)){
 	foreach($clase as $clase_1){
 		echo '<option value="'.$clase_1->id_clase.'">'.$clase_1->nombre_clase.'</option>';
 	} 
 }

 ?>
</select> 
<input type="submit" name="submit" value="Enviar"> 
<br>
<?php 
if(isset($_POST['submit'])){
?>
	
	<script type="text/javascript">
           
            $(document).ready(function() {
                $('#asistencia').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
	</script>
	
	
   	<table id="alumnos" border="0" cellpadding="0" cellspacing="0" class="pretty">
	<thead>
	<tr>
	<th>ESTADO</th>
	<th>NOMBRE</th>
	<th>APELLIDOS</th>
	<th>CLASE</th>
	<th>ESTADO</th>
	<th>FECHA</th>
	</tr>
	</thead>
	<tbody>
	<form action="#" method="POST">
 	<?php 
 	if(!empty($clase)){
 		foreach ($clase as $clase_1) {
 			if($clase_1->id_clase == $_POST['cursos']){
 				$name = $clase_1->nombre_clase;
 			}
 		}
 	}
	
	$name_estado = "Ausente";
	$name_fechaAsistencia = date("d-m-Y");
    
	
 	if(!empty($alumnos)){
 	$contador = 0;
 	foreach($alumnos as $alumnos_1){
 		if($alumnos_1->id_clase == $_POST['cursos']){
 		echo '<input type="hidden" name="rut[]" value="'.$alumnos_1->rut.'">';
 		echo '<input type="hidden" name="id_clase[]" value="'.$alumnos_1->id_clase.'">';
 		echo '<tr>';
		echo '<td><input type="checkbox" name="check_list[]" value="'.$contador.'" >';
		echo '<td>'.$alumnos_1->nombre.'</td>';
		echo '<td>'.$alumnos_1->apellidos.'</td>';
		echo '<td>'.$name.'</td>';
		echo '<td>'.$name_estado.'</td>';
		echo '<td>'.$name_fechaAsistencia.'</td>';
		echo '</tr>';
		$contador++;
	}
 	} 
 }
 ?>
 
</tbody>
</table><?php
}

?>
<input type="submit" class="btn btn-success" name="save" value="Actualizar">

<?php 

if(isset($_POST['save'])){
	echo form_open();
	if (!empty($_POST['check_list'])){
		$j = 0;
		$jmax = count($_POST['check_list']);
		for ($i = 0; $i < count($_POST['rut']); $i++){
			if($i == $_POST['check_list'][$j]){
				echo form_input($_POST['rut'][$i]);#Aqui se debe ejecutar la solicitud para agregar una fila a la tabla de asistencia. el rut esta dado por $_POST['rut'][$i] y 
				echo form_input($_POST['id_clase'][$i]); #el id_clase esta dado por $_POST['id_clase'][$i]. En este caso el alumno asistio
				echo form_input(1);
				if($j < $jmax -1){
					$j++;
				}

			}
			else{
				echo form_input($_POST['rut'][$i]); #Aqui se debe ejecutar la solicitud para agregar una fila a la tabla de asistencia. el rut esta dado por $_POST['rut'][$i] y 
				echo form_input($_POST['id_clase'][$i]); #el id_clase esta dado por $_POST['id_clase'][$i]. En este caso el alumno no asistio
				echo form_input(0);
			}
		}
	}
	else{
		for ($i = 0; $i < count($_POST['rut']); $i++){
			echo form_input($_POST['rut'][$i]); #Aqui se debe ejecutar la solicitud para agregar una fila a la tabla de asistencia. el rut esta dado por $_POST['rut'][$i] y 
			echo form_input($_POST['id_clase'][$i]); #el id_clase esta dado por $_POST['id_clase'][$i]. En este caso el alumno no asistio
			echo form_input(0);
		}
	}
	echo '<br>';
	echo '<input type="submit" class="btn btn-success" value="Guardar">';
	echo form_close();
}
?>
</CENTER>