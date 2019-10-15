<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<title>Sklep spożywczy</title>

<?php
    require_once 'connect.php';
    require_once 'funkcje.php';
    $polaczenie = new mysqli($host,$user,$pass,$dbname);

    pokazMenu()
?>
