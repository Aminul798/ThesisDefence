<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '_dbconnectcard.php';
    $email = $_POST['inputemail'];
    $pass = $_POST['inputpassword'];

    $sql = "Select * from `profile` where email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            $_SESSION['user']=$row['username'];
            $_SESSION['uid']=$row['user_id'];
            
            header("Location: _index.php"); 
        }
    }
   header("Location: _index.php"); 
}

?>