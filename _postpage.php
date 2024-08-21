<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Comment and File Upload Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
    }
    .comment-section {
        margin-bottom: 20px;
    }
    .comment {
        margin-bottom: 10px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    .comment p {
        margin: 5px 0;
    }
    .file-upload {
        margin-bottom: 20px;
    }
</style>
</head>
<body>

<div class="container">
    <div class="comment-section">
        <h2>Comments</h2>
        <div class="comment">
            <p>User 1: This is a great page!</p>
        </div>
        <div class="comment">
            <p>User 2: I agree, it's very useful.</p>
        </div>
        <!-- More comments can be added dynamically -->
    </div>

    <form class="file-upload" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>

    <!-- Uploaded files will be displayed here -->
    <div id="uploaded-files"></div>
</div>

</body>
</html>
