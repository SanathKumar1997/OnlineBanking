<?php
session_start();
if(!isset($_SESSION['accountNo'])){
    header("Location: /user/login.php");
}
unset($_SESSION['EditAccountNo']);
include "../connection.php";
include "../Notification.php";
include "../adminData.php";
/* 

set id from 1 in sql

SET @autoid := 0;
UPDATE login SET ID = @autoid := (@autoid+1);
ALTER TABLE login AUTO_INCREMENT = 1; 

127.0.0.1/obs/customer_detail/		http://localhost/phpmyadmin/tbl_sql.php?db=obs&table=customer_detail
 Showing rows 0 -  4 (5 total, Query took 0.0030 seconds.)

SELECT
    DATE(Create_Date) AS DATE,
    COUNT(C_No)
FROM
    customer_detail
GROUP BY
    DATE(Create_Date)



*/



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Deactivate Account O B S</title>

    <!-- Favicons -->
    <link href="../../assets/img/favicon-32x32.png" rel="icon">
    <link href="../../assets/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>O B S Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/accounts/OpenAccount.css">

    <!-- Javascrip -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body class="">

    <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="fixed-top align-top" id="sidebar-wrapper" role="navigation">
            <div class="simplebar-content" style="padding: 0px;">
                <a class="sidebar-brand" href="../../index.php">
                <img src="../../assets/img/lg-1328.png" alt="" width="24px;" class="img-fluid"><span class="align-middle"> O B S</span>
                </a>

                <ul class="navbar-nav align-self-stretch">

                    <!-- <li class="sidebar-header">
                        Pages
                    </li> -->
                    <li class="menuHover">

                        <a href="../Dashboard.php" class="nav-link text-left" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-bar-chart-1"></i><i class="bx bxs-dashboard ico"></i> Dashboard
                        </a>
                    </li>

                    <li class="has-sub menuHover">
                        <!-- this link href="collapseExample1" shows submenue  -->
                        <a class="nav-link collapsed text-left" href="#collapseExample1" role="button" data-toggle="collapse">
                            <i class="flaticon-user"></i> <i class="bx bxs-wallet-alt Profile ico"></i> Wallet
                        </a>
                        <!-- id is a collapseExample1 -->
                        <div class="collapse menu mega-dropdown" id="collapseExample1">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <li><a href="../wallet/Withdraw.php">Withdraw Money</a></li>
                                                    <li><a href="../wallet/Deposit.php">Deposit Money</a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>


                    <li class="menuHover">
                        <a href="../TransferMoney.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i><i class="bx bx-transfer ico"></i> Transfer
                        </a>
                    </li>

                    <li class="has-sub menuHover">
                        <a class="nav-link collapsed text-left" href="#collapseExample2" role="button" data-toggle="collapse">
                            <i class="flaticon-user"></i> <i class="bx bx-user-circle Profile ico"></i> Customer Accounts
                        </a>
                        <!-- Show class show dropdown by default -->
                        <div class="collapse show menu mega-dropdown " id="collapseExample2">
                            <div class="dropmenu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-lg-12 px-2">
                                            <div class="submenu-box">
                                                <ul class="list-unstyled m-0">
                                                    <!-- active class for helight on which page we are -->
                                                    <!-- <li><a href="../accounts/OpenAccount.php">Open Account</a></li> -->
                                                    <li><a href="../accounts/EditAccount.php">Edit Account</a></li>
                                                    <li><a href="../accounts/ActivateAccount.php">Activate Account</a></li>
                                                    <li><a class="active" href="../accounts/DeactivateAccount.php">Deactivate Account</a></li>
                                                    <li><a href="../accounts/CloseAccount.php">Close Account</a></li>


                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="menuHover box-icon">
                        <a href="../VerifyAccount.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bx-check-circle ico"></i> Verify Account <span class="badge badge-success" style="font-size: 12px; margin-left: 50px;"> <?php echo $inactiveAccountsCount; ?> new</span>
                        </a>
                    </li> 

                    <li class="menuHover" id="Transaction">
                        <a href="../transactions.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bx-history ico"></i> Transactions
                        </a>
                    </li>


                    <li class="menuHover">
                        <a href="../admin/cards.php" class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-credit-card ico"></i>Cards Requests <span class="badge badge-success" style="font-size: 12px; margin-left: 50px;"> <?php echo $unverifiedCardsCount; ?> new</span>
                        </a>
                    </li> 

                    <!-- <li class="sidebar-header">
                        tools and component
                    </li> -->
                    <!-- <li class="menuHover">
                        <a class="nav-link text-left" role="button">
                            <i class="flaticon-bar-chart-1"></i> <i class="bx bxs-cog ico"></i> Setting
                        </a>
                    </li> -->
                    <li class="menuHover">
                        <a class="nav-link text-left" role="button" href="../logout.php">
                            <i class="flaticon-map"></i><i class="bx bx-log-out ico"></i> Logout
                        </a>
                    </li>

                </ul>


            </div>


        </nav>
        <!-- /#sidebar-wrapper -->


        <!-- Page Content -->
        <div id="page-content-wrapper">


            <div id="content">

                <div class="container-fluid p-0 px-lg-0 px-md-0">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light gray_bg my-navbar">

                        <!-- Sidebar Toggle (Topbar) -->
                        <div type="button" id="bar" class="nav-icon1 hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                            <span class="light_bg"></span>
                            <span class="light_bg"></span>
                            <span class="light_bg"></span>
                        </div>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - Pending Customer Accounts -->
                        <li class="nav-item dropdown">
                                <a class="nav-icon dropdown" href="#" id="alertsDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-plus"></i>
                            
                                    <span class="badge badge-danger badge-counter"><?php echo $inactiveAccountsCount; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                                    <div class="dropdown-menu-header">
                                        Notifications
                                    </div>
                                    <div class="list-group">
                                        <a href="../VerifyAccount.php" class="list-group-item">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                                    </svg>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark"><b><?php echo $inactiveAccountsCount; ?></b> New Pending Accounts</div>
                                                    <div class="text-muted small mt-1">Check the "Verify Account" section from the sidebar for more details.</div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            </li>
                            <!-- Nav Item - Pending Customer Accounts ENDS -->

                            <!-- Nav Item - User Information -->
                            <li class="nav-item">
                                <a class="nav-link" href="#"  role="button" >
                                    <span class="mr-2 d-none d-lg-inline small"><?php echo $Admin?></span>
                                    <img id="AdminDropdown" class="img-profile rounded-circle" src="<?php echo  $AdminProfileInner ?>">
                                </a>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid px-lg-4">
                        <div class="row">
                            <div class="col-md-12 mt-lg-4 mt-4">
                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0">Customer Accounts</h1>
                                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm light btn-custo "><i class="bx bx-log-out-circle ico"></i>
                                        Logout</a> -->
                                </div>
                                <?php
                               if (isset($_POST['deactivate_btn'])) {
                                $DAccountNo = $_POST['deactivate_id'];
                            
                                
                                // Select database and collection
                                $mongoDB = $mongoClient->selectDatabase("onlinebanking");
                                $collection = $mongoDB->selectCollection("login");
                            
                                // Update document in MongoDB collection
                                $updateResult = $collection->updateOne(
                                    ['AccountNo' => $DAccountNo],
                                    ['$set' => ['Status' => 'Deactivated']]
                                );
                            
                                if ($updateResult->getModifiedCount() > 0) {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Your Account Deactivated!</strong>.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Your Account not Deactivated!</strong>.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                }
                            }
                            
                            if (isset($_POST['Sdeactivate_btn'])) {
                                $DAccountNo = $_SESSION['De_ActiveAccountNo'];
                            
                                
                                // Select database and collection
                                $mongoDB = $mongoClient->selectDatabase("onlinebankng");
                                $collection = $mongoDB->selectCollection("login");
                            
                                // Update document in MongoDB collection
                                $updateResult = $collection->updateOne(
                                    ['AccountNo' => $DAccountNo],
                                    ['$set' => ['Status' => 'Deactivated']]
                                );
                            
                                if ($updateResult->getModifiedCount() > 0) {
                                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Your Account Deactivated!</strong>.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Your Account not Deactivated!</strong>.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                }
                            }
                                ?>


                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-body ">
                                                <h5 class="card-title mb-4 ">Deactivate Account</h5>

                                                <!-- Search Box -->
                                                <form action="ActivateAccount.php" method="POST" class="d-none d-sm-inline-block form-inline navbar-search">
                                                    <div class="input-group">

                                                        <input id="SearchText" name="SearchText" style="margin: bottom 30px;" type="number" class="form-control border-bg" placeholder="Enter Account Number" aria-label="Search">

                                                        <div class="input-group-append">
                                                            <button id="search" name="search" class="btn btn-info" type="button">
                                                                <i class="fas fa-search fa-sm"></i>
                                                            </button>
                                                        </div>

                                                        <!-- Refresh Button -->
                                                        <button style="margin-left: 10px;" id="refresh" class="btn btn-primary" type="button" onclick="reload();">
                                                            Refresh <i class="bx bx-refresh bx-10 ico" style="font-size: 18px;"></i>
                                                        </button>
                                                    </div>

                                                </form>

                                                <div class="table-responsive"> 

                                                    <table id="EditTable" class="table table-striped table-hover v-middle" style="margin-top: 30px;">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">#ID</th>
                                                                <th scope="col">Account No</th>
                                                                <th scope="col">Username</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
    
                                                            </tr>
                                                        </thead>
                                                        <tbody class="">
    
                                                            <?php
    
    $mongoDB = $mongoClient->selectDatabase("onlinebanking");
    $collection = $mongoDB->selectCollection("login");
    
    // Query MongoDB collection
    $cursor = $collection->find(['Status' => 'Active']);
    
    foreach ($cursor as $row) {
    
                                                            ?>
                                                                    <tr>
                                                                        <th scope="row"><?php echo $row['_id']; ?></th>
    
                                                                        <td><?php echo $row['AccountNo']; ?></td>
    
                                                                        <td><?php echo $row['Username']; ?></td>
    
                                                                        <td><?php echo $row['Status']; ?></td>
                                                                        
                                                                        <td>
                                                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                                                <input type="hidden" name="deactivate_id" id="deactivate_id" value="<?php echo $row['AccountNo']; ?>">
                                                                                <button name="deactivate_btn" id="deactivate_btn" type="submit" data-toggle="modal" data-target="#Verify" class="btn btn-danger"><i class='bx bx-error'></i>Deactivate</button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
    
                                                            <?php
                                                                }
                                                            
    
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="table-responsive"> 
                                                    
                                                    <!-- Search Table -->
                                                    <table hidden id="SearchTable" class="table table-bordered v-middle" style="margin-top: 30px;">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">#ID</th>
                                                                <th scope="col">Account No</th>
                                                                <th scope="col">Username</th>
                                                                <th scope="col">Status</th>
                                                                <th scope="col">Action</th>
    
                                                            </tr>
                                                        </thead>
                                                        <tbody class="">
    
                                                            <tr>
                                                                <th id="id" scope="row"></th>
    
                                                                <td id="AccountNo"></td>
    
                                                                <td id="Username"></td>
    
                                                                <td id="Status"></td>
    
                                                                <td>
    
                                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    
                                                                        <input id="Sdeactivate_id" type="hidden" name="Sdeactivate_id" value="<?php echo $AccountNo?>">
                                                                        <button name="Sdeactivate_btn" type="submit" class="btn btn-danger"><i class='bx bx-error' ></i>Deactivate</button>
                                                                    </form>
                                                                </td>
    
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>




                                            </div>
                                        </div>

                                    </div>


                                </div>


                            </div>

                        </div>

                    </div>


                </div>






                <footer class="footer gray_bg">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-left">
                                <p class="mb-0">
                                    <a href="../../index.php" class="text-muted light"><strong>Online Banking System
                                        </strong></a> &copy
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <ul class="list-inline">
                                    <!-- <li class="footer-item">
                                        <a class="text-muted light" href="#">Support</a>
                                    </li>
                                    <li class="footer-item">
                                        <a class="text-muted light" href="#">Help Center</a>
                                    </li> -->
                                    <li class="footer-item">
                                        <a class="text-muted light" href="../../privacypolicy.html">Privacy</a>
                                    </li>
                                    <li class="footer-item">
                                        <a class="text-muted light" href="../../terms.html">Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="../js/deactivateAc.js"></script>
    <script>
        $('#bar').click(function() {
            $(this).toggleClass('open');
            $('#page-content-wrapper ,#sidebar-wrapper').toggleClass('toggled');

        });
        $("#AdminDropdown").click(function() {
            $(this).popover({

                title: 'Profile Detail',
                html: true,
                container: "body",
                placement: 'bottom',
                content: ` <a href="../../admin/logout.php" role="button" class="btn btn-danger nav-link">Logout</a>`

            })


        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

</html>