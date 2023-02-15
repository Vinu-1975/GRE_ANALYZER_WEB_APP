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
    <link rel="stylesheet" href="./css/dashboard.css">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class='bx bxl-c-plus-plus'></i> -->
            <img src="./images/company_logo_icon.png" alt="logo">
            <span class="logo_name">GREInsights</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="./Admin-Dashboard.php" style="background-color: white;color: black;">
                    <i class='bx bx-grid-alt'></i>
                    <span class=" links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./Admin-page.php">
                    <i class="fa-regular fa-calendar"></i>
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
                <a href="./admin-university-rank.php">
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
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="right-set">
                <div class="lang">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
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
            <div class="dashboard-content">
                <div class="nousers">
                    <?php 
                    include 'partials/_dbconnect.php';
                    $sql="SELECT * FROM users";
                    $result=mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);
                    ?>
                    <div class="text-data">
                        <h2>No. of Users</h2>
                    </div>
                    <div class="u-data">
                        <h1><?php echo $num; ?></h1>
                    </div>
                </div>
                <div class="nousers">
                    <?php 
                    $result->free();
                    $sql="SELECT * FROM admins";
                    $result=mysqli_query($conn,$sql);
                    $num = mysqli_num_rows($result);
                    ?>
                    <div class="text-data">
                        <h2>No. of Administrators</h2>
                    </div>
                    <div class="u-data">
                        <h1><?php echo $num; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
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