<?php
    require_once ('header.php');

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
            foreach (pobierzZdjecia($row['index']) as $image) {
                echo "<a href='img/$image'>";
                echo "<img class='img-fluid' src='img/thumbs/$image'>";
                echo "</a>";
            }
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

    function pobierzZdjecia($index) {
        $images = array();

        //P01-x
        for ($i=0;$i<10;$i++) {
            $filename = $index."-".$i.".jpg";
            $sciazkaZdjecia = "img/$filename";
            if (file_exists($sciazkaZdjecia))
                $images[] = $filename;
        }
        return $images;
    }

    pokazKategorie($_GET['katId']);
    require_once ('footer.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>

</head>
<body>

</body>
</html>