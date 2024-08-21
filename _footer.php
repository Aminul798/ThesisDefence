<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      margin: 0;
      padding: 0;
    }
    .wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Changed to 100vh for full viewport height */
      position: relative; /* Added position relative */
    }
    .container-fluid {
      flex: 1;
    }
    .footer {
      position: fixed;
      bottom: 0; /* Added to stick to the bottom */
      background-color: #343a40;
      color: #ffffff;
      text-align: center;
      padding: 0 0;
      width: 100%; /* Added to stretch across the viewport */
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="container-fluid">
      <!-- Your content here -->
    </div>

    <footer class="footer">
      <div class="container">
        <span class="text-center">Copyright MBSTU CSE Discussion Forum 2024</span>
      </div>
    </footer>
  </div>

  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
