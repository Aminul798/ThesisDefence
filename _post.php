<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="postpage.css">

    <style>
    .comment-user {
        display: flex;
        margin-bottom: 20px;
        
    }
    .user-info {
        margin-right: 0px;
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

    .comment-content {
        flex: 1;
        margin-bottom: 30px;
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
        margin-bottom: 10px;
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
        margin-top: 10px;
        padding-left: 50px;
    }

    input[type="file"] {
        display: none;
    }

    .section{
        height: 55vh;
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
        padding-bottom: 50px;
        padding-left: 50px;
        height: 40vh;
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
    <?php include'custom.php';?>



    <script src="bootstrap/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/proper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>




    <?php
    $picture="";
// Retrieve query parameters
if(isset($_GET['Category_image']) && isset($_GET['category_name']) && isset($_GET['category_id']) && isset($_GET['title']) && isset($_GET['category_description']) && isset($_GET['category_postuser'])&& isset($_GET['user_image']) && isset($_GET['category_created'])) {
    $category_image = $_GET['Category_image'];
    $postuser = $_GET['category_postuser'];
    $post=$_GET['category_id'];
    $userimg = $_GET['user_image'];
    $category_name = urldecode($_GET['category_name']);
    $title = urldecode($_GET['title']);
    $category_description = urldecode($_GET['category_description']);
    $category_created = $_GET['category_created'];


    $mail=$_SESSION['useremail'];
    $uname=$_SESSION['user'];
    $sq="select user_image from `profile` where email='$mail'";
    $res=mysqli_query($conn,$sq);
        
        if ($result) {
            $row = mysqli_fetch_assoc($res);
        
            if ($row) {
                $picture = $row['user_image'];
            } 
        }
        else {
            echo "Query failed: " . mysqli_error($conn);
        }
    
    
    

    echo'
    <div class="section">
    <div class="container">
        <div class="content-section">
            <div class="row user">
                <div class="col-1">
                    <img src="userphoto/'.$userimg.'" width="30px" height="30px"
                        style="border-radius:50%">
                </div>
                <div class="col-4">
                    <span>'.$postuser.'</span>
                </div>
                <div>
                    <span>Posted on: '.$category_created.'</span>
                </div>
            </div>

            <div class="title">
                <p>'.$title.'</p>
            </div>
            <div class="content">
                <p>'.$category_description.'</p>

            </div>
        </div>
        <div class="image-section">
            <img src="categoryphoto/'.$category_image.'">
        </div>
    </div>

    


</div>


<div class="main-comment" style="padding: 2px 50px; margin:250px 100px";>
    <div><p id="error_status"></p></div>
    <textarea name="" id="" rows="1" cols="" class="comment_textbox form-control mb-1"></textarea>
    <button type="button" class="add_comment_btn btn btn-primary" style="margin: 20px 0px;">Comment</button>
    <hr>
    <div class="comment-container">
    
    </div>

</div>
     


    ';

} else {
    echo "Category details not found!";
}




?>



    




    
</body>



</html>
