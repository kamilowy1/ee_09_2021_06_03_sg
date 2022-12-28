<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Video on Demand</title>
    <link rel="stylesheet" type="text/css" href="styl3.css"/>
</head>
<body>
    <div id="baner1">
     <h1>Internetowa wypożyczalnia filmów</h1>
    </div>

       <div id="baner2">
       <table>
        <tr>
            <td>Kryminał</td>
            <td>Horror</td>
            <td>Przygodowy</td>
        </tr>
        <tr>
            <td>20</td>
            <td>30</td>
            <td>20</td>
        </tr>
       </table>
       </div>

          <div id="polecamy">
          <h3>Polecamy</h3>
<?php
//utworzenie zmiennych polaczeniowych
$server = "localhost";
$user = "root";
$passwd = "";
$dbname = "dane3";

$conn = mysqli_connect($server,$user,$passwd,$dbname);

//sprawdzenie polaczenia 
/*
if (!$conn){
  die ("fatal error".mysqli_error($conn));
} echo "jest okej";
*/

$sql = "SELECT `id`,`nazwa`, `opis`, `zdjecie` FROM `produkty` WHERE `id` IN (18,22,23,25)";

$zapytanie = mysqli_query($conn,$sql);

while ($wynik = mysqli_fetch_row($zapytanie)){
  echo "<div class='blok1'>";
  echo "<h4> $wynik[0] $wynik[1] </h4>";
  echo "<img src='$wynik[3]' alt='film'/>";
  echo "<p> $wynik[2] </p>";
  echo "</div>";
}

?>

          </div>

            <div id="filmy">
             <h3>Filmy fantastyczne</h3>
<?php

$sql2 = "SELECT `id`, `nazwa`, `opis`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id`='12'";

$zapytanie2 = mysqli_query($conn,$sql2);

while ($wynik2 = mysqli_fetch_row($zapytanie2)){
  echo "<div class='blok2'>";
  echo "<h4> $wynik2[0] $wynik2[1] </h4>";
  echo "<img src='$wynik2[3]' alt='film'/>";
  echo "<p> $wynik2[2] </p>";
  echo "</div>";
}


?>
            </div>
             
              <div id="stopka">
              <form method="post">
                <label> Usuń film nr.</label>
                <input type="number" id="numer" name="numer"/>
                <input type="submit" value="Usuń film"/> <br />
                Stronę wykonał:<a href="ja@poczta.com">000000000</a>
              </form>
<?php

if (isset ($_POST['numer'])){
  $numer = $_POST['numer'];
  $zapytanie3 = "DELETE FROM `produkty` WHERE `id`=$numer";
  $sql = mysqli_query($conn,$zapytanie3);
}

mysqli_close($conn);

?>
              </div>
</body>
</html>