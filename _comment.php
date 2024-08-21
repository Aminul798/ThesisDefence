<?php
session_start();
include '_dbconnectcard.php';
$mail = $_SESSION['useremail'];
$uname = "";
$uimg = "";
$postid = "";
$category_image = "";
$postuser = "";
$post;
$userimg = "";
$category_name = "";
$title = "";
$category_description = "";
$category_created;

$sql = "SELECT username, user_image FROM `profile` WHERE email='$mail'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $uname = $row['username'];
        $uimg = $row['user_image'];
    }
} else {
    echo "Query failed: " . mysqli_error($conn);
}

if(isset($_GET['Category_image']) && isset($_GET['category_name']) && isset($_GET['category_id']) && isset($_GET['title']) && isset($_GET['category_description']) && isset($_GET['category_postuser'])&& isset($_GET['user_image']) && isset($_GET['category_created'])) {
    $category_image = $_GET['Category_image'];
    $postuser = $_GET['category_postuser'];
    $post=$_GET['category_id'];
    $userimg = $_GET['user_image'];
    $category_name = urldecode($_GET['category_name']);
    $title = urldecode($_GET['title']);
    $category_description = urldecode($_GET['category_description']);
    $category_created = $_GET['category_created'];
}



if (isset($_POST['com'])) {
    $pdf = $_FILES['fileupload']['name'];
    $temp_pdf = $_FILES['fileupload']['tmp_name'];
    $folder = "/pdffolder/" . $pdf; // Correct folder path definition

    $comm = $_POST['commenttext'];

    // Check if file is uploaded successfully
    move_uploaded_file($temp_pdf, $_SERVER['DOCUMENT_ROOT'] . $folder);
    $sqll = "INSERT INTO `comment` (`post_id`, `commnetor`, `userphpto`, `comment`, `file`, `commne_date`) VALUES ('$post', '$uname', '$uimg', '$comm', '$pdf', NOW())"; // Correct column name commne_date to comment_date
    $insertt = mysqli_query($conn, $sqll);
    if ($insertt) {
        header("Location: _post.php?Category_image=$category_image&category_id=$post&category_name=$category_name&title=$title&category_description=$category_description&category_postuser=$postuser&user_image=$userimg&category_created=$category_created");
    } else {
         // Handle insertion failure
         echo "Error: " . mysqli_error($conn);
    }

}



?>