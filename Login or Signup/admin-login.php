<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    $adminID = $_POST['id'];
    $password = $_POST['password'];

    $sql = "Select * from admins where name='$adminID' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['adminloggedin'] = true;
        $_SESSION['adminid'] = $adminID;
        header('location: ../Admin page/Admin-page.php');
    } else {
        $showError = "Invalid Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Login-Portal</title>
    <!-- css  -->
    <link rel="stylesheet" href="./css/adminLogin.css">
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <header>
                <h1>Admin Login</h1>
            </header>
            <div class="inputs">
                <form action="/GRE ANALYSER/Login or Signup/admin-login.php" name="adminform" method="post">
                    <input type="text" placeholder="Enter AdminID" name="id" required>
                    <input type="password" placeholder="Enter Password" name="password" required>
                    <input type="submit" value="Login" id="admin_login">
                </form>
            </div>
        </div>
    </div>
    <script>
        // console.log(admin_login)
        // admin_login.addEventListener('click', function(e){
        //     e.preventDefault();
        //     window.location.href='../../Main/Admin page/Admin-page.html';
        // })
    </script>
</body>

</html>