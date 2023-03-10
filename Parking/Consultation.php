<?php echo file_get_contents("html/header.html"); ?>
<h1>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  Consultation :
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
  <P>Veuillez entrer une date et une heure pour obtenir les résultats suivant : </P>
  <P>
    - Liste des places disponibles <br>
    - La liste des parkings saturés à un moment donné (pour avoir un résultat non nul il faut choisir le 25 nov 2022 22h00)<br>
    - Liste de voitures qui se sont garées dans deux parkings différents au cours d'une journée
  </P>
  <br>
  <input type="datetime-local" name="datetime" min="2022-11-23T00:00" max="2022-11-30T23:59">
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
    Liste des places disponibles
  </h2>
  <?php
  $sql = "SELECT * FROM COMMUNE";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $i = 1;
    // output data of each row
  ?>
    <div class="city-wrapper" style="height: auto; width: 8vw; display: grid; grid-template-columns: auto; column-gap: 1vh;">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>

        <div class='city'>
          <div class="city-button" style="border: 1px solid rgb(200, 200, 200); width: 14vw; text-align: center; background-color: grey; cursor: pointer;"><?php echo $i . "- " . $row["NOM_DE_COMMUNE"] ?></div>
          <?php
          $i = $i + 1;
          $commune = $row["NOM_DE_COMMUNE"];
          $resultParking = $conn->query("SELECT ID_PARKING, NOM_PARKING, CAPACITE, ADRESSE_PARKING, TARIF 
        FROM PARKING P INNER JOIN COMMUNE C 
        ON P.CODE_POSTALE = C.CODE_POSTALE 
        WHERE NOM_DE_COMMUNE = '" . $commune . "';");

          if ($resultParking->num_rows > 0) {
          ?>
            <div class="parking-wrapper" style=" height: auto; width: 80vw; display: grid; grid-template-columns: auto; column-gap: 1vh;">
              <table class="parking" style="width: 80vw; margin-left: 7vh; text-align: left; display: none;">
                <tr>
                  <th style="width: 10%; text-align: center;">ID</th>
                  <th style="width: 35%; text-align: center;">Nom</th>
                  <th style="width: 10%; text-align: center;">Capacité</th>
                  <th style="width: 35%; text-align: center;">Adresse</th>
                  <th style="width: 10%; text-align: center;">Tarif</th>
                </tr>
              </table>
              <?php
              while ($row = $resultParking->fetch_assoc()) {
              ?>

                <div class='parking' style="border: none; display: none; text-align: left; margin-left: 7vh; background-color: transparent; cursor: pointer; "> <?php                                                                                                                                              ?>
                  <table style="width: 80vw;" class="parking-button">
                    <tr style="background-color: grey; cursor: pointer; ">
                      <td style="width: 10%;  text-align: center;"><?php echo $row["ID_PARKING"] ?></td>
                      <td style="width: 35%; text-align: center;"><?php echo $row["NOM_PARKING"] ?></td>
                      <td style="width: 10%;  text-align: center;"><?php echo $row["CAPACITE"] ?></td>
                      <td style="width: 35%; text-align: center;"><?php echo $row["ADRESSE_PARKING"] ?></td>
                      <td style="width: 10%;  text-align: center;"><?php echo $row["TARIF"] ?></td>
                    </tr>
                  </table>

                  <div class="place-dispo">
                    <?php
                    $parking = $row["ID_PARKING"];
                    $resultPlaceDisp = $conn->query("WITH RECURSIVE NUMS AS (
                        SELECT 1 AS NUMERO_DE_PLACE
                        UNION ALL
                        SELECT NUMERO_DE_PLACE + 1 AS NUMERO_DE_PLACE
                        FROM NUMS
                        WHERE NUMS.NUMERO_DE_PLACE < (SELECT CAPACITE FROM PARKING
                        WHERE ID_PARKING=$parking)
                    )
                    
                    SELECT NUMERO_DE_PLACE
                    FROM NUMS
                    WHERE NUMERO_DE_PLACE NOT IN(
                    SELECT NUMERO_DE_PLACE
                    FROM  STATIONNEMENT 
                    WHERE DATE_STATIONNEMENT_E IS NOT NULL AND DATE_STATIONNEMENT_S IS NULL AND ID_PARKING=$parking);");

                    if ($resultPlaceDisp->num_rows > 0) {
                      echo "Numero des places dispo : ";
                      echo "<div style='width: 80vw; overflow-x: scroll;'>";
                        while ($row = $resultPlaceDisp->fetch_assoc()) {
                          echo "$row[NUMERO_DE_PLACE],";
                        }
                      echo "</div>";
                    }else{
                      echo "Pas de place disponible à ce moment.";
                    }
                    ?>

                  </div>
                </div>

              <?php
              }
              ?>

            <?php
          } else {
            echo "Aucun parking dans cette commune.";
          }
            ?>
            </div>
        </div>
      <?php
      }
      ?>
    </div>

  <?php
  } else {
    echo "Il n'y a aucune commune dans cette base de données.";
  }

  ?>

  <h2> La liste des parkings saturés à un moment donné </h2>

<?php

  $fullParking = "SELECT NOM_PARKING
  from (select S.ID_PARKING, NOM_PARKING, P.CAPACITE, COUNT(*) from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
  where (S.DATE_STATIONNEMENT_E <= '$d' AND (S.DATE_STATIONNEMENT_S >= '$d' OR S.DATE_STATIONNEMENT_S is null))
  group by S.ID_PARKING, NOM_PARKING
  having COUNT(*) = P.CAPACITE) AS T;";
  $resultFullParking = $conn->query($fullParking);

  if($resultFullParking->num_rows > 0){
    ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <th style="width: 100%; text-align: center;">Nom Parking</th>
      </tr>
    </table>
    <?php
    while($row = $resultFullParking->fetch_assoc()){
      ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <td style="width: 100%; text-align: center;"><?php echo $row["NOM_PARKING"];  ?></td>
        </tr>
      </table>
      <?php 
    }
  }else{
    echo "Il n'y a pas de parking saturé dans l'heure et la date choisies.";
  }
?>

<h2> Liste de voitures qui se sont garées dans deux parkings différents au cours d'une journée </h2>

<?php

  $cars = "SELECT NUMERO_IMMATRICULATION
  from (select DISTINCT S.ID_PARKING , NUMERO_IMMATRICULATION from STATIONNEMENT S inner join PARKING P on P.ID_PARKING = S.ID_PARKING
      where (S.DATE_STATIONNEMENT_E <= '$d' AND (S.DATE_STATIONNEMENT_S >= '$d' OR S.DATE_STATIONNEMENT_S is null)) ) AS T
  group by NUMERO_IMMATRICULATION
  having COUNT(*) >= 2;";

  $resultCars = $conn->query($cars);

  if($resultCars->num_rows > 0){
    ?>
    <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
      <tr>
        <th style="width: 100%; text-align: center;">Numéro d'immatriculation</th>
      </tr>
    </table>
    <?php
    while($row = $resultCars->fetch_assoc()){
      ?>
      <table style="width: 80vw; margin-left: 7vh; text-align: left; border: 1px solid black;">
        <tr>
          <td style="width: 100%; text-align: center;"><?php echo $row["NUMERO_IMMATRICULATION"];  ?></td>
        </tr>
      </table>
      <?php 
    }
  }else{
    echo "0 résultats.";
  }
    


}
?>

<?php
$conn->close();
?>


<?php echo file_get_contents("html/footer.html"); ?>