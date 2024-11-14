<?php
function connectdb(){
$servername = "localhost";
$username = "Khoa";
$password = "123456";

try {
  $conn = new PDO("mysql:host=$servername;dbname=saigon_mobile", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  //echo "Connection failed: " . $e->getMessage();
  
}
return $conn;
}
