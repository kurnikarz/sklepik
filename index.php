<?php
    require_once 'connect.php';
    $polaczenie = new mysqli($host,$user,$pass,$dbname);

    function pokazMenu() {
        global $polaczenie;
        $zapytanie = "SELECT * FROM kategorie";
        $result = $polaczenie->query($zapytanie);
        echo '<ul style="list-style-type: none;">';
        while($row = $result->fetch_array()) {
            $nazwa = $row['nazwa'];
            $id = $row['id'];
            echo "<li class='col-lg-2'><a href='index.php?katId=$id'>$nazwa</a></li>";
        }
        echo '</ul>';
    }

    function pokazKategorie($kategoriaId=null) {
        global $polaczenie;
        if ($kategoriaId) {
            $zapytanie = $polaczenie->query('SELECT * FROM produkty WHERE kategoriaId='.$kategoriaId);
        }
        else {
            $zapytanie = $polaczenie->query('SELECT * FROM produkty');
        }
        echo '<div class="container">';
        echo '<div class="row">';
        while($row = $zapytanie->fetch_array()) {
            echo '<div class="col-lg-4">';
            echo '<h2 class="h1">'.$row['nazwa'].'</strong></h2>';
            echo '<h4>'.$row['cena'].' zł</h4>';
            echo '<p>'.$row['opis'].'</p>';
            echo '</div>';
        }

    }
    if (isset($_GET['katId']))
        $kategoriaId = $_GET['katId'];
    else
        $_GET['katId'] = null;
    pokazMenu();
    pokazKategorie($_GET['katId']);

    echo '</div>';
    echo '</div>';
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Sklep spożywczy</title>
</head>
<body>

    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>