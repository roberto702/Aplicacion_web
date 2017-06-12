<script type="text/javascript">
           
            $(document).ready(function() {
                $('#maestro').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">Listado de Maestros</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">Maestro  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">Maestro  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">Maestro  se Actualizo Correctamente</div>';
}
?>
<center>
<table id="maestro" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>RUT</th>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>NOMBRE DE LA CLASE</th>
<th>FECHA REGISTRO</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($maestro)){
 	foreach($maestro as $maestro_1){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/maestro/editar/<?php echo $maestro_1->rut_maestro;?>/" class="btn btn-success">Editar</a>
		<a href="<?php echo base_url();?>index.php/maestro/eliminar/<?php echo $maestro_1->rut_maestro ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
		echo '<td>'.$maestro_1->rut_maestro.'</td>';
		echo '<td>'.$maestro_1->nombre_maestro.'</td>';
		echo '<td>'.$maestro_1->apellidos_maestro.'</td>';
		echo '<td>'.$maestro_1->id_clase.'</td>';
		echo '<td>'.$maestro_1->fecha_registro.'</td>';
		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>