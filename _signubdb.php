<?php

$showError = "false";
$pic_uploaded=0;
$photo="";



if(isset($_REQUEST['signup']))
    {
    $image=$_FILES['image']['name'];
    $folder='/userphoto/';
    
    if(move_uploaded_file($_FILES['image']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$folder.$image))
    {
        $target_file=$_SERVER['DOCUMENT_ROOT'].$folder.$image;
        $image_filetype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $imagename=basename($_FILES['image']['name']);
        $photo=$imagename;
        if($image_filetype !='jpg' && $image_filetype !='jpeg' && $image_filetype !='png')
        {
            ?>
            <script>alert("Image must have .jpg/ .jpeg/ .png extension");</script>
            <?php
        }
        else
        {
            $pic_uploaded=1;
        }
    }

}



if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include '_dbconnectcard.php';
    $user_fullname=$_POST['fullname'];
    $user_name=$_POST['username'];
    $user_id=$_POST['studentid'];
    $user_institution=$_POST['institution'];
    $user_email=$_POST['inputemail'];
    $user_pass=$_POST['inputpassword'];
    $user_conpass=$_POST['inputconfirmpassword'];


    $existmail="select * from `profile` where email='$user_email'";
    $result=mysqli_query($conn,$existmail);
    $numRow=mysqli_num_rows($result);
    if($numRow>0)
    {
        $showError="Email already in use";
    }
    else
    {
        if($user_pass==$user_conpass && $pic_uploaded==1)
        {
            $hash=password_hash($user_pass,PASSWORD_DEFAULT);            
            $sql="INSERT INTO `profile` (`fullname`, `username`,`user_image`, `studentid`, `institution`, `email`, `password`, `date`) VALUES ('$user_fullname', '$user_name','$photo', '$user_id', '$user_institution', '$user_email', '$hash', NOW());"; 
            $insert=mysqli_query($conn,$sql);
             if($insert)
             {
                $showAlert='true';
                header("Location: _index.php?signupsuccess=true");
                exit();
             }
             else
             {
                $showError = "Passwords do not match"; 
                
            }
        }
    }

    header("Location: _index.php?signupsuccess=false&error=$showError");
}



?>