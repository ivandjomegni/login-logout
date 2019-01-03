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


$sql = "SELECT media, mimetype FROM uploads where id='{$_REQUEST['id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		header ('content-type: {$row["mimetype"]}' );
        echo $row['media'] ;
    }
}
$conn->close();

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users List</title>
    
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; 
       	      background-image: url(<?php echo "display.php?id={$_SESSION['favorite_image']}";?>);
			  background-size: cover;
			  }
    </style>
</head>
<body>

</body>
</html>
<br> <a href="formDB.php"> Add a new Record </a> &nbsp | &nbsp <a href="listDB.php"> Back to your submissions </a>


<h4><font color="green"> You're still connected as <b> </font> <font color="red"><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </font></h4>
