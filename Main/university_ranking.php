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
                <a href="./university_ranking.php" style="background-color: white;">
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
                <span class="dashboard">Rankings</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="right-set">
                <div class="lang">
                    <div class="dropdown">
                        <a style="background-color: white !important;border: none;" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
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
            <div class="university-rankings-content">
                <div class="title">
                    <h1>University Rankings</h1>
                </div>
                <div class="description">
                    <p>Below are the rankings of all IVY leagues colleges from various websites</p>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>UNIVERSITY ID</th>
                            <th>UNIVERSITY NAME</th>
                            <th>U.S NEWS RANK</th>
                            <th>TOP UNIVERSITIES RANK</th>
                            <th>TIMES HIGHER EDUCATION RANK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'partials/_dbconnect.php';
                        $sql = 'select * from university_rank order by u_id';
                        if ($result = mysqli_query($conn, $sql)) {
                            while ($row = $result->fetch_assoc()) {
                                $uid = $row['u_id'];
                                $uname = $row['university_name'];
                                $usnr = $row['us_news_rank'];
                                $tur = $row['top_university_rank'];
                                $ther = $row['times_higher_education_rank'];

                                echo '<tr>
                            <td>'.$uid.'</td>
                            <td>'.$uname.'</td>
                            <td>'.$usnr.'</td>
                            <td>'.$tur.'</td>
                            <td>'.$ther.'</td>
                        </tr>';
                            }
                            $result->free();
                        }
                        ?>
                        <!-- <tr>
                            <td>02</td>
                            <td>Columbia University</td>
                            <td>18</td>
                            <td>22</td>
                            <td>11</td>
                        </tr>
                        <tr>
                            <td>03</td>
                            <td>Cornell University</td>
                            <td>17</td>
                            <td>20</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>04</td>
                            <td>Dartmouth College</td>
                            <td>12</td>
                            <td>205</td>
                            <td>123</td>
                        </tr>
                        <tr>
                            <td>05</td>
                            <td>Harvard University</td>
                            <td>03</td>
                            <td>05</td>
                            <td>02</td>
                        </tr>
                        <tr>
                            <td>06</td>
                            <td>The University Of Pennsylvania</td>
                            <td>07</td>
                            <td>13</td>
                            <td>14</td>
                        </tr>
                        <tr>
                            <td>07</td>
                            <td>Princeton University</td>
                            <td>01</td>
                            <td>16</td>
                            <td>07</td>
                        </tr>
                        <tr>
                            <td>08</td>
                            <td>Yale University</td>
                            <td>03</td>
                            <td>18</td>
                            <td>09</td>
                        </tr> -->
                    </tbody>
                </table>
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
    </script>

</body>

</html>