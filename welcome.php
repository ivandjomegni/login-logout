<?php
// Initialize the session
session_start();

require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login-error.php");
    exit;
}


/*
$sql = "SELECT media, mimetype FROM uploads where id='{$_SESSION["favorite_image"]}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		header ('content-type: {$row["mimetype"]}' );
        echo $row['media'] ;
		echo "<img src='display.php?id={$row['id']}' style='width:50%; height:50%;'> \n";
		
		
    }
}

$conn->close();
*/
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; 
       	      background-image: url(<?php echo "display.php?id={$_SESSION['favorite_image']}";?>);
			  background-size: cover;
			  }
    </style>
</head>
<body>
  
	<!--<?php echo "<img src='display.php?id={$_SESSION['favorite_image']}' style='width:50%; height:50%;'>";  ?> -->
    <div class="page-header">
	
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </h1>  <h3> Welcome to our site</h3> <h3> Pick an option:</h3>
    </div>
    <p>
	<table border='3' align='center'>
	<tr>
	<td>  <a href="users.php"> List the users </a> </td>  
	</tr>
	</table>
	<br>
<!--	
	<table border='3' align='center'>
	<tr>
	<td>  <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a> </td>  
	</tr>
	</table>
	<br>
-->	
	<table border='3' align='center'>
	<tr>
	<td>  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a> </td>  
	</tr>
	</table>
	
     
</body>
</html>