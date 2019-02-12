<?php
 include("config.php");
 
  
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	  
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
	  $manager=false;
	  $select="select title from titles where titles.emp_no=".$row['id']." and to_date='9999-01-01';";
	  $resultado = mysqli_query($db, $select);
		if ($resultado && mysqli_num_rows($resultado) > 0) {
		while($fila = mysqli_fetch_assoc($resultado)) {
			$aux=$fila['title'];
			if($aux=="Manager"){
				$manager=true;	
			}
		}
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         $_SESSION['user_id'] = $row['id'];
		 if(!$manager){
			header("location: welcome.php");
			$_SESSION['manager']= false;
		 }else{
			header("location: welcome.php");
			$_SESSION['manager']= true;
		 }
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
  }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = " " method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>