<?php
ob_start();
session_start();
require_once 'dbconnect.php';
require_once 'actions/db_connect.php';


// if session is not set this will redirect to login page
if( !isset($_SESSION['users']) ) {
 header("Location: index.php");
 exit;
}
// select logged-in users detail
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_id=".$_SESSION['users']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

$title = $media['title'];


?>

<!DOCTYPE html>
  <html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <title>Welcome - <?php echo $userRow['user_name']; ?></title>
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
      <h1>Hi' <?php echo $userRow['user_name']; ?></h1>

      <a href="logout.php?logout">Sign Out</a>
    </section>
    <section class="cards">


      <div class='card-group'>
        <?php

        $sql = "SELECT * FROM media order by pub_date";

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

    <div class="manageUser">
    <button type="button"><a href="create.php">Add Media</a></button>

</div>
</body>
</html>
<?php ob_end_flush(); ?>
