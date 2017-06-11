
<script type="text/javascript">
           
            $(document).ready(function() {
                $('#datos_alumnos').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">Listado de Alumnos</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">Alumno(a) se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">Alumno(a) se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">Alumno(a) se Actualizo Correctamente</div>';
}
?>
<center>
<table id="alumnos" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>RUT</th>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>DOMICILIO</th>
<th>TELEFONO</th>
<th>CELULAR</th>

</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($alumnos)){
 	foreach($alumnos as $alumnos_1){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/alumnos/editar/<?php echo $alumnos_1->rut;?>/" class="btn btn-success">Editar</a>
		<a href="<?php echo base_url();?>index.php/alumnos/eliminar/<?php echo $alumnos_1->rut;?>/" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
		echo '<td>'.$alumnos_1->rut.'</td>';
		echo '<td>'.$alumnos_1->nombre.'</td>';
		echo '<td>'.$alumnos_1->apellidos.'</td>';
		echo '<td>'.$alumnos_1->domicilio.'</td>';
		echo '<td>'.$alumnos_1->telefono_fijo.'</td>';
		echo '<td>'.$alumnos_1->n_celular.'</td>';
		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>


