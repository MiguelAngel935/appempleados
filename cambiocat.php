<?php
include("session.php");
include "errores.php";
set_error_handler("errores");
$empnum = $_POST['emp'];
$cat = $_POST['cat'];

$update="update titles set to_date = '".date('Y-m-d')."' where emp_no=".$empnum." and to_date='9999-01-01';";
$insert="insert into titles(emp_no, title, from_date, to_date) values (".$empnum.", '".$cat."', '".date('Y-m-d')."', '9999-01-01');";

$resultado_upd = mysqli_query($db, $update);
$resultado_in = mysqli_query($db, $insert);

if ($resultado_upd && $resultado_in){
			echo "El empleado ".$empnum." se ha cambiado de categoria correctamente";
			mysqli_commit($db);
		} else {
			echo "Error al hacer el cambio de categoria: " . mysqli_error($db);
		}
	echo "<br><br><br><a href='welcome.php'>Volver</a>";
?>