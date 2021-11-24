<?php

require("index_Skowron.php");

$marka = $_POST['marka'];
$model = $_POST['model'];
$kolor = $_POST['kolor'];
$rocznik = $_POST['rocznik'];
$wartosc = $_POST['wartosc'];
$foto = $_POST['foto'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auta</title>
</head>
<body>
    <?php



    $insertSql = "INSERT INTO auta(id, marka, model, kolor, rocznik, wartosc, foto) VALUES ('','$marka','$model','$kolor','$rocznik','$wartosc', '$foto')";
    $insertQuery = mysqli_query($conn, $insertSql);

    if($insertQuery) 
    {
        $sql1 = "SELECT * from auta ORDER BY wartosc";
        $sql2 = "SELECT * from auta ORDER BY rocznik";
        $sql3 = "SELECT * from auta WHERE kolor LIKE 'zielony' ";

       $question1 = mysqli_query($conn, $sql1);
       $question2 = mysqli_query($conn, $sql2);
       $question3 = mysqli_query($conn, $sql3);
        echo "<div class='main'>";
       echo "<table>";
       echo "<h1>Wszystkie auta, posortowane według wartości:</h1>";
       echo "<tr>
                <th>Id</th>
                <th>Marka</th>
                <th>Model</th>
                <th>Kolor</th>
                <th>Rocznik</th>
                <th>Wartosc</th>
                <th>Foto</th>
            </tr>";
            while($row1 = mysqli_fetch_assoc($question1)) {
                echo "<tr><td>".$row1['id']."</td>";
                echo "<td>".$row1['marka']."</td>";
                echo "<td>".$row1['model']."</td>";
                echo "<td>".$row1['kolor']."</td>";
                echo "<td>".$row1['rocznik']."</td>";
                echo "<td>".$row1['wartosc']."</td>";
                echo "<td>".$row1['foto']."</td></tr>";
            }
       echo "</table>";
       echo "<table>";
       echo "<h1>Wszystkie auta posortowane według rocznika:</h1>";
       echo "<tr>
       <th>Id</th>
       <th>Marka</th>
       <th>Model</th>
       <th>Kolor</th>
       <th>Rocznik</th>
       <th>Wartosc</th>
       <th>Foto</th>
   </tr>";
   while($row2 = mysqli_fetch_assoc($question2)) {
    echo "<tr><td>".$row2['id']."</td>";
    echo "<td>".$row2['marka']."</td>";
    echo "<td>".$row2['model']."</td>";
    echo "<td>".$row2['kolor']."</td>";
    echo "<td>".$row2['rocznik']."</td>";
    echo "<td>".$row2['wartosc']."</td>";
    echo "<td>".$row2['foto']."</td></tr>";
   }
echo "</table>";
echo "<table>";
       echo "<h1>Tylko zielone auta:</h1>";
       echo "<tr>
       <th>Id</th>
       <th>Marka</th>
       <th>Model</th>
       <th>Kolor</th>
       <th>Rocznik</th>
       <th>Wartosc</th>
       <th>Foto</th>
   </tr>";
   while($row3 = mysqli_fetch_assoc($question3)) {
    echo "<tr><td>".$row3['id']."</td>";
    echo "<td>".$row3['marka']."</td>";
    echo "<td>".$row3['model']."</td>";
    echo "<td>".$row3['kolor']."</td>";
    echo "<td>".$row3['rocznik']."</td>";
    echo "<td>".$row3['wartosc']."</td>";
    echo "<td>".$row3['foto']."</td></tr>";

}

echo "</table>";
    }
    ?>

</body>
</html>
