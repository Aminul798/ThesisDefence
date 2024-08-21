<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="_coursecssquiz.css" rel="stylesheet">

    
</head>

<body style="background-color: 	azure;">
    <?php include '_header.php'; ?>


    <script src="bootstrap/jquery-3.7.1.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js" ></script>

    
        <div class="app">
            <h1>Computer Question</h1>
            <div class="quiz">
                <h2 id="question">Question Title Here</h2>
                <div id="answer-buttons">
                    <button class="butn">Answer1</button>
                    <button class="butn">Answer2</button>
                    <button class="butn">Answer3</button>
                    <button class="butn">Answer4</button>

                </div>
            </div>

            <button id="next-butn">Next</button>

        </div>
       <script src="_coursecssquiz.js"></script>
    <?php include '_footer.php'; ?>  
</body>

</html>
