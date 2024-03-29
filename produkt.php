<?php
    require_once ('header.php');

    function pokazProdukt($id) {
        global $polaczenie;

        $zapytanie = $polaczenie->query("SELECT * FROM produkty WHERE id=$id");
        while($row = $zapytanie->fetch_array()) {
            echo "<div class=container>";
            echo "<div class=row>";
            echo "<div class=col-lg-12>";
            foreach (pobierzZdjecia($row['index']) as $image) {
                echo "<img class='img-fluid' src='img/$image'>";
            }
            echo '<h2 class="h1">'.$row['nazwa'].'</h2>';
            echo '<h4>'.$row['cena'].' zł</h4>';
            echo '<p>'.$row['opis'].'</p>';
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

    if (isset($_GET['produkt_id']))
        pokazProdukt($_GET['produkt_id']);

    require_once ('footer.php');
?>
