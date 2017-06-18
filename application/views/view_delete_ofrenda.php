<?php

$input_con_id = array(
              'id_registro'        => $datos_ofrendas[0]->id_registro,
            );

?><div id="container">
	<?php
	echo form_open();
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>Eliminar Ofrenda del ".$datos_ofrendas[0]->fecha_ofrenda."</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3><center>';
	  echo '<table width="600">';
	  echo '<tr>';
	  echo '<td>';
	  echo '<div class="alert alert-warning text-center">Esta Seguro de Eliminar el Registro</div>';
	  echo form_hidden($input_con_id);
	  echo '<center>';
	  echo form_submit('btn_guardar','No','class="btn btn-default"');
	  echo form_submit('btn_guardar','Si','class="btn btn-danger"');
	  echo '</center>';
	  echo '</td>';
	  echo '</tr>';
	  echo '</table>';
	  echo '</center></td></tr>';
      echo '</table>';
      echo '</center>';
	  echo form_close();
	?>
	</div>
