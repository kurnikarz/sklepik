<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>Sklep spożywczy</title>
<?php
require_once 'connect.php';
$polaczenie = new mysqli($host,$user,$pass,$dbname);
function pokazMenu() {
    global $polaczenie;
    $zapytanie = "SELECT * FROM kategorie";
    $result = $polaczenie->query($zapytanie);
    echo '<ul style="list-style-type: none;">';
        echo '<li class="col-lg-2"><a href="index.php">Strona główna</a></li>';
        while($row = $result->fetch_array()) {
        $nazwa = $row['nazwa'];
        $id = $row['id'];
        echo "<li class='col-lg-2'><a href='index.php?katId=$id'>$nazwa</a></li>";
        }
        echo '</ul>';
    }
?>

<?php pokazMenu() ?>
