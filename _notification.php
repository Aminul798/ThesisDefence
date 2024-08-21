<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="headerdropdown.css" rel="stylesheet">

    <style>
      *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }
      .container{
        margin: 2rem;
        width: 700px;
        background-color: var(--Very-light-grayish-blue);
        padding: 1.5rem 1rem;
        border-radius: .5rem;
      }
      header{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
      }
      .notif_box{
        display: flex;
        align-items: center;
      }
      #notification{
        background-color: var(--blue);
        margin-left: .5rem;
        width: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        color:aliceblue;
        font-weight: 800;
        border-radius: .5rem;

      }
      .mark_all{
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background-color:cyan;
        padding: 10px 10px;        
        
      }
      .mark_all:hover{
        color:white;
      }
      main{
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 1200px;
      }
      .notif_card{
        display: flex;
        
        align-items: center;
        border-radius: .5rem;
        background-color: cyan;
        padding:5px;
      }
      .discription{
        margin-left: 1rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
      }
      strong{
        color: darkblue;
        cursor: pointer;

      }
    </style>

    
</head>

<body style="background-color: 	azure;">
    <?php include '_header.php'; ?>


    <script src="bootstrap/jquery-3.7.1.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js" ></script>

  
    <h3 class="title" style="text-align: center; margin:20px; color:red;">Notification</h3>


    <div class="container">

    
    <header>
    <div class="notif_box">
        <span id="notification"></span>
    </div>
    <div class="mark_all"><p>Mark all as read</p></div>
    
    </header>

    <main>
        <div class="notif_card unread">
            <img src="userphoto\shakil.png" alt="avater" height="50px" width="50px" style="border-radius: 50%;">
            <div class="discription">
                <p class="user_activity">
                    <strong>MD Shakill</strong> Commented on your post.
                </p>
                <p class="time">20min ago</p>
            </div>
        </div>
        <div class="notif_card unread">
            <img src="userphoto\shakil.png" alt="avater" height="50px" width="50px" style="border-radius: 50%;">
            <div class="discription">
                <p class="user_activity">
                    <strong>MD Shakill</strong> Replied on your comment.
                </p>
                <p class="time">10min ago</p>
            </div>
        </div>
        <div class="notif_card unread">
            <img src="userphoto\aminul.png" alt="avater" height="50px" width="50px" style="border-radius: 50%;">
            <div class="discription">
                <p class="user_activity">
                    <strong>Aminul Islam</strong> joined the metting.
                </p>
                <p class="time">1min ago</p>
            </div>
        </div>
    </main>



    </div>
  

           
</body>

</html>
