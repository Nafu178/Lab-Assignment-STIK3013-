<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <p>
    <?php
    session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check for login success message
if (isset($_SESSION['login_message'])) {
    $loginMessage = $_SESSION['login_message'];
    unset($_SESSION['login_message']); // Clear the message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>
<body>
    <?php if (!empty($loginMessage)) : ?>
        <script>
            alert("<?= $loginMessage ?>");
        </script>
    <?php endif; ?>

    <h1>Welcome to the Main Page</h1>
    <!-- Page content goes here -->
</body>
</html>



    <h1>Welcome</h1>
    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-top w3-card" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="close_menu()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b>News</b></h3>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="mainpage.php" class="w3-bar-item w3-button">News</a>
            <a href="logout.php" class="w3-bar-item w3-button" >Logout</a>
        </div>
    </nav>
    <!-- Sidebar -->
    <!-- Top hamburger menu -->
    <header class="w3-bar w3-top w3-hide-large w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide"></div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="open_menu()"><i
                class="fa fa-bars"></i></a>
        <div class="w3-hide-large w3-padding-24 w3-wide w3-right">
            <h6>News</h6>
        </div>
    </header>
    <!-- Top hamburger menu -->
    <!-- Content -->
    <div class="w3-main w3-yellow" style="margin-left:250px;height:500px">
        <br>
        <br>
        <h1><b>WARNING!!!</b></h1>
        <h3>Konnichiwa, today's news will be postponed. So please be patient and wait till the next notification.</h3>
    </div>
    <!-- Content -->
    <script>
        function open_menu() {
            document.getElementById("mySidebar").style.display = "block";
        }
        function close_menu() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</body>

</html>