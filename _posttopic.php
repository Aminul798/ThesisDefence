<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


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
    <div class="m-5">

        <form action="_posttopicdb.php" method="post" enctype="multipart/form-data">

            <div class="d-flex align-items-center p-3">
                <div class="flex-shrink-0">
                    <img src="userphoto/'.$user_image.'" alt="..." width="50px" height="50px" style="border-radius:50%">
                </div>
                <div class="flex-grow-1 ms-3">
                    <h4>'.$uname.'</h4>
                </div>
            </div>



            <div>
                <div class="col-3 "><label>Category: </label></div>
                <div class="col-3">
                    <input type="text" class="form-control" name="category" id="category" aria-label="category"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div>
                <div class="col-3 "><label>Title: </label></div>
                <div class="col-3">
                    <input type="text" class="form-control" name="title" id="title" aria-label="title"
                        aria-describedby="basic-addon1">
                </div>
            </div>


            <div>
                <div><label class="col-3 ">Description: </label></div>
                <div class="text">
                    <textarea name="description" id="description" cols="60" rows="5"></textarea>
                </div>

            </div>

            <div class="mb-3">
                <div class="col-3"><label>Images: </label></div>
                <div class="col-3">
                    <input type="file" class="form-control" name="image" id="image" aria-label="image"
                        aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">Post</button>
            </div>

        </form>
    </div>';




    ?>








    <?php include'_footer.php'; ?>

</body>

</html>