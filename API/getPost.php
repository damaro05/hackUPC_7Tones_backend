<?php
    include_once "conexio.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
          $data = json_decode(file_get_contents("php://input"));
          $userName = $data->name;
          $sql;
          if( isset($data->ong)){
            $sql = "SELECT * FROM Post";           
          }
          
          if( isset($data->particular)){
            $sql = "SELECT * FROM Post WHERE usuario = '$userName' ";           
          }

          $result = mysqli_query($connection, $sql);    
          $key;
          $i = 0;
           
          if( $result ){       
            while($rs = mysqli_fetch_assoc($result)){
              $key[$i]['titulo'] = $rs['titulo'];
              $key[$i]['usuario'] = $rs['usuario'];
              $key[$i]['cantidad'] = $rs['cantidad'];
              $key[$i]['unidad'] = $rs['unidad'];
              $key[$i]['ubicacion'] = $rs['ubicacion'];
              $i++;
            }
          }else{
            $key['estado'] = 'Error';
            $key['mensaje'] = 'No se han podido cargar los datos';
          }
          print json_encode($key);
    }
?>
