<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>YouTube-Style Comment Section</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    .comment-commentor {
        display: flex;
        margin-bottom: 20px;
    }
    .user-info {
        margin-right: 10px;
    }
    .user-photo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .user-details {
        display: flex;
        align-items: center;
    }
    .user-name {
        font-weight: bold;
    }
    .comment-view {
        flex: 1;
    }
    .comment-text {
        margin-bottom: 10px;
    }
    .file-upload {
        margin-bottom: 10px;
    }
    .file-link {
        display: block;
        margin-bottom: 5px;
        text-decoration: none;
    }
</style>
</head>
<body>

<!-- First Comment -->
<div class="comment-commentor">
    <div class="user-info">
        <img src="userphoto/user1.png" alt="User Photo" class="user-photo">
    </div>
    <div class="user-details">
        <span class="user-name">User1</span>
    </div>
</div>
<div class="comment-view">
    <p class="comment-text">This is the first comment.</p>
    <!-- Uploaded file link -->
    <a href="uploads/file1.pdf" class="file-link" download>Download File</a>
</div>

</body>
</html>
