<?php

session_start();

if ($_SESSION['login'] != 'petugas') {
    header('location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
</head>

<body>
    <?php
    include('navbar.php');
    ?>
    <h3>Dasboard</h3>
</body>

</html>