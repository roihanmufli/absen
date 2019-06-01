<?php
  class user{
    private $db;

    public function __construct($db_con){
      $this -> db = $db_con;
    }

    public function register($nama,$uname,$pass,$email,$telp,$level){
      try {
        $pwd = password_hash($pass,PASSWORD_DEFAULT);

          $stmt = $this -> db -> prepare("insert into users(nama,username,pass,email,telp,level) values(:nama,:username,:pass,:email,:telp,:level)");
          $stmt -> bindParam(":nama",$nama);
          $stmt -> bindParam(":uname",$uname);
          $stmt -> bindParam(":pass",$pwd);
          $stmt -> bindParam(":email",$email);
          $stmt -> bindParam(":telp",$telp);
          $stmt -> bindParam(":level",$level);


          $stmt -> execute();

      } catch (PDOException $e) {
        echo $e -> getMessage();
      }

    }

    public function login($uname,$pass){
      try {
        $stmt = $this -> db -> prepare("select * from users where username=:uname limit 1");
        $stmt -> bindParam(":uname",$uname);

        $stmt -> execute();

        $userRow = $stmt -> fetch(PDO::FETCH_ASSOC);

        if($stmt -> rowCount() > 0){
          if(password_verify($pass,$userRow['pass'])){
            $_SESSION['user_session'] = $userRow['username'];
            return true;
          }
          else {
            return false;
          }
        }
      } catch (PDOException $e) {
        echo $e -> getMessage();
      }
    }

    public function is_loggedin(){
      if(isset($_SESSION['user_session'])) {
        return true;
      }
    }

    public function redirect($url){
      header("Location: $url");
    }

    public function logout(){
      session_destroy();
      unset($_SESSION['user_session']);

    }
  }


?>
