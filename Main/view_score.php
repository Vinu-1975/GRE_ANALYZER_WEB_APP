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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $aid=$_POST['aid'];
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

<body style="margin: 0;
    height: 100%;
    overflow: hidden;">
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
                <a href="./view_score.php" style="background-color: white;">
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
                <span class="dashboard">View Score</span>
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
                    <i class="bx bxs-user-plus"></i>
                    <i class="bx bx-bell"></i>
                    <i class='bx bx-cog'></i>
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
            <div class="view-score-content">
                <div class="title">
                    <h1>View GRE Score </h1>
                </div>
                <div class="description">
                    <p>Enter your GRE applicant id to check your score</p>
                </div>
                <form action="/GRE ANALYSER/Main/view_score.php" method="post">
                    <div class="score-input">
                        Enter Applicant ID:
                        <input type="text" name="aid">
                        <input type="submit" id="get_score">
                    </div>
                </form>
                <div class="display-info hide">
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $aid = $_POST['aid'];
                        $sql = "select * from score where test_id='$aid';";
                    }
                    if ($result2 = mysqli_query($conn, $sql)) {
                        while ($rows = $result2->fetch_assoc()) {
                            $id = $rows['test_id'];
                            $ts = $rows['gre_score'];
                            $qs = $rows['gre_quant'];
                            $as = $rows['gre_analytical'];
                            $vs = $rows['gre_verbal'];
                            $perc=$rows['percentile'];

                            echo 'Applicant GRE Test ID : '.$id.'<br>
                        Applicant Total GRE Score : '.$ts.'<br>
                        Applicant Analytical Score : '.$qs.'<br>
                        Applicant Verbal Score : '.$as.'<br>
                        Applicant Quantitative Score : '.$vs.'<br>
                        Applicant Percentile : '.$perc;
                        }
                        $result->free();
                    }
                    ?>
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
        displayCard = document.querySelector('.display-info');
        getscoreBtn = document.querySelector('#get_score');
        getscoreBtn.addEventListener('click', function(e) {
            e.preventDefault();
            displayCard.classList.toggle('hide');
            e.submit();
        })
    </script>

</body>

</html>