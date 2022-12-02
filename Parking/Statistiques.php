<?php echo file_get_contents("html/header.html"); ?>
<h1>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
This is the Statistiques page
</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mohammed";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>
<form method="POST">
  Please enter a date and time to have the results
  <br>
  <input type="datetime-local" name="datetime" min="2022-11-24T00:00" max="2022-11-30T23:59">
  <br>
  <input type="submit" value="submit" name="submit">
</form>

<?php

function changeDate($date)
{
  $date = str_replace('T', ' ', $date);
  $date = "$date" . ":00";
  return $date;
}

if (array_key_exists('submit', $_POST)) {
  $d = changeDate($_POST['datetime']);
  ?>
  <h2>
    Moyenne du nombre de places disponibles par parking
  </h2>
  <?php

  
  ?>

  <h2>
    Le cout moyen du stationnement d'un véhicule
  </h2>

  <?php
    $stat3 = "SELECT NUMERO_IMMATRICULATION, AVG(COUT_STAT) AS COUT_AVG
    from (select NUMERO_IMMATRICULATION,NOM_PARKING, SUM(P.TARIF * TIMESTAMPDIFF(HOUR,S.DATE_STATIONNEMENT_E,S.DATE_STATIONNEMENT_S)) AS COUT_STAT 
            from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
            group by NUMERO_IMMATRICULATION,NOM_PARKING
            ) AS T
    group by NUMERO_IMMATRICULATION;";

    $resultStat3 = $conn->query($stat3);

    if($resultStat3->num_rows > 0){
      ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left;">
        <tr>
          <th style="width: 50%; text-align: center;">Numéro d'immatriculation</th>
          <th style="width: 50%; text-align: center;">Cout moyen</th>
        </tr>
      </table>
      <?php
      while ($row = $resultStat3->fetch_assoc()){
        ?>
        <table style="width: 80vw; margin-left: 7vh; text-align: left;">
          <tr>
            <td style="width: 50%; text-align: center;"><?php echo $row["NUMERO_IMMATRICULATION"];  ?></td>
            <td style="width: 50%; text-align: center;"><?php echo $row["COUT_AVG"];  ?></td>
          </tr>
        </table>
        <?php
      }
    }else{
      echo "0 results stat3";
    }


  ?>


  <h2>
    La durée moyenne de stationnement d'un véhicule par parking
  </h2>
  <?php

  $stat2 = "SELECT NUMERO_IMMATRICULATION, NOM_PARKING, AVG(DUREE_STAT) as DUREE_AVG
  from(select NUMERO_IMMATRICULATION, NOM_PARKING,TIMESTAMPDIFF(HOUR,S.DATE_STATIONNEMENT_E,S.DATE_STATIONNEMENT_S) AS DUREE_STAT
  from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING) AS T
  group by NUMERO_IMMATRICULATION, NOM_PARKING;";
  $resultStat2 = $conn->query($stat2);

  if($resultStat2->num_rows > 0){
    ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left;">
      <tr>
        <th style="width: 25%; text-align: center;">Numéro d'immatriculation</th>
        <th style="width: 50%; text-align: center;">Nom Parking</th>
        <th style="width: 25%; text-align: center;">Durée moyenne</th>
      </tr>
    </table>
    <?php
    while ($row = $resultStat2->fetch_assoc()){
      ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left;">
        <tr>
          <td style="width: 25%; text-align: center;"><?php echo $row["NUMERO_IMMATRICULATION"];  ?></td>
          <td style="width: 50%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
          <td style="width: 25%; text-align: center;"><?php echo $row["DUREE_AVG"];  ?></td>
        </tr>
    </table>
      <?php
    }
  }else{
    echo "Error in stat2";
  }

}

?>

<?php echo file_get_contents("html/footer.html"); ?>