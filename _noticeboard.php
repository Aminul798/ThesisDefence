<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="headerdropdown.css" rel="stylesheet">

    <style>
      *{
        margin:0;
      }
      .card{
        margin: 15px 30px;
      }
    </style>

    
</head>

<body style="background-color: 	azure;">
    <?php include '_header.php'; ?>


    <script src="bootstrap/jquery-3.7.1.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js" ></script>

  


    <h1 style="text-align: center; margin:20px; color:red;">Notice Board</h1>



    <div class="card" style="width: 95%;">
  <div class="card-body">
    <h5 class="card-title" style="color: green;">Live Session</h5>
    <p class="card-text">A session about how to install xampp server will held from <time>10:00</time> to <time>11:00</time> am next friday.</p> 
    <p>11:20 pm 23-08-2024</p>
    <a href="#" class="">Let's go</a>
  </div>
</div>

<div class="card" style="width: 95%;">
  <div class="card-body">
    <h5 class="card-title" style="color: green;">New Post</h5>
    <p class="card-text">A new post about HTML Transition was posted on <time>10:00 pm</time> click below to see the post.</p> 
    <p>07:15pm 07-08-2024</p>

    <a href="#" class="card-link">Let's go</a>
  </div>
</div>

<div class="card" style="width: 95%;">
  <div class="card-body">
    <h5 class="card-title" style="color: green;">Live Session</h5>
    <p class="card-text">A session about funtion in PHP will held from <time>03:00pm</time> to <time>05:00pm</time> at 25-08-2024.</p> 
    <p>08:00 pm 12-05-2024</p>
    <a href="#" class="card-link">Let's go</a>
  </div>
</div>

<div class="card" style="width: 95%;">
  <div class="card-body">
    <h5 class="card-title" style="color: green;">Live Session</h5>
    <p class="card-text">A session about how to install xampp server will held from <time>10:00</time> to <time>11:00</time> am next friday.</p> 
    <a href="#" class="card-link">Let's go</a>
  </div>
</div>


           
    <?php include '_footer.php'; ?>
</body>

</html>
