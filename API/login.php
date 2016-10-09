<?php
    include_once "conexio.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST')   {
            $data = json_decode(file_get_contents("php://input"));
            $userName = $data->name;
            $userPassword = $data->pass;

            $sql = "SELECT * FROM Users WHERE user = '$userName' AND contrasena = '$userPassword'"; 
            $result = mysqli_query($connection, $sql);    
            $row = mysqli_fetch_row($result);
        if ($row){
        	if($row[2])
            	echo "2";
          	else
            	echo "1";

        }else{
            echo "0";
            }
        }
?>
