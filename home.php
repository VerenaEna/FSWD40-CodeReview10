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
<title>Login & Registration System</title>
</head>
<body>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Welcome - <?php echo $userRow['user_name']; ?></title>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style>
      html {
        font-size: 90%;
        background: linear-gradient(rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45)),
          url("asset/img/erol-ahmed-books-unsplash.jpg") no-repeat center center fixed;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
      }
      body {
        height: 50%;
        font-size: 1rem;
        position: relative;
        /* display: flex;
        justify-content: flex-end; */
        color: white;
        background-color: transparent;
      }
      header {
        background-color: white;
        height: 100%;
        width: 100%;
      }
      main {
        width:40%;
      }

      section {
        padding: 2rem;
      }
      form {
        background: rgba(0,0,0,.5);
        display:flex;
        flex-direction: column;
        width: 230px;
        max-width: 80%;
        padding: 5px;
      }
      h2{
        text-align: center;
        text-transform: uppercase;
        padding-bottom: 1rem;
      }
      .registerText {
        padding: 5px 0 0 0;
        font-size: .7rem;
        font-weight: bold;
        color: lightgrey;

      }

      #emailHelp {
        font-size: .7rem;
      }

      .signup {
        text-decoration: underline;
      }

      .text-muted {
        color: white;
      }

      @media screen and (max-width:420px){
        main {
          width: 100%;
        }
        form {
          max-width: 100%;
        }
        body {
          width: 100%;;
        }
      }
    </style>
  <body>
    <header class="header">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">SignUp</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </header>
    <section>
      <h1>Hi' <?php echo $userRow['user_name']; ?></h1>

      <a href="logout.php?logout">Sign Out</a>
    </section>
    <section>
      LIST TABLES
    </section>
</body>
</html>
<?php ob_end_flush(); ?>
