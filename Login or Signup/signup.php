<?php
$showAlert = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';

    $applicantID = $aadharNo = $email = $phoneNumber = $dob = $gender = $userName = $password = "";
    $nameErr = $emailErr = $idErr = $aadharErr = $genderErr = $dobErr = $passwordErr = $phoneErr = $newdob = false;

    // $applicantID = test_input($_POST['id']);
    // $aadharNo = test_input($_POST['aadhar']);
    // $email = test_input($_POST['email']);
    // $phoneNumber = test_input($_POST['phno']);
    // $dob = test_input($_POST['dob']);
    // $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    // $userName = test_input($_POST['username']);
    // $password = test_input($_POST['password']);


    if (empty($_POST["username"])) {
        $nameErr = "UserName is required";
    } else {
        $userName = $_POST["username"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["id"])) {
        $idErr = "Applicant ID cannot be empty";
    } else {
        $applicantID = $_POST["id"];
    }

    if (empty($_POST["aadhar"])) {
        $aadharErr = "Aadhar cannot be empty";
    } else {
        $aadharNo = $_POST["aadhar"];
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of Birth is required";
    } else {
        $dob = $_POST["dob"];
        $newdob = date("Y-m-d", strtotime($dob));
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["phno"])) {
        $phoneErr = "Phone Number is required";
    } else {
        $phoneNumber = $_POST["phno"];
    }
    $sql1 = "INSERT INTO `r11` (`applicant_id`, `aadhar_no`, `dob`, `gender`, `email`, `phone_number`, `attempt_no`, `rank`, `score`,`username`) VALUES ('$applicantID', '$aadharNo', '$newdob', '$gender', '$email', '$phoneNumber', NULL, NULL, NULL,'$userName');";
    $result = mysqli_query($conn, $sql1);
    $flag1 = $flag2 = $flag3=0;
    if ($result) {
        $flag = 1;
    }
    $sql2 = "INSERT INTO `users` (`appl_id`, `password`, `datetime`) VALUES ('$applicantID', '$password', current_timestamp());";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        $flag2 = 1;
    }
    $sql3="INSERT INTO score(test_id) VALUES ('$applicantID');";
    $result3=mysqli_query($conn, $sql3);
    if ($flag1 == 1 && $flag2 == 1) {
        $showAlert = true;
    } else {
        $showError = "Account Created";
    }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./style2.css">
    <link rel="stylesheet" href="./alerts.css">
</head>

<body>
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $showError . '
        <strong>Success!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="wrapper">

        <div class="image">
        </div>
        <div class="container">
            <header>
                Signup Form
                <br>
                <a href="./login.php">Login?</a>
            </header>
            <div class="progress-bar">
                <div class="step">
                    <p>Name</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Contact</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Birth</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Submit</p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-outer">
                <form action="/GRE ANALYSER/Login or Signup/signup.php" method="post">
                    <div class="page slide-page">
                        <div class="title">Basic Info:</div>
                        <div class="field">
                            <div class="label">Applicant ID</div>
                            <input type="text" name="id"><br>
                        </div>
                        <div class="field">
                            <div class="label">Aadhar No.</div>
                            <input type="text" name="aadhar">

                        </div>
                        <div class="field">
                            <button class="firstNext next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <div class="title">Contact Info:</div>
                        <div class="field">
                            <div class="label">Email Address</div>
                            <input type="text" id="email" name="email">

                        </div>
                        <div class="field">
                            <div class="label">Phone Number</div>
                            <input type="Number" name="phno">

                        </div>
                        <div class="field btns">
                            <button class="prev-1 prev">Previous</button>
                            <button class="next-1 next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <div class="title">Date of Birth:</div>
                        <div class="field">
                            <div class="label">Date</div>
                            <input type="date" name="dob">
                        </div>
                        <div class="field">
                            <div class="label">Gender</div>
                            <select name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="field btns">
                            <button class="prev-2 prev">Previous</button>
                            <button class="next-2 next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <div class="title">Login Details:</div>
                        <div class="field">
                            <div class="label">Username</div>
                            <input type="text" name="username">
                        </div>
                        <div class="field">
                            <div class="label">Password</div>
                            <input type="password" name="password">
                        </div>
                        <div class="field btns">
                            <button class="prev-3 prev">Previous</button>
                            <button class="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>