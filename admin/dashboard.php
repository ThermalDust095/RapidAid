<?php
  include 'loginCheck.php';
  if(!isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] != true)  {
    die("Unauthorized");
  }
  class myDB extends SQLite3
    {
      
      function __construct()
      {
        $this->open("../api/db.sqlite");
      }
    }

    $db = new myDB();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RapidAid - Admin</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <link rel="icon" href="favicon.png">
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./dashboard.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">ADMIN</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./hospital.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Hospitals</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./user.php" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">User</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./driver.php" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Driver</span>
              </a>
            </li>
            <li class="sidebar-item ">
              <a class="sidebar-link" href="?logout" aria-expanded="false">
                <span>
                  <i class="ti ti-power"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
              <?php
                if (isset($_GET['logout'])) {
                    session_destroy();
                    header('location: index.php');
                }
              ?>
            </li>
            
          </ul>  
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <h1>Dashboard</h1>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="./authentication-login.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <style>
      *{
      }
        .cards {
          display: flex;
        }
        .card {
          margin: 2rem;
          width: 40%;
          height: 8rem;
          display: flex;
          flex-direction: row;
          border-radius: 29px;
          background: #e0e0e0;
          box-shadow:  21px 21px 42px #b8b8b8,
             -21px -21px 42px #ffffff;
        }
        .card img {
          height: 6rem;
          margin: .8rem;
          width: auto;
        }
      </style>
      <div class="container mt-5"><br><br><br><br>
        <div class="cards">
          <div class="card">
            <div class="col col-lg-4">
              <img src="assets/images/cards/customers.png">
            </div>
            <div class="col col-lg-8 p-3">
              <h2>Customers</h2>
              <h5 class="text-warning">116</h5>
            </div>
          </div>

          <div class="card">
            <div class="col col-lg-4">
              <img src="assets/images/cards/customers.png">
            </div>
            <div class="col col-lg-8 p-3">
              <h2>Drivers</h2>
              <h5 class="text-warning">50</h5>
            </div>
          </div>
        </div>
        <div class="cards">
          <div class="card">
            <div class="col col-lg-4">
              <img src="assets/images/cards/customers.png">
            </div>
            <div class="col col-lg-8 p-3">
              <h2>Trips</h2>
              <h5 class="text-warning">2105</h5>
            </div>
          </div>

          <div class="card">
            <div class="col col-lg-4">
              <img src="assets/images/cards/customers.png">
            </div>
            <div class="col col-lg-8 p-3">
              <h2>Hospitals</h2>
              <h5 class="text-secondary">116</h5>
            </div>
          </div>
          </div>
        </div>
      </div>  

      </div> 
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by 
            <a href="" target="_blank" class="pe-1 text-primary text-decoration-underline">
              Tesla Pirates
            </a> 
          </p>
        </div>
      </div>
    
  
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>