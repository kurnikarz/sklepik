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
            $id = $row['id'];

            //zdjecie
            $index = $row['index'];
            $images = pobierzZdjecia($index);
            if(!empty($images)) {
                $image = $images[0];
            }
            else {
                $image ='img/no-photo.jpg';
            }
            echo "<img class='img-fluid' src='img/thumbs/$image'>";

            //nazwa
            echo "<a href=produkt.php?produkt_id=$id>";
            echo '<h2 class="h1">'.$row['nazwa'].'</h2>';
            echo "</a>";
            //cena
            echo '<h4>'.$row['cena'].' zł</h4>';
            echo '</div>';
        }

    }

    if (isset($_GET['katId']))
        $kategoriaId = $_GET['katId'];
    else
        $_GET['katId'] = null;



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