<?php echo file_get_contents("html/header.html"); ?>
<h1>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  Consultation générale :
</h1>
<?php
header("Cache-Control: no-chache");
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
    - Liste des communes <br>
    - Liste des parkings par communes <br>
    - Liste des stationnement par parking
  </P>

  <br>
  <input type="datetime-local" name="datetime" min="2022-11-23T00:00" max="2022-11-30T23:59">
  <br>
  <input type="submit" value="submit" name="submit">
  <br>
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
            <div class="parking-wrapper" style=" height: auto; display: grid; grid-template-columns: auto; column-gap: 1vh; margin-left: 7vh; text-align: left;">
              <table class="parking" style="display: none; width: 80vw;">
                <tr>
                  <td style="width: 10%; text-align: center;">ID</td>
                  <td style="width: 35%; text-align: center;">Nom</td>
                  <td style="width: 10%; text-align: center;">Capacité</td>
                  <td style="width: 35%; text-align: center;">Adresse</th>
                  <td style="width: 10%; text-align: center;">Tarif</td>
                </tr>
              </table>
              <?php
              while ($row = $resultParking->fetch_assoc()) {
              ?>

                <div class='parking' style="border: none; display: none; background-color: transparent; cursor: pointer; "> <?php                                                                                                                                              ?>
                  <table style="width: 80vw;" class="parking-button">
                    <tr style="background-color: grey; cursor: pointer; ">
                      <td style="width: 10%;  text-align: center;"><?php echo $row["ID_PARKING"] ?></td>
                      <td style="width: 35%; text-align: center;"><?php echo $row["NOM_PARKING"] ?></td>
                      <td style="width: 10%;  text-align: center;"><?php echo $row["CAPACITE"] ?></td>
                      <td style="width: 35%; text-align: center;"><?php echo $row["ADRESSE_PARKING"] ?></td>
                      <td style="width: 10%;  text-align: center;"><?php echo $row["TARIF"] ?></td>
                    </tr>
                  </table>

                  <div class="place-ndispo">
                    <table class="place" style="width: 80vw; margin-left: 7vh; text-align: left; display: none;">
                      <tr>
                        <th style="width: 20%; text-align: center;">ID Stationnement</th>
                        <th style="width: 20%; text-align: center;">Date entrée</th>
                        <th style="width: 20%; text-align: center;">Date sortie</th>
                        <th style="width: 20%; text-align: center;">Numero place</th>
                        <th style="width: 20%; text-align: center;">Num Immatriculation</th>
                      </tr>
                    </table>

                    <?php
                    $parking = $row["ID_PARKING"];
                    $resultPlaceNotDisp = $conn->query("SELECT * FROM STATIONNEMENT
                    WHERE ID_PARKING = $parking AND DATE_STATIONNEMENT_E <= '$d' AND (DATE_STATIONNEMENT_S is NULL OR DATE_STATIONNEMENT_S >= '$d');");

                    if ($resultPlaceNotDisp->num_rows > 0) {
                      while ($row = $resultPlaceNotDisp->fetch_assoc()) {
                    ?>

                        <table class="place" style="width: 80vw; margin-left: 7vh; text-align: left; display: none;">
                          <tr>
                            <th style="width: 20%; text-align: center;"><?php echo $row['ID_STATIONNEMENT']; ?></th>
                            <th style="width: 20%; text-align: center;"><?php echo $row['DATE_STATIONNEMENT_E']; ?></th>
                            <th style="width: 20%; text-align: center;"><?php if ($row['DATE_STATIONNEMENT_S'] == null) {
                                                                          echo "NaN";
                                                                        } else {
                                                                          echo $row['DATE_STATIONNEMENT_S'];
                                                                        }; ?></th>
                            <th style="width: 20%; text-align: center;"><?php echo $row['NUMERO_DE_PLACE']; ?></th>
                            <th style="width: 20%; text-align: center;"><?php echo $row['NUMERO_IMMATRICULATION']; ?></th>
                          </tr>
                        </table>

                    <?php
                      }
                    }
                    ?>

                  </div>
                </div>

              <?php
              }
              ?>

            <?php
          } else {
            echo "0 results";
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
    echo "0 results";
  }
}
$conn->close();
?>


<?php echo file_get_contents("html/footer.html"); ?>