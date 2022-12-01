<?php echo file_get_contents("html/header.html"); ?>
<h1>
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

<?php echo file_get_contents("html/footer.html"); ?>