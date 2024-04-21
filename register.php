<pre>
<?php

require "database.php";
$error = null;


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])) {
    $error = "Please fill all fields";
  } else {
    $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute([":email" => $_POST["email"]]);

    if ($statement->rowCount() > 0) {
      $error = "This email is alredy exists";
    } else {
      $statement = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
      $statement->execute([":name" => $_POST["name"], ":email" => $_POST["email"], ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT)]);

      $statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
      $statement->execute([":email" => $_POST["email"]]);
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      // session_name("ID_de_sesion");
      // setcookie("cookie_de_prueba", "su valor");
      session_name("ID_de_sesion");
      session_start();
      unset($user["password"]);
      $_SESSION["user"] = $user;
      print_r($_SESSION);

      header("Location: home.php");
    }
  }
}

?>
</pre>



<?php require_once "partials/headers.php" ?>


<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
          <?php if ($error != null) : ?>
            <p class="text-danger">
              <?= $error ?>
            </p>
          <?php endif ?>
          <form method="POST" action="register.php">
            <div class="mb-3 row">
              <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

              <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" />
              </div>
            </div>

            <div class="mb-3 row">
              <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" />
              </div>
            </div>

            <div class="mb-3 row">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once "partials/footer.php" ?>
