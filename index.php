<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


// it will never let you open index(login) page if session is set
if ( isset($_SESSION['users'])!="" ) {
 header("Location: home.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {

 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs

 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {

  $password = hash('sha256', $pass); // password hashing

  $res=mysqli_query($conn, "SELECT user_id, user_name, user_pass FROM users WHERE user_email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

  if( $count == 1 && $row['user_pass']==$password ) {
   $_SESSION['users'] = $row['user_id'];
   header("Location: home.php");
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }

 }

}
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
      <title>VerenaEnas Library</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous"><!-- for the heart icon in the footer -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css" />
    </head>

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
      <h1>This is our Big Library</h1>
      <section class="cards">


        <div class='card-group'>
          <?php

          $sql = "SELECT * FROM media WHERE availibility = '1'";

          $result = $connect->query($sql);


          if($result->num_rows > 0) {

              while($row = $result->fetch_assoc()) {

                  echo
                  "
                    <div class='card'>
                      <img class='card-img-top' src='".$row['img_src']."' alt='Card image of the media' />
                        <div class='card-body'>
                          <h5 class='card-title'>".$row['title']."</h5>
                          <p class='card-text'>Published ".$row['pub_date']." .".$row['short_descr']."</p>
                          <p class='card-text'><small class='text-muted'>".$row['media_type']." with #".$row['ISBN']." is ".$row['availibility']." </small></p>
                        </div>
                        <a href='update.php?car_id=".$row['ISBN']."'><button type='button'>Edit</button></a>
                        <a href='delete.php?car_id=".$row['ISBN']."'><button type='button'>Delete</button></a>
                    </div>";
              }
          } else {
              echo "<p><center>No Data Avaliable</center></p>";
          }
          ?>
        </div>
      </section>
      <h2>Please log in to see the List</h2>
    </section>
    <section>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="on">
        <?php
          if ( isset($errMSG) ) {
            echo $errMSG; }
        ?>
        <div class="form-group">
          <label for="inputEmail">Email address</label>
          <input type="email" name="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Your email" value="<?php echo $email; ?>" maxlength="40">
          <span class="text-danger"><?php echo $emailError; ?></span>
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" name="pass" class="form-control" id="input" placeholder="Your Password" maxlength="15">
          <span class="text-danger"><?php echo $passError; ?></span>
        </div>
        <button type="submit" name="btn-login" class="btn btn-primary">Log in</button>
        <a class="registerText" href="register.php">Want to order some books and have no User? <span class="signup">Sign up here</span></a>
      </form>
    </section>
  </body>
</html>
<?php ob_end_flush(); ?>
