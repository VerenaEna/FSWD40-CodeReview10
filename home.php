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
      <title>Welcome - <?php echo $userRow['user_name']; ?></title>
      <meta charset="utf-8">
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
          <a class="nav-link" href="create.php">Add media</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php?logout">Log out</a>
        </li>
      </ul>
    </header>
    <section>
      <h1>Hi' <?php echo $userRow['user_name']; ?></h1>
      <p>
        Hope you had a good start in the day and i wish you fun in this library
      </p>

      <div class="manageUser">
        <a class="btn btn-success" href="create.php" role="button">+ Add new Media</a>
      </div>
    </section>
    <section class="cards">


      <div class='cards card card-group'>
        <div class="manager">
          <h2>Here we have our Full List - add some new files</h2>
          <a class="btn btn-info" role="button" href="create.php">+ Add new Media</a>
        </div>

        <?php

        $sql = "SELECT * FROM media";

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
                      <a class='btn btn-outline-secondary' href='update.php?car_id=".$row['ISBN']."'>Edit</a>
                      <a class='btn btn-danger' href='delete.php?car_id=".$row['ISBN']."'>Delete</a>
                  </div>";
            }
        } else {
            echo "<p><center>No Data Avaliable</center></p>";
        }
        ?>
      </div>
    </section>
    <section>
      <div class="table-responsive-md">
        <table class='table table-sm table-hover table-dark'>
          <thead class='thead-dark'>
            <tr>
            <th scope='col'>#ISBN</th>
            <th scope='col'>image link</th>
            <th scope='col'>title</th>
            <th scope='col'>short description</th>
            <th scope='col'>publishing date</th>
            <th scope='col'>Type</th>
            <th scope='col'>availibility</th>
            </tr>
          </thead>

          <?php

          $sql = "SELECT * FROM media";
          $result = $connect->query($sql);


          if($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo
                  "
                    <tbody>
                      <tr>
                        <th scope='row'>".$row['ISBN']."</th>
                        <td>".$row['img_src']."</td>
                        <td>".$row['title']."</td>
                        <td>".$row['short_descr']."</td>
                        <td>".$row['pub_date']."</th>
                        <td>".$row['media_type']."</td>
                        <td>".$row['availibility']."</td>
                      </tr>
                    </tbody>";
              }
          } else {
              echo "<p><center>No Data Avaliable</center></p>";
          }
          ?>
        </table>
      </div>
    </section>
  </body>
</html>
<?php ob_end_flush(); ?>
