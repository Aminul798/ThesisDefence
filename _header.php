<?php
session_start();
include '_login.php';
include '_signup.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '<script>alert("Signup Success");</script>';
}



echo'
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:darkcyan;">
<div class="container-fluid">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link active m-1" href="_index.php"style="padding:12px;background-color:lightseagreen;border-radius:5px; font-weight: bold; color:dimgray">Homes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link m-1" href="_posttopic.php" id="" role="button"style="padding:12px;background-color:lightseagreen;border-radius:5px;font-weight: bold; color:dimgray">Post a topic</a>
    </li>  
    <li class="nav-item">
        <a class="nav-link active m-1" href="question.php"style="padding:12px;background-color:lightseagreen;border-radius:5px;font-weight: bold; color:dimgray">Questions</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active m-1" href="_course.php"style="padding:12px;background-color:lightseagreen;border-radius:5px;font-weight: bold; color:dimgray">Courses</a>
    </li>
    <li class="nav-item">
        <a class="nav-link m-1 " href="_noticeboard.php" style="padding:12px;background-color:lightseagreen;border-radius:5px;font-weight: bold; color:dimgray">Notice</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link m-1 " href="videosdk-rtc-javascript-sdk-example-main\index.html" style="padding:12px;background-color:lightseagreen;border-radius:5px;font-weight: bold; color:dimgray">Live Session</a>
    </li>

    <li class="nav-item mt-2">
    <a href="_notification.php" class="my-5 m-1 " style="background-color:darkcyan; border:none"><img src="All images\notification.png" height="40px" width="40px" style="border-radius:50%"></a>
    </li>

    </ul>';

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {



      include '_dbconnectcard.php';
    $mail=$_SESSION['useremail'];
    $sql="select user_image from `profile` where email='$mail'";
    $result=mysqli_query($conn,$sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $uimg = $row['user_image'];
        } 
    }
    else {
        echo "Query failed: " . mysqli_error($conn);
    }



      echo '<form class="d-flex method="get" action="_search.php">
      <input class="form-control mr-sm-2 m-1" name="search" type="search" action="_search.php" placeholder="Search" aria-label="Search">
      <button class="btn my-2 my-sm-0 m-2" type="submit"style="background-color:lightseagreen;font-weight: bold; color:dimgray">Search</button>
      <a href="_userprofile.php" class="my-2 my-sm-0 m-1" style="background-color:darkcyan; border:none"><img src="userphoto/'.$uimg.'" height="40px" width="40px" style="border-radius:50%"></a>
      <a href="_logoutdb.php" class="btn  my-2 my-sm-0 m-1 p-2"style="background-color:lightseagreen;font-weight: bold; color:dimgray">Logout</a>

      </form>';
    }
    else
    {
      echo'<form class="d-flex method="get" action="_search.php">
      <input class="form-control me-2 m-2" type="search" name="search" action="_search.php" placeholder="Search" aria-label="Search">
      <button class="btn m-1" type="submit" style="background-color:lightseagreen;font-weight: bold; color:dimgray;">Search</button>
      <button type="button" class="btn m-1" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color:lightseagreen;font-weight: bold; color:dimgray">login</button>
      <button type="button" class="btn m-1" data-bs-toggle="modal" data-bs-target="#signupModal" style="background-color:lightseagreen;font-weight: bold; color:dimgray">SignUp</button>

    </form>';
    }



echo'
  </div>
</div>
</nav>';


?>