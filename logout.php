<?php
session_name("ID_de_sesion");
session_start();
session_destroy();
header("Location: index.php");
