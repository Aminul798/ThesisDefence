<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
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
    .title a{
        text-decoration: none;
        align-items: center;
        font-size: 20px;
        color: orangered;
    }
    .nnnn{
        margin-left: 100px;
        margin-top: 20px;
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

    $mail = $_SESSION['useremail'];
    $sql = "SELECT username, user_image FROM `profile` WHERE email='$mail'";
    $result = mysqli_query($conn, $sql);

    $user_image="";
    $uname="";
    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $uname = $row['username'];
            $user_image = $row['user_image'];
            } 
    } 
    else {
    echo "Query failed: " . mysqli_error($conn);
    }


   
echo'
    <div class="mt-4 ms-5 mb-5">

        <form action="_askq.php" method="post" enctype="multipart/form-data">
        
            <div class="d-flex align-items-center">
                <div class="" style="width: 50px;">
                    <img src="userphoto/'.$user_image.'" alt="..." width="30px" height="30px" style="border-radius:50%">
                </div>
                <div class="me-3" style="width: 50px;">
                    <h6>'.$uname.'</h6>
                </div>
                <div class="d-flex align-items-center" style="width: 600px;">

                    <div class="ms-5">
                        <input type="text" class="form-control" name="question" placeholder="Ask a question..." id="question" aria-label="question" style="width: 400px;">
                    </div>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Ask</button>
                </div>

            </div>
        </form>

    </div>';




    ?>









   

        <?php

                $rsql = "SELECT * FROM `question`";
                $rresult=mysqli_query($conn,$rsql);
                $num_rows=(mysqli_num_rows($rresult)/4) +1;
                $num_rows=ceil($num_rows)-2;
                
                if(isset($_GET['pageno']))
                {
                    $get_pageno=$_GET['pageno'];
                    $offset=$get_pageno*4; 
                    $page_inc=$get_pageno+1;
                    $page_dec=$get_pageno-1;
                }
                else{
                    $offset=0;
                    $get_pageno=0;
                    $page_inc=1;
                    $page_dec=-1;
                }


                $sql = "SELECT * FROM `question` ORDER BY question_id DESC LIMIT 4 OFFSET $offset";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    $ques_id=$row['question_id'];
                    $ques_user=$row['question_user'];
                    $ques_userimg=$row['question_userimg'];
                    $ques_date=$row['question_date'];
                    $ques_des=$row['question_des'];
                   

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
                                    <a href="questiondetails.php?question_id='.$ques_id.'&question_user='.urlencode($ques_user).'&question_userimg='.urlencode($ques_userimg).'&question_des='.urlencode($ques_des).'&question_date='.$ques_date.'">'.$ques_des.'</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                
                
                }

                
                    echo'
                <div class="nnnn">
                <nav aria-label="Page navigation example">
                 <ul class="pagination">';
                 if($page_dec<0)
                 {
                    echo'<li class="page-item"><a class="page-link"style="background-color: azure;">Previous</a></li>';

                 }
                 else
                 {
                    echo'<li class="page-item"><a class="page-link" href="question.php?pageno='.$page_dec.'"style="background-color: 	azure;">Previous</a></li>';

                 }
                    for($i=0;$i<3;$i++)
                    {
                            echo'<li class="page-item"><a class="page-link" href="question.php?pageno='.$i.'" style="background-color: azure;">'.($i+1).'</a></li>';
                    }

                    if($page_inc>$num_rows)
                 {
                    echo'<li class="page-item"><a class="page-link"style="background-color: azure;">Next</a></li>';

                 }
                 else
                 {
                   echo' <li class="page-item"><a class="page-link" href="question.php?pageno='.$page_inc.'" style="background-color: 	azure;">Next</a></li>';

                 }
                     
                    echo'
                 </ul>
                </nav>
            </div>';
?>
































        <?php include'_footer.php'; ?>

</body>

</html>