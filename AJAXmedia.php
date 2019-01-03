<?php

if (isset($_REQUEST['id'])) {
	
$servername = "localhost";
$username = "root";
$password = "Informatique237";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT id, description, filename, mimetype FROM uploads where id='{$_REQUEST['id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
		<strong> Image: </strong>" . $row["filename"]. "<br>

		";
        echo "<img src='display.php?id={$row['id']}' style='width:50%; height:50%;'> \n";
		
		
    }
} else {
    echo "0 results";
	

}
$conn->close();

}
?>