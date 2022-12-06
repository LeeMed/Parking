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

<h2>
    Ajout d'un Véhicule
</h2>




<form method="POST">
    <P>Veuillez entrer les informations sur la voiture.</P>
    <br>

    <label for="immatriculation">Numéro d'immatriculation du véhicule :</label>
    <br>
    <input type="text" id="immatriculation" name="immatriculation">
    <br>

    <label for="marque">La marque du véhicule :</label>
    <br>
    <input type="text" id="marque" name="marque">
    <br>

    <label for="dmc">DMC : </label>
    <br>
    <input type="datetime-local" name="dmc"  max="2022-11-30T23:59">
    <br>

    <label for="km">Kilométrage :</label>
    <br>
    <input type="number" id="km" name="km">
    <br>

    <label for="etat">État du véhicule :</label>
    <br>
    <input type="text" id="etat" name="etat" list="etat-list">

    <datalist id="etat-list">
        <option value="Excellent état">
        <option value="Très bon état">
        <option value="Bon état">
        <option value="État correct">
        <option value="Mauvaise état">
    </datalist>
    <br>
    <input type="submit" value="submit" name="submit">
    <br>
</form>

<?php

if (array_key_exists('submit', $_POST)) {

    function change($date)
    {
        $date = str_replace('T', ' ', $date);
        return $date;
    }

    $immatriculation = $_POST["immatriculation"];
    $marque = $_POST["marque"];
    $dmc = Change($_POST["dmc"]);
    $km = $_POST["km"];
    $etat = $_POST["etat"];

    $insertVehicule = "INSERT into VEHICULE values ('$immatriculation' ,'$marque' ,'$dmc' , '$km', '$etat');";
    if ($conn->query($insertVehicule) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertVehicule . "<br>" . $conn->error;
    }

}

?>


<h2>
    Ajout d'un stationnement
</h2>

<?php

$getID = "SELECT ID_STATIONNEMENT from STATIONNEMENT order by ID_STATIONNEMENT desc limit 1;";
$resultGetID = $conn->query($getID);
if ($resultGetID->num_rows > 0) {
    while ($row = $resultGetID->fetch_assoc()) {
        $id_stationnement = $row["ID_STATIONNEMENT"] + 1;
    }
}


$idParking = "SELECT ID_PARKING FROM PARKING;";
$resultIdParking = $conn->query($idParking);


if ($resultIdParking->num_rows > 0) {
?>
    <form method="POST">
        <P>Veuillez entrer une date d'entrée au parking, l'id du parking et le numéro d'immatriculation du véhicule
            (le véhicule doit éxister dans la table Véhicule de la base de données). </P>
        <br>
        <label for="datetime">Date d'entrée au parking : </label>
        <br>
        <input type="datetime-local" name="datetime" min="2022-11-23T00:00" max="2022-11-30T23:59">
        <br>
        <label for="parking">ID Parking :</label>
        <br>
        <input type="text" id="parking" name="parking" list="parking-list">

        <datalist id="parking-list">
            <?php
            while ($row = $resultIdParking->fetch_assoc()) {
            ?>
                <option><?php echo $row["ID_PARKING"]; ?></option>
            <?php
            }
            ?>
        </datalist>
        <br>
        <label for="immatriculation">Numéro d'immatriculation du véhicule :</label>
        <br>
        <input type="text" id="immatriculation" name="immatriculation">
        <br>
        <input type="submit" value="submit" name="submitStationnement">
        <br>
    </form>

<?php

    function changeDate($date)
    {
        $date = str_replace('T', ' ', $date);
        $date = "$date" . ":00";
        return $date;
    }

    if (array_key_exists('submitStationnement', $_POST)) {
        $date = changeDate($_POST['datetime']);
        $ID = $_POST["parking"];

        $PlaceDisp = "WITH RECURSIVE NUMS AS (
            SELECT 1 AS NUMERO_DE_PLACE
            UNION ALL
            SELECT NUMERO_DE_PLACE + 1 AS NUMERO_DE_PLACE
            FROM NUMS
            WHERE NUMS.NUMERO_DE_PLACE < (SELECT CAPACITE FROM PARKING
            WHERE ID_PARKING=$ID)
        )
        
        SELECT NUMERO_DE_PLACE
        FROM NUMS
        WHERE NUMERO_DE_PLACE NOT IN(
        SELECT NUMERO_DE_PLACE
        FROM  STATIONNEMENT 
        WHERE DATE_STATIONNEMENT_E IS NOT NULL AND DATE_STATIONNEMENT_S IS NULL AND ID_PARKING=$ID);";

        $resultPlaceDisp = $conn->query($PlaceDisp);
        $row = $resultPlaceDisp->fetch_assoc();
        $place = $row["NUMERO_DE_PLACE"];
        $imm = $_POST["immatriculation"];

        $insertStationnement = "INSERT into STATIONNEMENT values ($id_stationnement , '$date' , null , $ID , $place , '$imm' );";

        if ($conn->query($insertStationnement) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertStationnement . "<br>" . $conn->error;
        }
    }
} else {
    echo "il n'y a pas de parking où mettre ce stationnement";
}

?>

<?php echo file_get_contents("html/footer.html"); ?>