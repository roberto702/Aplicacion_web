<script type="text/javascript">
           
            $(document).ready(function() {
                $('#clase').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">Listado de Clases</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">La Clase  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">La Clase  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">La Clase  se Actualizo Correctamente</div>';
}
?>
<center>
<table id="clase" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>NOMBRE CLASE</th>
<th>FECHA CREACIÓN</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($clase)){
 	foreach($clase as $clase_1){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/claseseedd/editar/<?php echo $clase_1->nombre_clase;?>/" class="btn btn-success">Editar</a>
		<a href="<?php echo base_url();?>index.php/claseseedd/eliminar/<?php echo $clase_1->nombre_clase ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
		echo '<td>'.$clase_1->nombre_clase.'</td>';
		echo '<td>'.$clase_1->fecha_clase.'</td>';
		//echo '<td>'.$clase_1->rut_maestro.'</td>';
		//echo '<td>'.$clase_1->rut_alumno.'</td>';
		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>