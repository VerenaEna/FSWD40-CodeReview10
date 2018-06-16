<!DOCTYPE html>
<head>
  <title>VerenaEnas Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a class="nav-link" href="home.php">Home</a>
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
  <section class="addMedia center">

    <form action="actions/a_create.php" method="post" >
      <h1>Add Media File</h1>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"># ISBN</span>
        </div>
        <input type="text" name="ISBN" class="form-control" placeholder="f.e.2064244152" aria-label="ISBN" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">http://</span>
        </div>
        <input type="text" name="img_src" class="form-control" placeholder="http://googleimage.com/image.jpg" aria-label="image" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">title</span>
        </div>
        <input type="text" name="title" class="form-control" placeholder="Title of the media f.e. 'The Wall' or 'Ninja Assassin'" aria-label="title" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">short Description</span>
        </div>
        <input type="text" name="short_descr" class="form-control" placeholder="a short description of the content" aria-label="description" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Publishing Date</span>
        </div>
        <input type="text" name="pub_date" class="form-control" placeholder="write in this format '2017-05-17'" aria-label="pub_date" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Type of media</span>
        </div>
        <input type="text" name="media_type" class="form-control" placeholder="books, cd, or blueray" aria-label="type" aria-describedby="basic-addon1">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">Availibility</span>
        </div>
        <input type="text" name="availibility" class="form-control" placeholder="yes=1 // no=0" aria-label="available" aria-describedby="basic-addon1">
      </div>
      <div class="buttons">
        <button class="btn btn-success" type="submit">+ Add to media</button>
        <a class="btn btn-light" href="home.php">Back</a>
      </div>


      </form>
    </section>



</fieldset>



</body>

</html>
