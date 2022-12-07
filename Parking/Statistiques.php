<?php echo file_get_contents("html/header.html"); ?>
<h1>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
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
  <P>Veuillez entrer une heure pour obtenir le résultat suivant : </P>
  <P>
    - Moyenne du nombre de places disponibles par parking
  </P>
  <br>
  <input type="time" name="datetime" min="00:00" max="23:59">
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
    Moyenne du nombre de places disponibles par parking à un moment donné
  </h2>
  <?php
  $stat1 = "SELECT NOM_PARKING, AVG(PLACE_DISPO) AS AVG_PLACE
  from(select NOM_PARKING,CONVERT(S.DATE_STATIONNEMENT_E,DATE),CAPACITE - COUNT(*) AS PLACE_DISPO
      from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
          where ( CONCAT(CONVERT(S.DATE_STATIONNEMENT_E,DATE), ' $d') between S.DATE_STATIONNEMENT_E and S.DATE_STATIONNEMENT_S)
          group by NOM_PARKING,CONVERT(S.DATE_STATIONNEMENT_E,DATE)) AS T
  group by NOM_PARKING;";
  $resultStat1 = $conn->query($stat1);

  if ($resultStat1->num_rows > 0) {
  ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <th style="width: 50%; text-align: center;">Nom Parking</th>
        <th style="width: 50%; text-align: center;">Moyenne des place disponible</th>
      </tr>
    </table>
    <?php
    while ($row = $resultStat1->fetch_assoc()) {
    ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <td style="width: 50%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
          <td style="width: 50%; text-align: center;"><?php echo $row["AVG_PLACE"];  ?></td>
        </tr>
      </table>
<?php
    }
  }
}

?>



<?php
$immatriculation = "SELECT NUMERO_IMMATRICULATION FROM VEHICULE";
$resultImmatriculation = $conn->query($immatriculation);

if ($resultImmatriculation->num_rows > 0) {
?>

  <form method="POST">
    <P>Veuillez entrer un numéro d'immatriculation pour obtenir les résultats suivant : </P>
    <P>
      - Le cout moyen du stationnement d'un véhicule <br>
      - La durée moyenne de stationnement d'un véhicule par parking
    </P>
    <input type="text" id="immatriculation" name="immatriculation" list="immatriculation-list">

    <datalist id="immatriculation-list">
      <?php
      while ($row = $resultImmatriculation->fetch_assoc()) {
      ?>
        <option><?php echo $row["NUMERO_IMMATRICULATION"]; ?></option>
      <?php
      }
      ?>
    </datalist>
    <input type="submit" value="submit" name="submit1">
  </form>

<?php

}
if (array_key_exists('submit1', $_POST)) {
  $imm = $_POST["immatriculation"];
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
    group by NUMERO_IMMATRICULATION
    having NUMERO_IMMATRICULATION = '$imm';";

  $resultStat3 = $conn->query($stat3);

  if ($resultStat3->num_rows > 0) {
  ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <th style="width: 50%; text-align: center;">Numéro d'immatriculation</th>
        <th style="width: 50%; text-align: center;">Cout moyen</th>
      </tr>
    </table>
    <?php
    while ($row = $resultStat3->fetch_assoc()) {
    ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <td style="width: 50%; text-align: center;"><?php echo $row["NUMERO_IMMATRICULATION"];  ?></td>
          <td style="width: 50%; text-align: center;"><?php echo $row["COUT_AVG"];  ?></td>
        </tr>
      </table>
  <?php
    }
  } else {
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
  group by NUMERO_IMMATRICULATION, NOM_PARKING
  having NUMERO_IMMATRICULATION = '$imm';";
  $resultStat2 = $conn->query($stat2);

  if ($resultStat2->num_rows > 0) {
  ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <th style="width: 25%; text-align: center;">Numéro d'immatriculation</th>
        <th style="width: 50%; text-align: center;">Nom Parking</th>
        <th style="width: 25%; text-align: center;">Durée moyenne</th>
      </tr>
    </table>
    <?php
    while ($row = $resultStat2->fetch_assoc()) {
    ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <td style="width: 25%; text-align: center;"><?php echo $row["NUMERO_IMMATRICULATION"];  ?></td>
          <td style="width: 50%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
          <td style="width: 25%; text-align: center;"><?php echo $row["DUREE_AVG"];  ?></td>
        </tr>
      </table>
<?php
    }
  } else {
    echo "Error in stat2";
  }
}

?>

<h2>
  Les 5 parkings les moins utilisés
</h2>

<?php
$stat4 = "SELECT S.ID_PARKING, NOM_PARKING, COUNT(*) as NOMBRE
  from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
  group by S.ID_PARKING, NOM_PARKING
  order by COUNT(*) asc
  limit 5;";
$resultStat4 = $conn->query($stat4);

if ($resultStat4->num_rows > 0) {
?>
  <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
    <tr>
      <th style="width: 25%; text-align: center;">ID Parking</th>
      <th style="width: 50%; text-align: center;">Nom Parking</th>
      <th style="width: 25%; text-align: center;">Nombre de stationnement</th>
    </tr>
  </table>
  <?php
  while ($row = $resultStat4->fetch_assoc()) {
  ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <td style="width: 25%; text-align: center;"><?php echo $row["ID_PARKING"];  ?></td>
        <td style="width: 50%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
        <td style="width: 25%; text-align: center;"><?php echo $row["NOMBRE"];  ?></td>
      </tr>
    </table>
<?php
  }
} else {
  echo "stat4";
}

?>

<h2>
  Classement des communes les plus demandés par semaine
</h2>

<?php

$stat6 = "SELECT C.CODE_POSTALE, COUNT(*) as NBR_STAT
from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING inner join COMMUNE C on C.CODE_POSTALE = P.CODE_POSTALE
where S.DATE_STATIONNEMENT_E between '2022-11-23 16:14:0' and '2022-11-30 16:14:0'
group by C.CODE_POSTALE
order by COUNT(*) desc;";
$resultStat6 = $conn->query($stat6);

if ($resultStat6->num_rows > 0) {
?>
  <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
    <tr>
      <th style="width: 50%; text-align: center;">Code postal</th>
      <th style="width: 50%; text-align: center;">Nombre de stationnement</th>
    </tr>
  </table>
  <?php
  while ($row = $resultStat6->fetch_assoc()) {
  ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <td style="width: 50%; text-align: center;"><?php echo $row["CODE_POSTALE"];  ?></td>
        <td style="width: 50%; text-align: center;"><?php echo $row["NBR_STAT"];  ?></td>
      </tr>
    </table>
<?php
  }
}

?>
<h2>Classement des parking les plus rentables par commune</h2>
<?php

$sql = "SELECT * FROM COMMUNE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $i = 1;
  while ($row = $result->fetch_assoc()) {
?>

    <div style="border: 1px solid rgb(200, 200, 200); width: 14vw; text-align: center; cursor: pointer;"><?php echo $i . "- " . $row["NOM_DE_COMMUNE"] ?></div>
    <?php
    $i = $i + 1;
    $commune = $row["NOM_DE_COMMUNE"];
    $stat5 = "SELECT NOM_PARKING, NOM_DE_COMMUNE, SUM(COUT_STAT) AS cout_stationnement
      from (select NUMERO_IMMATRICULATION,NOM_PARKING, NOM_DE_COMMUNE, SUM(P.TARIF * TIMESTAMPDIFF(HOUR,S.DATE_STATIONNEMENT_E,S.DATE_STATIONNEMENT_S)) AS COUT_STAT
              from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING inner join COMMUNE C on C.CODE_POSTALE = P.CODE_POSTALE
              group by NUMERO_IMMATRICULATION,NOM_PARKING
              ) AS T
      group by NOM_PARKING, NOM_DE_COMMUNE
      having NOM_DE_COMMUNE = '$commune'
      order by SUM(COUT_STAT) desc;";
    $resultStat5 = $conn->query($stat5);

    if ($resultStat5->num_rows > 0) {
    ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <th style="width: 50%; text-align: center;">Nom parking</th>
          <th style="width: 50%; text-align: center;">Cout de stationnement</th>
        </tr>
      </table>
      <?php
      while ($row = $resultStat5->fetch_assoc()) {
      ?>
        <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
          <tr>
            <td style="width: 50%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
            <td style="width: 50%; text-align: center;"><?php echo $row["cout_stationnement"];  ?></td>
          </tr>
        </table>
<?php
      }
    }
  }
}

?>





<?php echo file_get_contents("html/footer.html"); ?>