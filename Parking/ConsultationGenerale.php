<?php echo file_get_contents("html/header.html"); ?>
<h1>
  This is the Consultation page
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

      <div class='city' >
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
                    WHERE ID_PARKING = $parking");

                    if ($resultPlaceNotDisp->num_rows > 0){
                      while($row = $resultPlaceNotDisp->fetch_assoc()){
                  ?>

                    <table class="place" style="width: 80vw; margin-left: 7vh; text-align: left; isplay: none;">
                      <tr>
                        <th style="width: 20%; text-align: center;"><?php echo $row['ID_STATIONNEMENT'] ; ?></th>
                        <th style="width: 20%; text-align: center;"><?php echo $row['DATE_STATIONNEMENT_E'] ; ?></th>
                        <th style="width: 20%; text-align: center;"><?php if ($row['DATE_STATIONNEMENT_S'] == null) {
                          echo "NaN";
                        } else {
                          echo $row['DATE_STATIONNEMENT_S'];
                        }; ?></th>
                        <th style="width: 20%; text-align: center;"><?php echo $row['NUMERO_DE_PLACE'] ; ?></th>
                        <th style="width: 20%; text-align: center;"><?php echo $row['NUMERO_IMMATRICULATION'] ; ?></th>
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
$conn->close();
?>


<?php echo file_get_contents("html/footer.html"); ?>