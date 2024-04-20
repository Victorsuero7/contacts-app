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


<?php require "partials/headers.php" ?>


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
 <?php require_once "partials/footer.php" ?>
