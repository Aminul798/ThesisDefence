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
    ';


} else {
    echo "Category details not found!";
}


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



?>



    <div class="all">
        <div class="allinside">

        <?php echo '<form action="_comment.php?Category_image='.urlencode($category_image).'&category_id='.$post.'&category_name='.urlencode($category_name).'&title='.urlencode($title).'&category_description='.urlencode($category_description).'&category_postuser='.urlencode($postuser).'&user_image='.urlencode($userimg).'&category_created='.$category_created.'" method="post" enctype="multipart/form-data">
            <div class="comment-user">
                <div class="user-info">
                <img src="userphoto/'.$picture.'" name="commentuserimg" id="commentuserimg" class="user-photo">
                </div>
                <div class="user-details">
                    <span class="user-name" name="commentuser" id="commentuser">'.$uname.'</span>
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


        <?php
                $sqlli="SELECT * FROM `comment` WHERE post_id = $post ORDER BY comment_id DESC;";
                $rresult=mysqli_query($conn,$sqlli);
                if($rresult)
                {
                    while($rows=mysqli_fetch_assoc($rresult))
                    {
                        $commnt=$rows['comment'];
                        $pdfile=$rows['file'];
                        $usr=$rows['commnetor'];
                        $usph=$rows['userphpto'];


                        echo' <div class="commentsection">
                        <div class="comment-commentor">
                            <div class="user-info">
                                <img src="userphoto/'.$usph.'" alt="User Photo" class="user-photo">
                            </div>
                            <div class="user-details">
                                <span class="user-name">'.$usr.'</span>
                            </div>
                        </div>
                        <div class="comment-view">
                            <p class="comment-text">'.$commnt.'</p>
                            <a href="pdffolder/'.$pdfile.'" class="file-link" download>'.$pdfile.'</a>
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