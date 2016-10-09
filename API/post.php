<?php
require_once "Twilio/autoload.php";
      use Twilio\Rest\Client;
include_once "conexio.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $data = json_decode(file_get_contents("php://input"));
  
  $titulo = $data->titulo;
  $usuario = $data->usuario;
  $cantidad = $data->cantidad;
  $unidad = $data->unidad;
  $ubicacion = $data->ubicacion;
  $caducidad = $data->caducidad;
  $fechaP = $data->fechapublicacion;
  $imgRuta = $data->img;
  $descripcion = $data->descripcion;
  $status = $data->status;
  
  $sql = "INSERT INTO Post (titulo, usuario, cantidad, unidad, ubicacion, caducidad, fechaPublicacion, imgRuta, descripcion, status) VALUES('$titulo','$usuario','$cantidad','$unidad','$ubicacion','$caducidad','$fechaP','$imgRuta','$descripcion','$status')";
  
  
  if(mysqli_query($connection, $sql)){
      echo "Insertado correctamente";
      
      $sid = "AC9ec382839065e0162ec0db33f12c3d97"; 
      $token = "5d42b327ee95fcbd34d9dc189a15afdd"; 

      $client = new Client($sid, $token);
      $targets = array("+34634558589","+34695172236");
      
      
    
      foreach ($targets as &$valor) {  
        $client->account->messages->create(
        $valor,
        array('from' => "+34931070623",'body' => "7tones: Nou anunci publicat prop teu - ".$titulo." de ".$usuario."!" ));
      }

  }else{ echo "Error al insertar un post";}

}

?>
