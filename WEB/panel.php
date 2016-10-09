<!DOCTYPE html>
<html >
	<head>
		<title>7tones - Panell de publicacions</title>
		<link rel="stylesheet" href="css/style2.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="../API/functions.js"></script>
	</head>
	<body>
		<div id="header">
		        <div><a class="logo">7tones</a></div>
		        <div class="signout"><a id="linkLogout" href="#">Tancar sessió</a></div> 
                
          
            <?php
            session_start();
            include_once "../API/conexio.php";
            echo "<div class='welcome'><a>Benvingut, ".$_SESSION['userSession']."!</a></div>";
            
                  
    echo "</div>";
    
    
      $sql = "SELECT * FROM Post ORDER BY caducidad ASC;";
	    $resultado = mysqli_query($connection,$sql)or die ('Error: query!');
       
       
       while($rs = mysqli_fetch_assoc($resultado)){
         echo "<div id='card'> ";
         echo "<h1 class='title'>".$rs['titulo']."</h1>";
         echo "<img class='img' src='".$rs['imgRuta']."'>";
         
         echo "<a class='area'>Descripció</a>";
         echo "<p class='description'>".$rs['descripcion']."</p>";
         
         echo "<a class='area'>Quantitat</a>";
         echo "<p class='text'>".$rs['cantidad']." ".$rs['unidad']."</p>";
         echo "<a class='area'>Caducitat</a>";
         echo "<p class='text'>".$rs['caducidad']."</p>";
         echo "<a class='area'>Usuari</a>";
         echo "<p class='text'>".$rs['usuario']."</p>";
         echo "<a class='area'>Data publicació</a>";
         echo "<p class='text'>".$rs['fechaPublicacion']."</p>";
  
         echo "<button disabled>Contacta con nosotros</button>";
         echo "</div>";
         }
                
     ?>
       
      
	</body>
</html>
