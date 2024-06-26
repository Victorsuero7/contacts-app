<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./static/css/index.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/darkly/bootstrap.min.css" integrity="sha512-HDszXqSUU0om4Yj5dZOUNmtwXGWDa5ppESlX98yzbBS+z+3HQ8a/7kcdI1dv+jKq+1V5b01eYurE7+yFjw6Rdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  <title>App de contacto</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand font-weight-bold" href="#">
        <img class="mr-2" src="./static/img/logo.png" />
        ContactsApp
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="d-flex justify-content-between w-100">
          <ul class="navbar-nav">
            <?php if (isset($_SESSION["user"])) : ?>
              <li class="nav-item">
                <a class="nav-link" href="./home.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./add.php">Add</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./logout.php">Logout</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link" href="./register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./login.php">Login</a>
              </li>
            <?php endif ?>
          </ul>
          <?php if (isset($_SESSION["user"])) : ?>
            <div class="p-2">
              <?= $_SESSION["user"]["email"] ?>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </nav>
  <main>


    <!-- Content header -->
