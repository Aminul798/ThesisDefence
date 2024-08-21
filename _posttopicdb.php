<?php
session_start();
include'_dbconnectcard.php';
$pic_uploaded=0;

$mail=$_SESSION['useremail'];
$sql="select username from `profile` where email='$mail'";
    $result=mysqli_query($conn,$sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
    
        if ($row) {
            $uname = $row['username'];
        } 
    }
    else {
        echo "Query failed: " . mysqli_error($conn);
    }


if(isset($_REQUEST['submit']))
{
    $cate=$_REQUEST['category'];
    $des=$_REQUEST['description'];
    $image=$_FILES['image']['name'];
    $ttl=$_REQUEST['title'];
    $folder='/categoryphoto/';
    
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

    if($pic_uploaded==1)
    {
        $sql="INSERT INTO `category` (`category_postuser`, `category_name`,`title`, `category_description`, `Category_image`, `category_created`) VALUES ('$uname', '$cate','$ttl', '$des', '$photo', NOW())";
        $result=mysqli_query($conn,$sql);

        $sql2="INSERT INTO `categorytype` (`name`, `img`) VALUES ('$cate','$photo')";
        $result2=mysqli_query($conn,$sql2);

        if($result)
        {
            header("Location: _index.php");
            ?>
            <script>alert("Posted Successfully");</script>
            <?php
        }
    }

}

?>