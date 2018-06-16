<?php



require_once 'actions/db_connect.php';



if($_GET['ISBN']) {

    $id = $_GET['ISBN'];



    $sql = "SELECT * FROM media WHERE ISBN = {$id}";

    $result = $connect->query($sql);

    $data = $result->fetch_assoc();



    $connect->close();

?>



<!DOCTYPE html>

<html>

<head>

    <title>Delete Car</title>

</head>

<body>



<h3>Do you really want to delete this media file?</h3>

<form action="actions/a_delete.php" method="post">



    <input type="hidden" name="ISBN" value="<?php echo $data['ISBN'] ?>" />

    <button type="submit">Yes, delete it!</button>

    <a href="index.php"><button type="button">No, go back!</button></a>

</form>



</body>

</html>



<?php

}

?>
