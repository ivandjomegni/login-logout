

<?php
// Initialize the session
session_start();

require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login-error.php");
    exit;
}

$bg = $_SESSION['favorite_image'];

$sql = "SELECT id, username, favorite_image FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div align='center'><table border='1'><tr><th>ID</th><th>Username</th><th>Picture ID</th><th>Options</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
        echo " 
		<tr>
		     
			  <td>".$row["id"]."</td>
		      <td>".$row["username"]."</td>
			  <td>".$row["favorite_image"]."</td>
			   <td><a href='display.php?id={$row["id"]}' target ='_blank'> Display Image </a></td>
			   <td><a href='edit.php?id={$row["id"]}' target ='_blank'> Edit </a></td>
			  <td><a href='delete.php?id={$row["id"]}' target ='_blank'> Delete </a></td>
			  </tr>\n 
			  <div>";
		
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>
<br>
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
<a href="welcome.php"> Back to the homepage</a>

<h4><font color="green"> You're still connected as <b> </font> <font color="red"><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </font></h4>
     
</body>
</html>