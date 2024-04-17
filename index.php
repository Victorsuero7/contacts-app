<?php
require "database.php";

// $contacts = json_decode(file_get_contents("contacts.json"), $associative = true);
$contacts = $conn->query("SELECT * FROM contacts")->fetchAll();

// este ciclo se usa para mostar los datos extraidos cuando no se usa fetch y entonces es un objeto
// foreach ($contacts as $key) {
//  print_r($contacts);
//  foreach ($contacts as $key) {
//   echo ($key . PHP_EOL);
//  }
// }
// die();

// Para print con fetch all que devuelve un array asociativo
// print_r($contacts)
?>




<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./static/css/index.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css"
    integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

    
  <title>App de contacto</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./static/img/logo.png" />
        ContactsApp
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add.php">Add Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container pt-4 p-3">
      <div class="row">

      <!-- <?php if (isset($_GET["id"])) {echo("Contacto borrado");} ?> -->

        <?php if (count($contacts) == 0): ?>
          <div class="col-mdm4 mx-auto">
            <div class="card card-body text-center">
              <p>No contacts saved yet</p>
              <a href="add.php">Add one</a>
            </div>
          </div>
        <?php endif ?>
        <?php foreach ($contacts as $ct): ?>

          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?= $ct['name']; ?></h3>
                <p class="m-2"><?= $ct['phone_number'] ?></p>
                <a href="edit.php?id=<?= $ct["id"] ?>" class="btn btn-secondary mb-2">Edit Contact</a>
                <a href="delete.php?id=<?= $ct["id"] ?>" class="btn btn-danger mb-2">Delete Contact</a>
              </div>
            </div>
          </div>

        <?php endforeach ?>



      </div>
    </div>
    </div>
    </div>
  </main>
</body>

</html>
