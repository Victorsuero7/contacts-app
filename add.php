<pre>
<?php

require "database.php";

session_name("ID_de_sesion");
session_start();
print_r($_SESSION["user"]["id"]);
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  return;
}

$error = null;
// $contacto = [
// ];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty($_POST["name"] || empty($_POST["phone_number"]))) {
    $error = "Please fill all the fields";

  } else if (strlen($_POST["phone_number"]) < 9 or strlen($_POST["name"]) < 1) {
    $error = "Wrong phone number. It must be at least 9 characters";
  } else {
    $name = $_POST["name"];
    $phoneNumber = $_POST["phone_number"];
    $statement = $conn->prepare("INSERT INTO contacts (user_id, name, phone_number) VALUES (:user_id, :name, :phone_number)");
    $statement->bindParam(":name", $_POST["name"]);
    $statement->bindParam(":phone_number", $_POST["phone_number"]);
    $statement->bindParam(":user_id", $_SESSION["user"]["id"]);
    $statement->execute();
    header("Location: home.php");
  }
  // if (file_exists("contacts.json")) {
  //   $contacts = json_decode(file_get_contents("contacts.json"), true);
  // } else {
  //   $contacts = [];
  // }
  // $contacts[] = $contacto;
  // file_put_contents("contacts.json", json_encode($contacts));



}

?>
</pre>



<?php require_once "partials/headers.php" ?>


  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Add New Contact</div>
          <div class="card-body">
            <?php if ($error != null): ?>
              <p class="text-danger">
                <?= $error ?>
              </p>
            <?php endif ?>
            <form method="POST" action="add.php">
              <div class="mb-3 row">
                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                <div class="col-md-6">
                  <input id="name" type="text" class="form-control" name="name" autocomplete="name" autofocus />
                </div>
              </div>

              <div class="mb-3 row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                <div class="col-md-6">
                  <input id="phone_number" type="tel" class="form-control" name="phone_number"
                    autocomplete="phone_number" autofocus />
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
