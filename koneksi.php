<?php
  session_start();

  $dsn = "mysql:host=localhost;dbname=absensi";
  $db_user = "root";
  $db_pass = "kekuatan";

  try{
    $db_con = new PDO($dsn,$db_user,$db_pass);

    $db_con -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo $e -> getMessage();
  }

  include "user.php";
  $user = new user($db_con);
?>
