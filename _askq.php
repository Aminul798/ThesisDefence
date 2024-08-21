<?php
session_start();
include'_dbconnectcard.php';
$uname="";
$uimg="";

$mail=$_SESSION['useremail'];
$sql="select username,user_image from `profile` where email='$mail'";
    $result=mysqli_query($conn,$sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $uname = $row['username'];
            $uimg = $row['user_image'];
        } 
    }
    else {
        echo "Query failed: " . mysqli_error($conn);
    }


if(isset($_REQUEST['submit']))
{
    $ques=$_REQUEST['question'];
    $sql="INSERT INTO `question` (`question_user`, `question_userimg`, `question_des`, `question_date`) VALUES ('$uname', '$uimg', '$ques', NOW());";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("location: question.php");
    }

}

?>