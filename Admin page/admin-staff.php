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
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Datatable css -->
    <link href="assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css -->
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./css/CRM.css">
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
            <img src="./images/company_logo_icon.png" alt="">
            <span class="logo_name">GREInsights</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="./Admin-Dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="./Admin-page.php">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="links_name">Calender</span>
                </a>
            </li>
            <li>
                <a href="./admin-staff.php" style="background-color: white;">
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
                <span class="dashboard">Staff</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="right-set">
                <div class="lang">
                    <div class="dropdown">
                        <a class="btn22 btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink">
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
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">

                                    <h4 class="page-title"></h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-sm-5">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Admins</a>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">

                                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                                </div>
                                            </div><!-- end col-->
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 20px;">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                            </div>
                                                        </th>
                                                        <th>Admin</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Location</th>
                                                        <th>Create Date</th>
                                                        <th>Status</th>
                                                        <th style="width: 75px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    include 'partials/_dbconnect.php';
                                                    $sql = 'select * from admins';
                                                    if ($result = mysqli_query($conn, $sql)) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $aname = $row['name'];

                                                            echo '<tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">'.$aname.'</a>
                                                        </td>
                                                        <td>
                                                            937-330-1634
                                                        </td>
                                                        <td>
                                                            pauljfrnd@jourrapide.com
                                                        </td>
                                                        <td>
                                                            New York
                                                        </td>
                                                        <td>
                                                            07/07/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-success-lighten">Active</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>';
                                                        }
                                                        $result->free();
                                                    }
                                                    ?>
<!-- 
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                                                <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Bryan J.
                                                                Luellen</a>
                                                        </td>
                                                        <td>
                                                            215-302-3376
                                                        </td>
                                                        <td>
                                                            bryuellen@dayrep.com
                                                        </td>
                                                        <td>
                                                            New York
                                                        </td>
                                                        <td>
                                                            09/12/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-success-lighten">Active</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck4">
                                                                <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Kathryn S.
                                                                Collier</a>
                                                        </td>
                                                        <td>
                                                            828-216-2190
                                                        </td>
                                                        <td>
                                                            collier@jourrapide.com
                                                        </td>
                                                        <td>
                                                            Canada
                                                        </td>
                                                        <td>
                                                            06/30/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-danger-lighten">Blocked</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck5">
                                                                <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Timothy
                                                                Kauper</a>
                                                        </td>
                                                        <td>
                                                            (216) 75 612 706
                                                        </td>
                                                        <td>
                                                            thykauper@rhyta.com
                                                        </td>
                                                        <td>
                                                            Denmark
                                                        </td>
                                                        <td>
                                                            09/08/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-danger-lighten">Blocked</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck6">
                                                                <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Zara
                                                                Raws</a>
                                                        </td>
                                                        <td>
                                                            (02) 75 150 655
                                                        </td>
                                                        <td>
                                                            austin@dayrep.com
                                                        </td>
                                                        <td>
                                                            Germany
                                                        </td>
                                                        <td>
                                                            07/15/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-success-lighten">Active</span>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                            <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                                        </td>
                                                    </tr> -->

                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
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

        let dd = document.querySelectorAll('.dd')
        dd.forEach(function(d) {
            d.addEventListener('click', function() {
                d.classList.toggle('full');
            })
        })
    </script>

</body>

</html>