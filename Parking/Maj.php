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
    <P>Veuillez entrer les données de la voiture.</P>
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
    <input type="datetime-local" name="dmc" max="2022-11-30T23:59">
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

function change($date)
{
    $date = str_replace('T', ' ', $date);
    return $date;
}

if (array_key_exists('submit', $_POST)) {



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


<h2>
    Modification du tarif d'un parking
</h2>

<form method="POST">
    <P>Veuillez entrer l'id du parking et le nouveau tarif. </P>
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
    <label for="tarif">Tarif :</label>
    <br>
    <input type="number" id="tarif" name="tarif">
    <br>
    <input type="submit" value="submit" name="submitTarif">
    <br>
</form>

<?php
if (array_key_exists('submitTarif', $_POST)) {
    $tarif = $_POST["tarif"];
    $parking = $_POST["parking"];
    $updateTarif = "UPDATE PARKING set TARIF = $tarif where ID_PARKING = $parking;";
    if ($conn->query($updateTarif) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $updateTarif . "<br>" . $conn->error;
    }
}


?>


<h2>
    Ajout d'une date de sortie d'un parking pour une voiture
</h2>


<?php
$stationnement = "SELECT ID_STATIONNEMENT FROM STATIONNEMENT order by ID_STATIONNEMENT desc";
$resultStationnement = $conn->query($stationnement);

if ($resultStationnement->num_rows > 0) {
?>

    <form method="POST">
        <P>Veuillez entrer l'id du stationnement et la date de sortie. </P>
        <br>
        <label for="stationnement">Numéro d'imatriculation :</label>
        <br>
        <input type="text" id="stationnement" name="stationnement" list="stationnement-list">

        <datalist id="stationnement-list">
            <?php
            while ($row = $resultStationnement->fetch_assoc()) {
            ?>
                <option><?php echo $row["ID_STATIONNEMENT"]; ?></option>
            <?php
            }
            ?>
        </datalist>
        <br>
        <label for="sortie">Date de sortie : </label>
        <br>
        <input type="datetime-local" name="sortie" min='$e' max="2022-11-30T23:59">
        <br>
        <input type="submit" value="submit" name="submitDate">
        <br>
    </form>

<?php

    if (array_key_exists('submitDate', $_POST)) {
        $stat = $_POST["stationnement"];

        $dateE = "SELECT DATE_STATIONNEMENT_E FROM STATIONNEMENT WHERE ID_STATIONNEMENT = $stat";
        $resultDateE = $conn->query($dateE);
        while ($row = $resultDateE->fetch_assoc()) {
            $e = $row["DATE_STATIONNEMENT_E"];
        }
        $newDate = change($_POST["sortie"]);

        if ($newDate < $e) {
            echo "Vous ne pouvez pas choisir une date de sortie qui précède la date d'entrée.";
        } else {


            $dateS = "SELECT DATE_STATIONNEMENT_S FROM STATIONNEMENT 
            WHERE ID_STATIONNEMENT = $stat;";
            $resultDateS = $conn->query($dateS);
            while ($row = $resultDateS->fetch_assoc()) {
                $s = $row["DATE_STATIONNEMENT_S"];
            }

            if ($s == null) {
                $updateS = "UPDATE STATIONNEMENT set DATE_STATIONNEMENT_S='$newDate' where ID_STATIONNEMENT=$stat;";
                if ($conn->query($updateS) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $updateS . "<br>" . $conn->error;
                }
            } else {
                echo "La date de sortie de ce stationnement est déjà non nulle dans la base de données";
            }
        }
    }
}
?>


<?php echo file_get_contents("html/footer.html"); ?>