<?php
session_start();
include '_dbconnectcard.php';
$mail = $_SESSION['useremail'];
$uname = "";
$uimg = "";
$quesid;
$ques_user = "";
$ques_userimg = "";
$quesdate;

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


$ques_id;
$ques_user="";
$ques_userimg="";
$ques_des="";
$ques_date;
if(isset($_GET['question_id']) && isset($_GET['question_user']) && isset($_GET['question_userimg']) && isset($_GET['question_date']) && isset($_GET['question_des'])) {
    $ques_id = $_GET['question_id'];
    $ques_user = $_GET['question_user'];
    $ques_userimg=$_GET['question_userimg'];
    $ques_date = $_GET['question_date'];
    $ques_des = urldecode($_GET['question_des']);
}



if (isset($_POST['com'])) {
    $pdf = $_FILES['fileupload']['name'];
    $temp_pdf = $_FILES['fileupload']['tmp_name'];
    $folder = "/answerpdffolder/" . $pdf; // Correct folder path definition

    $ans = $_POST['commenttext'];

    // Check if file is uploaded successfully
    move_uploaded_file($temp_pdf, $_SERVER['DOCUMENT_ROOT'] . $folder);
        $sqll = "INSERT INTO `quescom` (`quescom_quesid`, `quescom_user`, `quescom_userimg`, `quescom_ans`, `quescom_file`, `quescom_date`) VALUES ('$ques_id', '$uname', '$uimg', '$ans', '$pdf', NOW())"; // Correct column name commne_date to comment_date
        $insertt = mysqli_query($conn, $sqll);
        if ($insertt) {
            header("location: questiondetails.php?question_id=$ques_id&question_user=$ques_user&question_userimg=$ques_userimg&question_des=$ques_des&question_date=$ques_date");
        } else {
            // Handle insertion failure
            echo "Error: " . mysqli_error($conn);
        }
    
}



?>