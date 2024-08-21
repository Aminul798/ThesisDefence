<?php
session_start();
$a=$_SESSION['useremail'];
echo'welcome .$a.';
echo'Login successfully';

?>





<script src="bootstrap/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/proper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">



echo'<img src="categoryphoto/'.$category_image.'" alt="" height="300px" width="600px" style="float:right">';


    echo'<div class="d-flex align-items-center p-3">
    <div class="flex-shrink-0">
        <img src="userphoto/'.$userimg.'" alt="..." width="30px" height="30px" style="border-radius:50%">
    </div>
    <div class="flex-grow-1 ms-3">
    <p>'.$postuser.'</p>
    </div>
    </div>';

    
  echo '<div class="m-3">
  <h3>'.$category_name.'</h3>
  <p>'.$category_description.'</p>
  </div>';


  <div class="container-fluid bg-dark text-light">
    <p class="text-center">Copyright MBSTU CSE Discussion Forum 2024</p>
</div>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>


    <?php include'_header.php';?>
    <?php include'_dbconnectcard.php';?>



    <script src="bootstrap/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/proper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>



    <div class="container mb-5">
        <h2 class="text-center m-3">Categories</h2>
        <div class="row justify-content-center">

            <?php

                if(isset($_GET['pageno']))
                {
                    $get_pageno=$_GET['pageno'];
                    $offset=$get_pageno*4; 
                    $page_inc=$get_pageno+1;
                    $page_dec=$get_pageno-1;
                }
                else{
                    $offset=0;
                    $get_pageno=1;
                    $page_inc=1;
                    $page_dec=-1;
                }


                $countSql = "SELECT COUNT(DISTINCT `category_name`) AS total FROM `category`";
                 $countResult = mysqli_query($conn, $countSql);

                 if ($countResult) {
                     $countRow = mysqli_fetch_assoc($countResult);
                     $totalRows = $countRow['total'];
                     //echo"$totalRows";
                } else {
                     echo "Error: " . mysqli_error($conn);
                }
                $num_rows=ceil($totalRows/4);
               // echo"$num_rows";

            $offset = ($get_pageno - 1) * 4;

            $rsql = "SELECT `category_name`
                    FROM `category`
                    GROUP BY `category_name`
                    ORDER BY `category_name`
                    LIMIT 4
                    OFFSET $offset";

            $rresult = mysqli_query($conn, $rsql);

            if ($rresult) {
                 while ($row = mysqli_fetch_assoc($rresult)) {
                    $cat=$row['category_name'];

                 $sql2 = "SELECT Category_image FROM `category` WHERE category_name='$cat'";
                 $result2 = mysqli_query($conn, $sql2);
                 $user_image = "";
                 if ($result2 && mysqli_num_rows($result2) > 0) {
                     $row2 = mysqli_fetch_assoc($result2);
                     $user_image = $row2['Category_image'];

                     echo'<div class="col-3 mb-5">
                    <div class="card" style="width: 16rem;height:15rem;">
                    <img src="categoryphoto/'.$user_image.'" height="150px"  class="card-img-top" alt="'.$cat.'">
                        <div class="card-body pt-3 pl-3 pb-0">
                            <h5 class="card-title">'.$cat.'</h5>
                        </div>
                        <p class="m-2"><a href="_samecategory.php?category_name='.urlencode($cat).'">Explore</a></p>
                    </div>
                    </div>';


                 }
                 

                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }

      
    ?>


    </div>
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="mb-5">
            <nav aria-label="Page navigation example">

                <ul class="pagination">
                    <?php

                    if($page_dec<1)
                 {
                    echo'<li class="page-item"><a class="page-link">Previous</a></li>';

                 }
                 else
                 {
                    echo'<li class="page-item"><a class="page-link" href="_index.php?pageno='.$page_dec.'">Previous</a></li>';

                 }
                    for($i=1;$i<4;$i++)
                    {
                            echo'<li class="page-item"><a class="page-link" href="_index.php?pageno='.$i.'">'.$i.'</a></li>';
                    }

                    if($page_inc>$num_rows)
                 {
                    echo'<li class="page-item"><a class="page-link">Next</a></li>';

                 }
                 else
                 {
                   echo' <li class="page-item"><a class="page-link" href="_index.php?pageno='.$page_inc.'">Next</a></li>';

                 }
                        
                    
                 ?>
                 </ul>
                </nav>
                </div>
            </div>
        </div>
</div>
















-------------------------------------------------------------

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>


    <?php include'_header.php';?>
    <?php include'_dbconnectcard.php';?>



    <script src="bootstrap/jquery-3.7.1.min.js"></script>
    <script src="bootstrap/proper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>



    <div class="container mb-5">
        <h2 class="text-center m-3">Categories</h2>
        <div class="row">

            <?php

                if(isset($_GET['pageno']))
                {
                    $get_pageno=$_GET['pageno'];
                    $offset=$get_pageno*4; 
                    $page_inc=$get_pageno+1;
                    $page_dec=$get_pageno-1;
                }
                else{
                    $offset=0;
                    $get_pageno=1;
                    $page_inc=1;
                    $page_dec=-1;
                }


                $countSql = "SELECT COUNT(DISTINCT `category_name`) AS total FROM `category`";
                 $countResult = mysqli_query($conn, $countSql);

                 if ($countResult) {
                     $countRow = mysqli_fetch_assoc($countResult);
                     $totalRows = $countRow['total'];
                     //echo"$totalRows";
                } else {
                     echo "Error: " . mysqli_error($conn);
                }
                $num_rows=ceil($totalRows/4);
               // echo"$num_rows";

            $offset = ($get_pageno - 1) * 4;

            $rsql = "SELECT `category_name`
                    FROM `category`
                    GROUP BY `category_name`
                    ORDER BY `category_name`
                    LIMIT 4
                    OFFSET $offset";

            $rresult = mysqli_query($conn, $rsql);

            if ($rresult) {
                 while ($row = mysqli_fetch_assoc($rresult)) {
                    $cat=$row['category_name'];

                 $sql2 = "SELECT Category_image FROM `category` WHERE category_name='$cat'";
                 $result2 = mysqli_query($conn, $sql2);
                 $user_image = "";
                 if ($result2 && mysqli_num_rows($result2) > 0) {
                     $row2 = mysqli_fetch_assoc($result2);
                     $user_image = $row2['Category_image'];

                     echo'<div class="col-3 mb-5">
                    <div class="card" style="width: 16rem;height:15rem;">
                    <img src="categoryphoto/'.$user_image.'" height="150px"  class="card-img-top" alt="'.$cat.'">
                        <div class="card-body pt-3 pl-3 pb-0">
                            <h5 class="card-title">'.$cat.'</h5>
                        </div>
                        <p class="m-2"><a href="_samecategory.php?">Explore</a></p>
                    </div>
                    </div>';


                 }
                 

                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
          
                    echo'
                <div class="mb-5">
                <nav aria-label="Page navigation example">
                 <ul class="pagination">';
                 if($page_dec<1)
                 {
                    echo'<li class="page-item"><a class="page-link">Previous</a></li>';

                 }
                 else
                 {
                    echo'<li class="page-item"><a class="page-link" href="_categorytype.php?pageno='.$page_dec.'">Previous</a></li>';

                 }
                    for($i=1;$i<4;$i++)
                    {
                            echo'<li class="page-item"><a class="page-link" href="_categorytype.php?pageno='.$i.'">'.$i.'</a></li>';
                    }

                    if($page_inc>$num_rows)
                 {
                    echo'<li class="page-item"><a class="page-link">Next</a></li>';

                 }
                 else
                 {
                   echo' <li class="page-item"><a class="page-link" href="_categorytype.php?pageno='.$page_inc.'">Next</a></li>';

                 }
                     
                    echo'
                 </ul>
                </nav>
            </div>';
?>

        </div>
    </div>




    <?php include'_footer.php'; ?>

</body>

</html>




    <?php include'_footer.php'; ?>

</body>

</html>




---------------------------------------------------post-----------------

echo'<div> <div style="float:left">
    <div class="d-flex align-items-center ms-3 mt-3">
    <div class="flex-shrink-0">
        <img src="userphoto/'.$userimg.'" alt="..." width="30px" height="30px" style="border-radius:50%">
    </div>

    <div class="flex-grow-1 ms-3">
    <p>'.$postuser.'</p>
    </div>
    </div>


    <div class="ms-3 mt-3">
    <div class="flex-shrink-0">  <h4>'.$title.'</h4>

    </div>

    <div class="ms-1">
    <p >'.$category_description.'</p>
    </div>
    </div>


    
  ';

    echo '<div><p class="ms-3">Created: '.$category_created.'</p></div> </div>';

    echo'<div class="image" style="float:right"><img src="categoryphoto/'.$category_image.'" alt="" height="300px" width="600px"></div> ';












