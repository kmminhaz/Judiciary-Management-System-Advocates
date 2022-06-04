<?php include('./php/header.php') ?>

<?php
  $sql = "SELECT `image` FROM advocate_profile
  WHERE advocateId={$_SESSION['advocateId']}";
  $res = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_object($res);

  $sqlNotification = "SELECT * FROM `notification` WHERE `portalId`={$_SESSION['advocateId']} AND `designation`='Advocate'";
  $resNotification = mysqli_query($conn, $sqlNotification);
  // $notification = mysqli_fetch_object($resNotification);

  $sqlNewNotification = "SELECT * FROM `notification` WHERE `portalId`={$_SESSION['advocateId']} AND `designation`='Advocate' AND `status` = 'new'";
  $resNewNotification = mysqli_query($conn, $sqlNewNotification);
  $totalNewNotifications = mysqli_num_rows($resNewNotification);
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-navbarbg="skin6"
      data-theme="light"
      data-layout="vertical"
      data-sidebartype="full"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
          <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
            >
              <i class="ti-menu ti-close"></i>
            </a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
              <a href="index.htm" class="logo">
                <!-- Logo icon -->
                <b class="logo-icon">
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  <img
                    src="../assets/images/logo-icon.png"
                    alt="homepage"
                    class="dark-logo"
                  />
                  <!-- Light Logo icon -->
                  <img
                    src="../assets/images/logo-light-icon.png"
                    alt="homepage"
                    class="light-logo"
                  />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                  <!-- dark Logo text -->
                  <img
                    src="../assets/images/logo-text.png"
                    alt="homepage"
                    class="dark-logo"
                  />
                  <!-- Light Logo text -->
                  <img
                    src="../assets/images/AdvocateLogo.png"
                    class="light-logo"
                    alt="homepage"
                  />
                </span>
              </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin6"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item search-box">
                <a
                  class="nav-link waves-effect waves-dark"
                  href="<?php echo SITEURL ?>html/dashboard.php"
                >
                  <div class="d-flex align-items-center">
                    <div class="ms-1 d-none d-sm-block">
                      <span>Advocate Portal</span>
                    </div>
                  </div>
                </a>
              </li>
            </ul>

            <!-- ============================================================== -->
              <!-- Notification -->
              <!-- ============================================================== -->
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle my-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Notifications <span class="text-danger p-1 fw-bold bg-white ms-2 rounded-pill"><?php echo $totalNewNotifications; ?></span>
                </button>
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <?php
                      while($notifications = mysqli_fetch_object($resNotification)){
                      ?>
                        <?php
                          if($notifications->status == 'new'){
                            ?>
                              <li><a class="dropdown-item fw-bold" href="<?php echo SITEURL ?>html/display-notification.php?id=<?php echo $notifications->id; ?>">
                                <small><?php echo $notifications->date; ?></small> <br>
                                <?php echo $notifications->title; ?>
                              </a></li>
                            <?php
                          }else{
                            ?>
                              <li>
                                <a class="dropdown-item" href="<?php echo SITEURL ?>html/display-notification.php?id=<?php echo $notifications->id ?>">
                                  <small><?php echo $notifications->date; ?></small> <br>
                                  <?php echo $notifications->title; ?>
                                </a>
                              </li>
                            <?php
                          }
                        ?>
                        <div class="dropdown-divider fw-bold"></div>  
                      <?php
                      }
                    ?>
                </ul>
              </div>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../assets/images/advocateProfileImage/<?php echo $rows->image ?>"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="./logout.php"
                    ><i class="ti-user me-1 ms-1"></i> logout</a
                  >
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="http://localhost:3000/"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-av-timer"></i>
                  <span class="hide-menu">Homepage</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="dashboard.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-av-timer"></i>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pages-profile.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-account-network"></i>
                  <span class="hide-menu">Profile</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="forms.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-arrange-bring-forward"></i>
                  <span class="hide-menu">Forms</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="file-table.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-table-large"></i>
                  <span class="hide-menu">Files Table</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="case-result.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-book-multiple"></i>
                  <span class="hide-menu">Case Results</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="ask-help.php"
                  aria-expanded="false"
                >
                  <i class="mdi mdi-medical-bag"></i>
                  <span class="hide-menu">Help</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
