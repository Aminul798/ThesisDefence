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
    <?php include '_header.php'; ?>
    <?php include '_dbconnectcard.php'; ?>
    <div class="container mb-5" style="height:fit-content">
        <h2 class="text-center m-3">Categories</h2>
        <div class="row justify-content-center">
            <?php
            if (isset($_GET['pageno'])) {
                $get_pageno = $_GET['pageno'];
                $offset = $get_pageno * 8;
                $page_inc = $get_pageno + 1;
                $page_dec = $get_pageno - 1;
            } else {
                $offset = 0;
                $get_pageno = 1;
                $page_inc = 2;
                $page_dec = -1;
            }
            $countSql = "SELECT COUNT(DISTINCT `category_name`) AS total FROM `category`";
            $countResult = mysqli_query($conn, $countSql);
            if ($countResult) {
                $countRow = mysqli_fetch_assoc($countResult);
                $totalRows = $countRow['total'];
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            $num_rows = ceil($totalRows / 8);
            $offset = ($get_pageno - 1) * 8;
            $rsql = "SELECT `category_name`
                    FROM `category`
                    GROUP BY `category_name`
                    ORDER BY `category_name`
                    LIMIT 8
                    OFFSET $offset";
            $rresult = mysqli_query($conn, $rsql);
            if ($rresult) {
                while ($row = mysqli_fetch_assoc($rresult)) {
                    $cat = $row['category_name'];
                    $sql2 = "SELECT Category_image FROM `category` WHERE category_name='$cat'";
                    $result2 = mysqli_query($conn, $sql2);
                    $user_image = "";
                    if ($result2 && mysqli_num_rows($result2) > 0) {
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_image = $row2['Category_image'];
                        echo '<div class="col-3 mb-5" >
                                <div class="card" style="width: 16rem;height:17rem; background-color:azure">
                                    <img src="categoryphoto/' . $user_image . '" height="150px"  class="card-img-top" alt="' . $cat . '">
                                    <div class="card-body pt-3 pl-3 pb-0">
                                        <h5 class="card-title">' . $cat . '</h5>
                                    </div>
                                    <p class="m-2 exp"><a href="_samecategory.php?category_name=' . urlencode($cat) . '">Explore</a></p>
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
            <div class="col">
                <div class="mb-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php
                            if ($page_dec < 1) {
                                echo '<li class="page-item" ><a class="page-link" style="background-color: 	azure;">Previous</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="_index.php?pageno=' . $page_dec . '" style="background-color: 	azure;">Previous</a></li>';
                            }
                            for ($i = 1; $i < 4; $i++) {
                                echo '<li class="page-item"><a class="page-link" href="_index.php?pageno=' . $i . '" style="background-color: 	azure;">' . $i . '</a></li>';
                            }
                            if ($page_inc > $num_rows) {
                                echo '<li class="page-item"><a class="page-link" style="background-color: 	azure;">Next</a></li>';
                            } else {
                                echo ' <li class="page-item"><a class="page-link" href="_index.php?pageno=' . $page_inc . '" style="background-color: 	azure;">Next</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php include '_footer.php'; ?>
</body>

</html>
