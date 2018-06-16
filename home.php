<?php
ob_start();
session_start();
require_once 'dbconnect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['users']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['users']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['user_name']; ?></title>
</head>
<body>
           Hi' <?php echo $userRow['user_name']; ?>

           <a href="logout.php?logout">Sign Out</a>



</body>
</html>
<?php ob_end_flush(); ?>
