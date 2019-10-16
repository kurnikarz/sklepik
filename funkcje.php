<?php
    define('SESSION_COOKIE', 'cookiesklep');
    define('SESSION_ID_LENGHT',40);
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

    function pokazMenu() {
        global $polaczenie;
        $zapytanie = "SELECT * FROM kategorie";
        $result = $polaczenie->query($zapytanie);
        echo '<ul style="list-style-type: none;">';
        echo '<li class="col-lg-1"><a href="index.php">Strona główna</a></li>';
        while($row = $result->fetch_array()) {
            $nazwa = $row['nazwa'];
            $id = $row['id'];
            echo "<li class='col-lg-1'><a href='index.php?katId=$id'>$nazwa</a></li>";
        }
        echo '</ul>';
    }
?>