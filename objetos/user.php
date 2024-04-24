<?php

class User
{

  public function __construct(
    private $id,
    private $name,
    private $email,
    private $password,
    private $role,
  ) {

  }

  public function create_user_session()
  {
    $error = null;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (empty($_POST["email"]) && empty($_POST["password"])) {
        $error = "Please fill all fields";
      } else {

        require "database.php";
        $st = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $st->execute([":email" => $_POST["email"]]);
        if ($st->rowCount() == 0){
          $error = "Invalid credentials";
        } else{
          $user = $st->fetch(PDO::FETCH_ASSOC);
          if(!password_verify($_POST["password"], $user["password"])){
            $error = "invalid credentials";
          }else{
            return new self(
              $user["id"],
              $user["name"],
              $user["email"],
              $user["password"],
              $user["role"]
            );
          }
        }

      }
    }
    $validate_login = "";

    return $_SESSION($validate_login);

  }

}
