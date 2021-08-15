<?php
$username = $_POST['Username'];
$passwor = $_POST['password'];
$gmail = $_POST['gmail'];
$gender = $_POST['gender'];
$phonecode = $_POST['phonecode'];
$phone = $_POST['phone'];

if(!empty($username) || !empty($password) || !empty($gmail) || !empty($gender) || !empty($phonecode) || !empty($phone)) 
{
      $host = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "test";
      //connect with database code here
      $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
      if(mysqli_connect_error())
      {
            die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
      } else{
            $SELECT = "SELECT gmail from register where gmail=? limit 1";
            $INSERT = "INSERT into register(username,password, gmail, gender, phonecode, phone) Values(?, ?, ?, ?, ?, ?)";
            
            $stmt= $conn->prepare ($SELECT); 
            $stmt->bind_param("s", $gmail);
            $stmt->execute();
            $stmt->bind_result($gmail);
            $stmt->store_result();
            $rnum= $stmt->num_rows;

            if ($rnum==0) {
                  $stmt->close();
                  $stmt = $conn->prepare($INSERT);
                  $stmt -> bind_param("ssssii", $username, $password, $gmail, $gender, $phoneCode, $phone);
                  $stmt->execute();
                  echo "You are registered successfully";
            } else{
                  echo "This gmail registered already";
            }
            $stmt->close();
            $conn->close();
      }

}
else {
      echo "Fill all the fields properly";
      die();
}

?>