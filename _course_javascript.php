<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="headerdropdown.css" rel="stylesheet">

    
</head>

<body style="background-color: 	azure;">
    <?php include '_header.php'; ?>


    <script src="bootstrap/jquery-3.7.1.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js" ></script>

    <div class="wrapper">
      <div class="sidebar">
        <h2>Courses</h2>
        <ul>
        <li><a href="_course.php" >Computer Science</a></li>
          <li><a href="_course_javascript.php" >JavaScript</a></li>
          <li><a href="_course_php.php" >PHP</a></li>
          <li><a href="_course_mysql.php" >MySQL</a></li>
          <li><a href="_couresecss.php" >CSS</a></li>
        </ul>
      </div>
      <div class="main_content">
        <div class="header">Computer Science Video Tutorials</div>

        <div class="container">
          <div class="main-video">
            <div class="video">
              <video src="CourseVideo/1.mp4" controls muted autoplay></video>
              <h3 class="title">0.1 Introduction</h3>
            </div>
          </div>

          <div class="video-list">
            <div class="vid">
            <video src="CourseVideo/1.mp4" muted></video>
            <h3 class="title">0.1 Introduction</h3>
            <p  class="hidetext" hidden>
          Introduction  Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/2.mp4" muted></video>
            <h3 class="title">0.2 Second Lecture</h3>
            <p  class="hidetext" hidden>
           Second   Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/3.mp4" muted></video>
            <h3 class="title">0.3 Third Lecture</h3>
            <p  class="hidetext" hidden>
          Third Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/4.mp4" muted></video>
            <h3 class="title">0.4 Forth Lecture</h3>
            <p  class="hidetext" hidden>
           Fourth Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/5.mp4" muted></video>
            <h3 class="title">0.5 Fifth Lecture</h3>
            <p  class="hidetext" hidden>
          Fifth Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/6.mp4" muted></video>
            <h3 class="title">0.6 Sixth Lecture</h3>
            <p  class="hidetext" hidden>
          Sixth Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.
          </p>
            </div>

            </div>
          </div>

        </div>

        
        


      </div>

      <div class="text">
          <p class="description" style="margin-bottom: 50px;">
          Introduction  Computer science is the study of computers and computing as well as their theoretical and practical applications. Computer science applies the principles of mathematics, engineering, and logic to a plethora of functions, including algorithm formulation, software and hardware development, and artificial intelligence.

          </p>
          <div class="butn" style="background-color: royalblue; padding:20px 40px; display:inline;margin-left:40%; border-radius:10px;">
          <a href="_computerquiz.php" style="text-decoration: none; color:white">Give Quiz</a>
        </div>
        </div>

        

        

        


    </div>

    <script type="text/javascript">
      let listVideo=document.querySelectorAll(".video-list .vid");
      let mainVideo=document.querySelector(".main-video video");
      let title=document.querySelector(".main-video .title");
      let hide=document.querySelector(".main-video .hidetext");
      let hidetwo=document.querySelector(".text .description");

      listVideo.forEach(video => {
        video.onclick = () =>{
          listVideo.forEach(vid=> vid.classList.remove("active"));
          video.classList.add("active");
          if(video.classList.contains("active")){
            let src=video.children[0].getAttribute("src");
            mainVideo.src=src;
            let text=video.children[1].innerHTML;
            title.innerHTML=text;
            let hiddentxt=video.children[2].innerHTML;
            hidetwo.innerHTML=hiddentxt;

          }

        }
        
      });
     
    </script>
    
           
    <?php include '_footer.php'; ?>
</body>

</html>
