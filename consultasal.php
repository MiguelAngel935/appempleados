<?php
include("session.php");
include "errores.php";
set_error_handler("errores");

if(!$_SESSION['manager']){
	$select="select employees.first_name,employees.last_name,salaries.salary,salaries.from_date,salaries.to_date from employees,salaries 
			 where employees.emp_no=salaries.emp_no and employees.emp_no=".$_SESSION['user_id']." and salaries.to_date='9999-01-01';";
			 
	$resultado = mysqli_query($db, $select);

	if ($resultado && mysqli_num_rows($resultado) > 0) {

		echo "<table border='2'>";
		echo "<tr>";
			echo "<th>Nombre empleado</th><th>Apellido</th><th>Salario</th><th>Desde</th><th>Hasta</th>";
		echo "<tr>";
		while($fila = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
			   echo "<td>".$fila['first_name']."</td><td>".$fila['last_name']."</td><td>".$fila['salary']."</td><td>".$fila['from_date']."</td><td>".$fila['to_date']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}else{

	/* // Ver cuantos registros hay en la tabla
	 $total = "select count(*) from salaries;";
	 $rtotal = mysqli_query($db, $total);
	 while($fila = mysqli_fetch_assoc($rtotal)) {
				$numr=$fila['count(*)'];
				}
	// Cuántos registros se mostrarán por página
	 $limit = 10;
	// Cuántas páginas habrá en total
	 $pages = ceil($numr / $limit);
	// En qué página estamos
	 $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
			'options' => array(
				'default'   => 1,
				'min_range' => 1,
			),
	 )));
	// Calcular la salida de la select
	 $offset = ($page - 1)  * $limit; 
	// Infomación para mostrar 
	  $start = $offset + 1;
	  $end = min(($offset + $limit), $numr);
	  if(isset($_GET['page'])){
		$mostrar=($_GET['page'] -1)*10;
	  }else{
	  $mostrar=0;
	  }
	// Link para retroceder
	  $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
	// Link para avanzar
	  $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
	// Mostrar la informacion paginada
	   echo '<div id="paging"><p>', $prevlink, ' Pagina ', $page, ' de ', $pages, /*' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

	$select="select employees.first_name,employees.last_name,salaries.salary,salaries.from_date,salaries.to_date from employees,salaries 
			 where employees.emp_no=salaries.emp_no  order by first_name LIMIT ".$mostrar.",".$limit.";"; */
	
	$empleado = $_POST['empleado'];
	
	$select="select employees.first_name,employees.last_name,salaries.salary,salaries.from_date,salaries.to_date from employees,salaries 
			 where employees.emp_no=salaries.emp_no and employees.emp_no=".$empleado.";";

	$resultado = mysqli_query($db, $select);

	if ($resultado && mysqli_num_rows($resultado) > 0) {
		
		echo "<table border='2'>";
		echo "<tr>";
			echo "<th>Nombre empleado</th><th>Apellido</th><th>Salario</th><th>Desde</th><th>Hasta</th>";
		echo "<tr>";
		while($fila = mysqli_fetch_assoc($resultado)) {
			echo "<tr>";
			   echo "<td>".$fila['first_name']."</td><td>".$fila['last_name']."</td><td>".$fila['salary']."</td><td>".$fila['from_date']."</td><td>".$fila['to_date']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
}
echo "<br><br><br><a href='welcome.php'>Volver</a>";
?>