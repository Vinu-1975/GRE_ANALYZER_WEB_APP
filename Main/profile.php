<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include 'partials/_dbconnect.php';
$name = "SELECT username FROM r11 WHERE applicant_id = '" . $_SESSION['id'] . "';";
$result = mysqli_query($conn, $name);
$row = mysqli_fetch_assoc($result);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $applicantID = $_POST['id'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $phone = $_POST['phno'];
    $quantitative = $_POST['qs'];
    $verbal = $_POST['vs'];
    $analytical = $_POST['as'];
    $total = number_format($quantitative)+ number_format($verbal)+ number_format($analytical);
    $perc=($total/340)*100;
    $noa = $_POST['noa'];
    $rank = $_POST['rank'];

    $sql = "update r11 set username='$username', email='$email', gender='$gender',dob='$dob', phone_number='$phone',attempt_no=$noa,score=$total,rank=$rank where applicant_id='$applicantID'; ";
    $result = mysqli_query($conn, $sql);

    
    $sql2="update score set gre_score=$total,gre_analytical=$analytical,gre_verbal=$verbal,gre_quant=$quantitative,percentile=$perc where test_id='$applicantID';";
    $result2 = mysqli_query($conn, $sql2);


}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css -->
    <link rel="stylesheet" href="./css/home.css">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class='bx bxl-c-plus-plus'></i> -->
            <img src="./images/company_logo_icon.png" alt="">
            <span class="logo_name">GREInsights</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="./home.php">
                    <i class='bx bxs-home-circle'></i>
                    <span class="links_name">Home</span>
                </a>
            </li>
            <li>
                <a href="./city_insights.php">
                    <i class='bx bxs-business'></i>
                    <span class="links_name">City Insights</span>
                </a>
            </li>
            <li>
                <a href="./previous_trends.php">
                    <i class='bx bxs-timer'></i>
                    <span class="links_name">View Previous Trends</span>
                </a>
            </li>
            <li>
                <a href="./view_score.php">
                    <i class='bx bxs-bookmarks'></i>
                    <span class="links_name">View Score</span>
                </a>
            </li>
            <li>
                <a href="./take_gre.html" target="_blank">
                    <i class='bx bxs-notepad'></i>
                    <span class="links_name">Take GRE</span>
                </a>
            </li>
            <li>
                <a href="./university_ranking.php">
                    <i class='bx bxs-flag-checkered'></i>
                    <span class="links_name">University Rankings</span>
                </a>
            </li>
            <li>
                <a href="./university_finder.php">
                    <i class='bx bxs-file-find'></i>
                    <span class="links_name">University Finder</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../Intro Page/intro.html">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Home</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="right-set">
                <div class="lang" style="background-color: white;">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" style="background-color: white !important;border: none;" href="#" role="button" id="dropdownMenuLink">
                            <img src="./flags/us.jpg" alt="">
                            <span>English</span>
                        </a>
                        <div class="dropdown-menu def">
                            <div><img src="./flags/germany.jpg" alt=""><a class="dropdown-item" href="#">German</a>
                            </div>
                            <div><img src="./flags/italy.jpg" alt=""><a class="dropdown-item" href="#">Italian</a></div>
                            <div><img src="./flags/russia.jpg" alt=""><a class="dropdown-item" href="#">Russian</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="options">
                </div>
                <div class="profile-details">
                    <i class="fa-regular fa-user"></i>
                    <span class="admin_name"><?php echo $row['username']; ?></span>
                    <div class="dropdown">
                        <div class="dropdown-menu-user def">
                            <div><a class="dropdown-item" href="./profile.php">Profile</a>
                            </div>
                            <div><a class="dropdown-item" href="#">Change Password</a></div>
                            <div><a class="dropdown-item" href="../Intro Page/intro.html">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="profile-content">
                <div class="title">
                    <h2>My Account</h2>
                    <i class='bx bx-cog'></i>
                </div>
                <div class="info">
                    <form action="/GRE ANALYSER/Main/profile.php" method="post">
                        <?php
                        include 'partials/_dbconnect.php';
                        $sql1 = "select * from r11 where applicant_id='" . $_SESSION['id'] . "';";
                        $result = mysqli_query($conn, $sql1);
                        $row = mysqli_fetch_assoc($result);

                        $sql3 = "select * from score where test_id='" . $_SESSION['id'] . "';";
                        $result4=mysqli_query($conn,$sql3);
                        $row2=mysqli_fetch_assoc($result4);
                        ?>
                        <fieldset class="user-info">
                            <legend style="font-size: 14px;">USER INFORMATION</legend>
                            <div class="ui-row">
                                <div>
                                    <label for="uname">User Name:</label>
                                    <input type="text" id="uname" value="<?php echo $row['username'] ?>" name="username">
                                </div>
                                <div>
                                    <label for="fname">Gender:</label>
                                    <input type="text" id="fname" value="<?php echo $row['gender'] ?>" name="gender">
                                </div>
                            </div>
                            <div class="ui-row">
                                <div>
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" value="<?php echo $row['email'] ?>" name="email">
                                </div>
                                <div>
                                    <label for="lname">Phone No:</label>
                                    <input type="text" id="lname" value="<?php echo $row['phone_number'] ?>" name="phno">
                                </div>
                            </div>
                            <div class="ui-row">
                                <div>
                                    <label for="gretest">Applicant ID:</label>
                                    <input type="text" id="gretestid" value="<?php echo $row['applicant_id'] ?>" name="id">
                                </div>
                                <div>
                                    <label for="birthday">DoB:</label>
                                    <input type="date" id="birthday" value="<?php echo $row['dob'] ?>" name="dob">
                                </div>
                            </div>
                            <div class="ui-row">
                                <div>
                                    <label for="gretest">Analytical Score*:</label>
                                    <input type="number" id="gretestid" value="<?php echo $row2['gre_analytical'] ?>" name="as">
                                </div>
                                <div>
                                    <label for="birthday">Verbal Score*:</label>
                                    <input type="number" id="birthday" value="<?php echo $row2['gre_verbal'] ?>" name="vs">
                                </div>
                                <div>
                                    <label for="birthday">Quantative Score*:</label>
                                    <input type="number" id="birthday" value="<?php echo $row2['gre_quant'] ?>" name="qs">
                                </div>
                            </div>
                            <div class="ui-row">
                                <div>
                                    <label for="gretest">Total_Score:</label>
                                    <?php echo $row['score'] ?>
                                </div>
                                <div>
                                    <label for="birthday">No. of Attempts*:</label>
                                    <input type="number" id="gretestid" value="<?php echo $row['attempt_no'] ?>" name="noa">
                                </div>
                                <div>
                                    <label for="birthday">Rank*:</label>
                                    <input type="number" id="gretestid" value="<?php echo $row['rank'] ?>" name="rank">
                                </div>
                            </div>
                            <button type="submit">Update Profile</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="./script.js"></script>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
        let langDrop = document.querySelector('.lang');
        let langDropMenu = document.querySelector('.dropdown-menu');
        langDrop.addEventListener('click', function() {
            langDropMenu.classList.toggle('show');
        })
        let ProfileDrop = document.querySelector('.profile-details');
        let ProfileDropMenu = document.querySelector('.dropdown-menu-user');
        ProfileDrop.addEventListener('click', function() {
            ProfileDropMenu.classList.toggle('show');
        })
        console.log(fname)
    </script>

</body>

</html>