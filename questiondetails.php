<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>




.section {
        height: fit-content;
        width: 80vw;
        border: 0px solid black;
        border-radius: 10px;
        padding: 5px;
        margin-left: 100px;
        margin-bottom: 10px;
        background-color: lightcyan;
        margin-top: 50px;
    }

    .content-section {
        margin: 0px;
    }

    .imgg {
        margin-right: 0px;
    }
    .comment-user {
        display: flex;
        margin-bottom: 5px;
        
    }
    .user-info {
        margin-right: 0px;
        display: flex;
        align-items: center;
    }
    .user-photo {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-details {
        display: flex;
        align-items: center;
    }
    .title{
        margin-left: 20px;
    }
    .title p{
        text-decoration: none;
        font-size: 20px;
        color: orangered;
    }







    .comment-user {
        display: flex;
        margin-bottom: 20px;
        
    }
    

    .comment-content {
        flex: 1;
        margin-bottom: 5px;
    }

    .comment-commentor {
        display: flex;
        margin-bottom: 0px;
    }

    

    .comment-textarea {
        width: 40%;
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .file-upload {
        margin-bottom: 3px;
    }
    .comment-view {
        flex: 1;
        margin-left: 50px;
        margin-top: -10px;
        padding-left: 30px;
    }

    .comment-text {
        margin-bottom: 0px;
        margin-top: 5px;
    }

    .file-link {
        display: block;
        margin-bottom: 5px;
        text-decoration: none;
    }

    .commentsection {
        margin-top: 5px;
        padding-left: 200px;
    }

    input[type="file"] {
        display: none;
    }
    label {
        display: inline-block;
        color: #fff;
        background: turquoise;
        text-align: center;
        padding: 6px 10px;
        font-size: 12px;
        height: 32px;
        letter-spacing: 1.5px;
        border-radius: 10px 10px;
    }

    .com {
        font-family: "Roboto", sans-serif;
        font-size: 13px;
        background: turquoise;
        width: 120px;
        letter-spacing: 1.5px;
        height: 32px;
        padding: 2px 2px;
        text-align: center;
        color: #fff;
        border-radius: 10px;
        border: none;

    }

    .all{
        background-color:azure;
        margin-top: -20px;
        padding-bottom: 0px;
        padding-left: 50px;
        height: 30vh;
    }
    .allinside{
        padding-top: 50px;
        margin-left: 50px;
        margin-top: 30px;
    }

    </style>


</head>

<body style="background-color: 	azure;">


    <?php include'_header.php';?>
    <?php include'_dbconnectcard.php';?>



    <script src="bootstrap/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/proper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>




    <?php
    $ques_id;
    $ques_user="";
    $ques_userimg="";
    $ques_des="";
    $ques_date;
// Retrieve query parameters
if(isset($_GET['question_id']) && isset($_GET['question_user']) && isset($_GET['question_userimg']) && isset($_GET['question_date']) && isset($_GET['question_des'])) {
    $ques_id = $_GET['question_id'];
    $ques_user = $_GET['question_user'];
    $ques_userimg=$_GET['question_userimg'];
    $ques_date = $_GET['question_date'];
    $ques_des = urldecode($_GET['question_des']);
    
    echo'
    <div class="section">
        <div class="content-section">
           <div class="comment-user">
                    <div class="user-info">
                       <img src="userphoto/'.$ques_userimg.'" class="user-photo">
                    </div>
                    <div class="user-details">
                        <span class="user-name">'.$ques_user.'</span>
                    </div>
                    <div class="title">
                        <p>'.$ques_des.'</p>
                    </div>
            </div>
        </div>
    </div>
    ';


}
 else {
    echo "details not found!";
}



?>

<?php
$ans_userimg="";
$ans_user="";

$mail=$_SESSION['useremail'];
$sq="select username,user_image from `profile` where email='$mail'";
$res=mysqli_query($conn,$sq);
    
    if ($result) {
        $row = mysqli_fetch_assoc($res);
    
        if ($row) {
            $ans_userimg = $row['user_image'];
            $ans_user = $row['username'];
        } 
    }
    else {
        echo "Query failed: " . mysqli_error($conn);
    }



?>




    <div class="all">
        <div class="allinside">

        <?php echo '<form action="answer.php?question_id='.$ques_id.'&question_user='.urlencode($ques_user).'&question_userimg='.urlencode($ques_userimg).'&question_des='.urlencode($ques_des).'&question_date='.$ques_date.'" method="post" enctype="multipart/form-data">
            <div class="comment-user">
                <div class="user-info">
                <img src="userphoto/'.$ans_userimg.'" name="commentuserimg" id="commentuserimg" class="user-photo">
                </div>
                <div class="user-details">
                    <span class="user-name" name="commentuser" id="commentuser">'.$ans_user.'</span>
                </div>
            </div>

            <div class="comment-content">
                <textarea class="comment-textarea" rows="1" name="commenttext" id="commenttext" placeholder="Write your comment..."></textarea>
                <br>
                <input type="file" class="file-upload" accept=".pdf" id="fileupload" name="fileupload">
                <label for="fileupload">Upload File</label>
                <button type="submit" class="com" id="com" name="com">Comment</button>
            </div>
        </form>'; ?>


        
       
        </div>

    </div>


    <?php
                $sqlli="SELECT * FROM `quescom` WHERE quescom_quesid = $ques_id ORDER BY quescom_ansid DESC;";
                $rresult=mysqli_query($conn,$sqlli);
                if($rresult)
                {
                    while($rows=mysqli_fetch_assoc($rresult))
                    {
                        $ans=$rows['quescom_ans'];
                        $pdfile=$rows['quescom_file'];
                        $user=$rows['quescom_user'];
                        $userph=$rows['quescom_userimg'];


                        echo' <div class="commentsection">
                        <div class="comment-commentor">
                            <div class="user-info">
                                <img src="userphoto/'.$userph.'" alt="User Photo" class="user-photo">
                            </div>
                            <div class="user-details">
                                <span class="user-name">'.$user.'</span>
                            </div>
                        </div>
                        <div class="comment-view">
                            <p class="comment-text">'.$ans.'</p>
                            <a href="answerpdffolder/'.$pdfile.'" class="file-link" download>'.$pdfile.'</a>
                        </div>
            
                    </div>';
                    }
                }

        ?>

       
        </div>

    </div>













<?php include'_footer.php'; ?>

</body>

</html>