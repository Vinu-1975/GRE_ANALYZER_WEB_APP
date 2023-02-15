<?php
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    $applicantID = $_POST['applid'];
    $password = $_POST['password'];

    $sql = "Select * from users where appl_id='$applicantID' and password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $applicantID;
        header('location: ../Main/home.php');
    } else {
        $showError = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./alerts.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .top {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: auto;
        }

        .top div {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="top">
        <?php
        if ($login) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($showError) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' . $showError . '
        <strong>Error!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
    </div>

    <div class="wrapper">
        <div class="image">
        </div>
        <div class="login-wrapper">
            <header>
                <h1>Login</h1>
                <a href="./signup.php">Sign up?</a>
            </header>
            <div class="inputs">
                <form action="/GRE ANALYSER/Login or Signup/login.php" method="post">
                    <p>Applicant ID:</p>
                    <input type="text" name="applid"><br>
                    <p>Password:</p>
                    <input type="password" name="password">
                    <input type="submit" value="Login" id="login">
                </form>
            </div>
        </div>
    </div>
    <script src="./jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>