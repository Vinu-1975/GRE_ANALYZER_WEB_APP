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
    <style>
        .text-sm-end input {
            border: none;
            background: rgb(0, 0, 0, 0.10);
        }
    </style>

</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class='bx bxl-c-plus-plus'></i> -->
            <img src="../Admin page/images/company_logo_icon.png" alt="">
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
                <a href="./admin-staff.php">
                    <i class="fa-solid fa-user-nurse"></i>
                    <span class="links_name">Staff</span>
                </a>
            </li>
            <li>
                <a href="#" style="background-color: white;">
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
                <span class="dashboard">CRM</span>
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
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Customers</a>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="text-sm-end">
                                                    <input type="text" placeholder="Filter">
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
                                                        <th>Customer</th>
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
                                                    $sql = 'select * from r11';
                                                    if ($result = mysqli_query($conn, $sql)) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            $name = $row['username'];
                                                            $ph = $row['phone_number'];
                                                            $email = $row['email'];
                                                            $id = $row['applicant_id'];

                                                            echo '<tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">'.$name.'</a>
                                                        </td>
                                                        <td>
                                                            '.$ph.'
                                                        </td>
                                                        <td>
                                                            '.$email.'
                                                        </td>
                                                        <td>
                                                            '.$id. '
                                                        </td>
                                                        <td>
                                                            07/07/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-success-lighten">Active</span>
                                                        </td>

                                                        <td>'?>
                                                            <form action="/GRE ANALYSER/Admin page/CRM.php" method="post">
                                                                <button type="submit" class="action-icon"> <i class="fa-regular fa-trash-can"></i></button>
                                                            </form>
                                                            <?php '
                                                        </td>
                                                    </tr>';
                                                            
                                                        }
                                                        $result->free();
                                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                            include 'partials/_dbconnect.php';
                                                            $sql = "DELETE FROM r11 where applicant_id='$id'";
                                                            $sql2="DELETE FROM users where appl_id='$id'";
                                                            $sql3="DELETE FROM score where test_id='$id'";
                                                            $result2 = mysqli_query($conn, $sql);
                                                            $result3 = mysqli_query($conn,$sql2);
                                                            $result4 = mysqli_query($conn,$sql3);
                                                            
                                                        }
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
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="customCheck7">
                                                                <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Annette P.
                                                                Kelsch</a>
                                                        </td>
                                                        <td>
                                                            (+15) 73 483 758
                                                        </td>
                                                        <td>
                                                            annette@email.net
                                                        </td>
                                                        <td>
                                                            India
                                                        </td>
                                                        <td>
                                                            09/05/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck8">
                                                                <label class="form-check-label" for="customCheck8">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Jenny C.
                                                                Gero</a>
                                                        </td>
                                                        <td>
                                                            078 7173 9261
                                                        </td>
                                                        <td>
                                                            jennygero@teleworm.us
                                                        </td>
                                                        <td>
                                                            Lesotho
                                                        </td>
                                                        <td>
                                                            08/02/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck9">
                                                                <label class="form-check-label" for="customCheck9">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Edward
                                                                Roseby</a>
                                                        </td>
                                                        <td>
                                                            078 6013 3854
                                                        </td>
                                                        <td>
                                                            edwardR@armyspy.com
                                                        </td>
                                                        <td>
                                                            Monaco
                                                        </td>
                                                        <td>
                                                            08/23/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck10">
                                                                <label class="form-check-label" for="customCheck10">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Anna
                                                                Ciantar</a>
                                                        </td>
                                                        <td>
                                                            (216) 76 298 896
                                                        </td>
                                                        <td>
                                                            annac@hotmai.us
                                                        </td>
                                                        <td>
                                                            Philippines
                                                        </td>
                                                        <td>
                                                            05/06/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck11">
                                                                <label class="form-check-label" for="customCheck11">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Dean
                                                                Smithies</a>
                                                        </td>
                                                        <td>
                                                            077 6157 4248
                                                        </td>
                                                        <td>
                                                            deanes@dayrep.com
                                                        </td>
                                                        <td>
                                                            Singapore
                                                        </td>
                                                        <td>
                                                            04/09/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck12">
                                                                <label class="form-check-label" for="customCheck12">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Labeeb
                                                                Ghali</a>
                                                        </td>
                                                        <td>
                                                            050 414 8778
                                                        </td>
                                                        <td>
                                                            labebswad@teleworm.us
                                                        </td>
                                                        <td>
                                                            United Kingdom
                                                        </td>
                                                        <td>
                                                            06/19/2018
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
                                                                <input type="checkbox" class="form-check-input" id="customCheck13">
                                                                <label class="form-check-label" for="customCheck13">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td class="table-user">
                                                            <i class="fa-solid fa-user"></i>
                                                            <a href="javascript:void(0);" class="text-body fw-semibold">Rory
                                                                Seekamp</a>
                                                        </td>
                                                        <td>
                                                            078 5054 8877
                                                        </td>
                                                        <td>
                                                            roryamp@dayrep.com
                                                        </td>
                                                        <td>
                                                            United States
                                                        </td>
                                                        <td>
                                                            03/24/2018
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-danger-lighten">Blocked</span>
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