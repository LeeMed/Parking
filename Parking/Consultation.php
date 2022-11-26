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
      <div class='city' style="border: none; text-align: left; background-color: transparent; cursor: pointer; ">
        <?php echo $i . "- " . $row["NOM_DE_COMMUNE"] ?>
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
            <table class="parking" style="width: 100%; margin-left: 7vh; text-align: left; display: none;">
              <tr>
                <th style="width: 5%;">ID</th>
                <th style="width: 40%;">Nom</th>
                <th style="width: 10%;">Capacité</th>
                <th style="width: 40%;">Adresse</th>
                <th style="width: 5%;">Tarif</th>
              </tr>
            </table>
            <?php
            while ($row = $resultParking->fetch_assoc()) {
            ?>

              <div class='parking' style="border: none; display: none; text-align: left; margin-left: 7vh; background-color: transparent; cursor: pointer; "> <?php
                                                                                                                                                              ?>
                <table style="width: 100%;">
                  <tr>
                    <td style="width: 5%;"><?php echo $row["ID_PARKING"] ?></td>
                    <td style="width: 40%;"><?php echo $row["NOM_PARKING"] ?></td>
                    <td style="width: 10%;"><?php echo $row["CAPACITE"] ?></td>
                    <td style="width: 40%;"><?php echo $row["ADRESSE_PARKING"] ?></td>
                    <td style="width: 5%;"><?php echo $row["TARIF"] ?></td>
                  </tr>
                </table>
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