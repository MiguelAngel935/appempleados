<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
	  <form name='mi_formulario' action='cambiodpto.php' method='post'>
      <h1>Cambiar departamento</h1> 
	  
	Introduce el codigo del empleado: <input type='text' name='emp' value=''><br><br><br>
	Selecciona el departamento<select name="dept">
								<?php
								include("session.php");
								include "errores.php";
								set_error_handler("errores");
								
								$select="select dept_name from departments;";
								$resultado = mysqli_query($db, $select);

								if ($resultado && mysqli_num_rows($resultado) > 0) {
								
									while($fila = mysqli_fetch_assoc($resultado)) {
										echo "<option value='".$fila['dept_name']."'>".$fila['dept_name']."</option>";
									}
									
								}
								?>
							  </select>
			<br/><br/><input type="submit" value="Cambiar">
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
   </body>
   
</html>