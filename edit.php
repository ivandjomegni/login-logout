
<?php

// Initialize the session
session_start();

require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login-error.php");
    exit;
}

if (isset($_REQUEST['edit'])) {
	// edit the record
	$sql = "UPDATE users 
	        SET id = '{$_POST['id']}', username = '{$_POST['username']}', favorite_image = '{$_POST['favorite_image']}'
		    where id='{$_REQUEST['id']}'";
    $result = $conn->query($sql);
	header( "refresh:10;url=users.php");
	echo" <h3> The record has been updated successfully. You will need to sign out and sign back in for the change to take effet. </h3>
	
	You will be redirected in 10 seconds. If not, <a href='users.php'> Click this link </a>
	";
}
else {

$sql = "SELECT id, username, favorite_image FROM users where id='{$_REQUEST['id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   $row = $result->fetch_assoc();
   
   echo" <form method='post' action=''> \n
            <label>ID: </label>
            <input type='text' name='id' value='{$_REQUEST['id']}' readonly />
			<label>Username: </label>
			<input type='text' name='username' value='{$row['username']}' />
			<label>Picture ID (From 1 to 5) :</label>
		    <input type='text' name='favorite_image' value='{$row['favorite_image']}' />
            <input type='submit' name='edit' value='Edit this record !' />
		 </form>
     ";
	
    }
	else{
		echo "Unable to find the record";
}
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

<br>
<a href="welcome.php"> Back to the homepage</a> <br>
<a href="users.php"> Back to the users list</a>

<h4><font color="green"> You're still connected as <b> </font> <font color="red"><?php echo htmlspecialchars($_SESSION["username"]); ?></b> </font></h4>

</body>
</html>