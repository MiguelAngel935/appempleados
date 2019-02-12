<?php
include("session.php");
include "errores.php";
set_error_handler("errores");
$empnum = $_POST['emp'];
$sal = $_POST['sal'];

$update="update salaries set to_date = '".date('Y-m-d')."' where emp_no=".$empnum." and to_date='9999-01-01';";
$insert="insert into salaries(emp_no, salary, from_date, to_date) values (".$empnum.", ".$sal.", '".date('Y-m-d')."', '9999-01-01');";

$resultado_upd = mysqli_query($db, $update);
$resultado_in = mysqli_query($db, $insert);

if ($resultado_upd && $resultado_in){
			echo "Al empleado ".$empnum." se le ha cambiado el salario correctamente";
			mysqli_commit($db);
		} else {
			echo "Error al hacer el cambio de salario: " . mysqli_error($db);
		}
	echo "<br><br><br><a href='welcome.php'>Volver</a>";
?>