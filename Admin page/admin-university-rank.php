<?php
session_start();
if (!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css -->
    <link rel="stylesheet" href="./css/admin.css">
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
            <img src="../Admin page/images/company_logo_icon.png" alt="">
            <span class="logo_name">GREInsights</span>
        </div>
        <ul class="nav-links" style="margin-left: -32px;">
            <li>
                <a href="./Admin-Dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./Admin-page.php">
                    <i class=" fa-regular fa-calendar"></i>
                    <span class="links_name">Calender</span>
                </a>
            </li>
            <li>
                <a href="./admin-staff.php">
                    <i class="fa-solid fa-user-nurse"></i>
                    <span class="links_name">Staff</span>
                </a>
            </li>
            <li>
                <a href="./CRM.php">
                    <i class="fa-regular fa-address-book"></i>
                    <span class="links_name">CRM</span>
                </a>
            </li>
            <li>
                <a href="./Admin-messages.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="#" style="background-color: white;color: black;">
                    <i class='bx bxs-flag-checkered'></i>
                    <span class="links_name">University Rankings</span>
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
                <span class="dashboard">Messages</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="right-set">
                <div class="lang">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" style="background-color: white;border: none;" href="#" role="button" id="dropdownMenuLink">
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
                    <span class="admin_name"><?php echo $_SESSION['adminid']; ?></span>
                </div>
            </div>
        </nav>

        <div class="home-content">
            <div class="admin-university-rankings-content">
                <div class="title">
                    <h1>University Rankings</h1>
                </div>
                <div class="description">
                    <p>Edit University Rankings here</p>
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
                                $ther=$row['times_higher_education_rank'];

                                echo '<tr>
                            <td>'.$uid.'</td>
                            <td><input type="text" value="'.$uname.'"></td>
                            <td><input type="text" value="'.$usnr.'"></td>
                            <td><input type="text" value="'.$tur.'"></td>
                            <td><input type="text" value="'.$ther.'"></td>
                        </tr>';
                            }
                            $result->free();
                        }
                        ?>
                        <!-- <tr>
                            <td><input type="text" value="02"></td>
                            <td><input type="text" value="Columbia University"></td>
                            <td><input type="text" value="18"></td>
                            <td><input type="text" value="22"></td>
                            <td><input type="text" value="11"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="03"></td>
                            <td><input type="text" value="Cornell University"></td>
                            <td><input type="text" value="17"></td>
                            <td><input type="text" value="20"></td>
                            <td><input type="text" value="20"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="04"></td>
                            <td><input type="text" value="Dartmouth College"></td>
                            <td><input type="text" value="12"></td>
                            <td><input type="text" value="205"></td>
                            <td><input type="text" value="123"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="05"></td>
                            <td><input type="text" value="Harvard University"></td>
                            <td><input type="text" value="03"></td>
                            <td><input type="text" value="05"></td>
                            <td><input type="text" value="02"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="06"></td>
                            <td><input type="text" value="The University Of Pennsylvania"></td>
                            <td><input type="text" value="07"></td>
                            <td><input type="text" value="13"></td>
                            <td><input type="text" value="14"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="07"></td>
                            <td><input type="text" value="Princeton University"></td>
                            <td><input type="text" value="01"></td>
                            <td><input type="text" value="16"></td>
                            <td><input type="text" value="07"></td>
                        </tr>
                        <tr>
                            <td><input type="text" value="08"></td>
                            <td><input type="text" value="Yale University"></td>
                            <td><input type="text" value="03"></td>
                            <td><input type="text" value="18"></td>
                            <td><input type="text" value="09"></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="./admin-calender.js"></script>
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
    </script>

</body>

</html>