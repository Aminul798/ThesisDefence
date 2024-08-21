<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Forum</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .exp{
        background: powderblue;
        text-align: center;
        padding: 3px 10px;
        height: 30px;
        user-select: none;
        letter-spacing: 1.5px;
        border-radius: 10px 10px;
        }
        .exp a{
        color: dodgerblue;
        text-decoration: none;
        font-size: 14px;
        user-select: none;
        letter-spacing: 1.5px;
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
    echo'<div class="container mb-5">';
    if(isset($_GET['category_name']))
    {
        $cate=$_GET['category_name'];
        echo'<h2 class="text-center m-4">'.$cate.'</h2>';
    }
 ?>
        <div class="row">

            <?php

                $rsql = "SELECT * FROM `category`WHERE category_name='$cate'";
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


                $sql = "SELECT * FROM `category` WHERE category_name='$cate' LIMIT 4 OFFSET $offset";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($result))
                {
                    $c_id=$row['Category_image'];
                    $post=$row['category_id'];
                    $user=$row['category_postuser'];
                    $c_nm=$row['category_name'];
                    $c_ttl=$row['title'];
                    $c_des=$row['category_description'];
                    $c_dt=$row['category_created'];
                   


                    $sql2 = "SELECT user_image FROM `profile` WHERE username='$user'";
                    $result2 = mysqli_query($conn, $sql2);
                    $user_image = "";
                    if ($result2 && mysqli_num_rows($result2) > 0) {
                    $row2 = mysqli_fetch_assoc($result2);
                    $user_image = $row2['user_image'];
                    }

                   

                    echo'<div class="col-3 mb-5">
                    <div class="card" style="width: 16rem;height:25rem;background-color:azure;">
                    <img src="categoryphoto/'.$row['Category_image'].'" height="200px"  class="card-img-top" alt="'.$c_nm.'">
                        <div class="card-body pt-3 pl-3 pb-0">
                            <h5 class="card-title">'.$c_ttl.'</h5>
                            <p class="card-text">'.substr($c_des,0,50).'...</p>  
                        </div>
                        <span class="align-text-bottom ms-3">'.$c_dt.'</span>
                        <p class="m-2 exp mb-3"><a href="_post.php?Category_image='.urlencode($c_id).'&category_id='.$post.'&category_name='.urlencode($c_nm).'&title='.urlencode($c_ttl).'&category_description='.urlencode($c_des).'&category_postuser='.urlencode($user).'&user_image='.urlencode($user_image).'&category_created='.$c_dt.'">Explore</a></p>
                        
                    </div>
                    </div>';
                    
                }

        
                    echo'
                <div class="mb-5">
                <nav aria-label="Page navigation example">
                 <ul class="pagination">';
                 if($page_dec<0)
                 {
                    echo'<li class="page-item"><a class="page-link"style="background-color: 	azure;">Previous</a></li>';

                 }
                 else
                 {
                    echo'<li class="page-item"><a class="page-link" href="_samecategory.php?pageno='.$page_dec.'&category_name='.urlencode($cate).'"style="background-color: 	azure;">Previous</a></li>';

                 }
                    for($i=0;$i<3;$i++)
                    {
                            echo'<li class="page-item"><a class="page-link" href="_samecategory.php?pageno='.$i.'&category_name='.urlencode($cate).'"style="background-color: 	azure;">'.($i+1).'</a></li>';
                    }

                    if($page_inc>$num_rows)
                 {
                    echo'<li class="page-item"><a class="page-link"style="background-color: 	azure;">Next</a></li>';

                 }
                 else
                 {
                   echo' <li class="page-item"><a class="page-link" href="_samecategory.php?pageno='.$page_inc.'&category_name='.urlencode($cate).'"style="background-color: 	azure;">Next</a></li>';

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