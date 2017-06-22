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

<div id="container">
	<h2 align="center">Listado Asistencia por Clase</h2>
<CENTER>
	<form name="formulario" method="POST" action="asistencia"> 
		<select name="cursos"> 
			<?php 

				if(!empty($clase))
				{
					foreach($clase as $clase_1)
					{
						echo '<option value="'.$clase_1->id_clase.'">'.$clase_1->nombre_clase.'</option>';
					}	 
				}

			?>
		</select> 
		<input type="submit" name="submit" value="Generar Lista"> 
		<br>
			<?php 
				if(isset($_POST['submit']))
				{
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
					<th>PRESENTE</th>
					<th>AUSENTE</th>
					<th>NOMBRE</th>
					<th>APELLIDOS</th>
					<th>CLASE</th>
					<th>FECHA</th>
					</tr>
				</thead>
				<tbody>
					<form action="asistencia" method="POST">
						<?php 
							if(!empty($clase))
							{
								foreach ($clase as $clase_1) 
								{
									if($clase_1->id_clase == $_POST['cursos'])
									{
										$name = $clase_1->nombre_clase;
									}
								}
							}
	
							$name_estado = "Ausente";
							$check_list = false;
							$name_fechaAsistencia = date("d-m-Y");
								   
																
							if(!empty($alumnos))
							{
								$presente = 1;
								$ausente = 0;
								foreach($alumnos as $alumnos_1)
								{
									if($alumnos_1->id_clase == $_POST['cursos'])
									{
										echo '<tr>';
										echo '<td><input type="checkbox" value="'.$presente.'" name="check_list[]">';
										echo '<input type="hidden" value="'.$alumnos_1->rut.'" name="check_rut[]">';
										echo '<input type="hidden" value="'.$alumnos_1->id_clase.'" name="check_clase[]">';
										echo '<td><input type="checkbox" value="'.$ausente.'" name="check_list[]">';
										echo '<td>'.$alumnos_1->nombre.'</td>';
										echo '<td>'.$alumnos_1->apellidos.'</td>';
										echo '<td>'.$name.'</td>';
										echo '<td>'.$name_fechaAsistencia.'</td>';
										echo '</tr>';
									}
								} 
							}	
						?>
				</tbody>
			</table>
			<button type="submit" class="btn btn-small" name="enviar">Grabar Asistencia</button>
			</form>
			<?php
				echo base_url()."index.php/Asistencia/GuardarAsistencia";
				}
			
			if (isset($_POST['enviar']))
			{
				if (is_array(@$_POST['check_list']))
				{
					$num_check_list = count($_POST['check_list']);
					$current = 0;
					foreach ($_POST['check_list'] as $key => $value)
					{
						$selected = $value;
						$ruts = $_POST['check_rut'][$current];
						$idclase = $_POST['check_clase'][$current];
						$arr[0] = $ruts;
						$arr[1] = $idclase;
						$arr[2] = $selected;
						$arr[3] = date("Y-m-d");
						$arreglo[$current] = $arr;
						$current++;
					}
					$tmp = serialize($arreglo);
					$tmp = urlencode($tmp);
					$url = base_url()."index.php/asistencia/guardarasistencia/".$tmp;
					redirect($url);
				} else {
					
					echo 'Ninguna opción. No se ha podido actualizar la lista de la clase';
					
				}

			}
					
			?>
</CENTER>
</div>