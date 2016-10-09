<?php
include_once "conexio.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));
  
  $email = $data->email;
  $password = $data->password;
  $nombre = $data->nombre;
  $dni = $data->dni;
  $telefono = $data->telefono;
  $ong = $data->ong;

  
  $sql = "INSERT INTO Users (nombre, contrasena, isONG, dni, telefono, user) VALUES('$nombre','$password','$ong','$dni','$telefono','$email')";
  
  
  if(mysqli_query($connection, $sql)){
    $key['estado'] = 'Correcto';
    $key['mensaje'] = 'Usuario insertado correctamente';
    print json_encode($key);
    
  }else{ echo "Error al insertar usuario";}

}

?>
