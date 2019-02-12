<?php
   include('session.php');
   if($_SESSION['manager']){
		
   }
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Bienvenido <?php echo $login_session; ?></h1> 
	  
	  
	  <nav class="dropdownmenu">
  <ul>
<?php
   if($_SESSION['manager']){
?>
	<li><a href="cambiodpto2.php">Modificar departamento</a></li>
	<li><a href="cambiosal2.html">Modificar salario</a></li>
	<li><a href="cambiocat2.php">Modificar categoria</a></li>
    <li><a href="consultadpto.html">Consultar departamento</a></li>
	<li><a href="consultasal.html">Consultar salario</a></li>
	<li><a href="consultacat.html">Consultar categoria</a></li>
  
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
	  
<?php
}else{
?>
	<li><a href="consultadpto.php">Consultar departamento</a></li>
	<li><a href="consultasal.php">Consultar salario</a></li>
	<li><a href="consultacat.php">Consultar categoria</a></li>
 
  </ul>
</nav>
	  
	  
	  
      <h2><a href = "logout.php">Cerrar Sesion</a></h2>
<?php
}
?>  
   </body>
   
</html>