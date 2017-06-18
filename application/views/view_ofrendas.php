<script type="text/javascript">
           
            $(document).ready(function() {
                $('#ofrendas').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">Listado de Ofrendas por Clase</h2>
<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">Registro  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">Registro  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">Registro  se Actualizo Correctamente</div>';
} 
?> 
<center>
<table id="ofrendas" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>NOMBRE CLASE</th>
<th>OFRENDA CLASE</th>
<th>FECHA OFRENDA</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($ofrendas)){
 	foreach($ofrendas as $ofrenda){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/ofrendas/editar/<?php echo $ofrenda->id_registro;?>/" class="btn btn-success">Editar</a>
		<a href="<?php echo base_url();?>index.php/ofrendas/eliminar/<?php echo $ofrenda->id_registro ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
		//echo '<td>'.$ofrenda->id_registro.'</td>';
		switch($ofrenda->id_clase){
			case 1:
					$ofrenda->id_clase = "SAMUEL";
					break;
			case 2:
					$ofrenda->id_clase = "DAVID";
					break;
			case 3:
					$ofrenda->id_clase = "ESTER";
					break;
			case 4:
					$ofrenda->id_clase = "ESTER";
					break;		
			case 5:
					$ofrenda->id_clase = "TIMOTEO";
					break;		
			case 6:
					$ofrenda->id_clase = "GEDEON";
					break;		
			case 7:
					$ofrenda->id_clase = "DANIEL";
					break;		
			case 8:
					$ofrenda->id_clase = "JOSUE";
					break;		
			case 9:
					$ofrenda->id_clase = "CALEB";
					break;		
			case 10:
					$ofrenda->id_clase = "ABRAHAM";
					break;		
			case 11:
					$ofrenda->id_clase = "TITO";
					break;		
						
		}
				
		echo '<td>'.$ofrenda->id_clase.'</td>';
		setlocale(LC_MONETARY, 'en_US.UTF-8');
		echo '<td>'.$ofrenda->ofrenda_clase.'</td>';
		echo '<td>'.$ofrenda->fecha_ofrenda.'</td>';
		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>
