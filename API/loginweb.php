<?php
    session_start();
    include_once "conexio.php";
   
	    $userName = $_POST['name'];
	    $userPassword = $_POST['pass'];

	    $sql = "SELECT * FROM Users WHERE user = '$userName' AND contrasena = '$userPassword'"; 
	    $result = mysqli_query($connection, $sql);    
    	if (mysqli_fetch_row($result)){
     	 echo "OK";
       if(!isset($_SESSION['userSession'])){
			    $_SESSION['userSession']= $userName;
		    }
          header ("Location: ../WEB/panel.php");
	    }else{
	      echo "FAIL";
	    }

?>
