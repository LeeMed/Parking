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

$sql = "SELECT * FROM VEHICULE";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " - Name: " . $row["MARQUE"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
<?php echo file_get_contents("html/footer.html"); ?>