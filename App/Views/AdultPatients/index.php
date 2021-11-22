<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME QURANTINE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

</head>
<body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo strtoupper($adultData->name) ;?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo URLROOT; ?>/patient/symptoms">Record Symptoms</a></li>
            <li><a href="<?php echo URLROOT;?>/adult-patient/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="jumbotron">
            <h1>WELCOME <?php echo strtoupper($adultData->name) ;?> !</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quibusdam sequi eos consectetur culpa, id quia est natus, fugiat perspiciatis, repudiandae minus animi. Quaerat quam iure sint minima laudantium fugit!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid minima eum, dolor repellendus voluptate beatae laborum eligendi voluptatibus in reprehenderit ut soluta nisi blanditiis cupiditate quasi id? Officia, maiores odio.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora excepturi atque vel consectetur enim, similique nulla molestias, odit minus nobis aspernatur sint nisi sed eligendi error ex rem, incidunt maiores?</p>
        </div>
    </div>

    <script
  src="http://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



</body>
</html>

