<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal - Super Admin</title>
  <!-- MDB icon -->
  <link rel="icon" href="../../../../img/ISATULogo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../../../css/mdb2.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" type="text/css" href="../../../../css/style.css">
  <!-- Your custom styles media query (optional) -->

  <!-- Font Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap"/>
</head>

<body class="fixed-sn">

  <!-- Modals -->

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed wide org-side-nav">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper sn-ad-avatar-wrapper p-2">
            <a href="#"><img src="../../../../img/ISATULogo.png" class="rounded-circle"><span class="sidenav-org-name">
            Organization Name
            </span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li class="sidenav-link-item"><a href="../../" class="collapsible-header waves-effect arrow-r"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-bullhorn"></i> Announcements<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Post Announcement</span></a>
                  </li>
                  <li><a href="./announcements/history" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Announcements History</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                  <li><a href="#" class="waves-effect">
                    <span class="sv-slim"> AM </span>
                    <span class="sv-normal">Add Member</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a href="../../archives" class="collapsible-header waves-effect arrow-r"><i class="fas fa-copy"></i> Archives</a>
            </li>
            <li class="sidenav-link-item"><a href="../../settings" class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> Settings</a>
            </li>
            
            <li class="sidenav-link-item"><a id="toggle" class="waves-effect"><i class="sv-slim-icon fas fa-angle-double-left"></i>Minimize menu</a>
            </li>
          </ul>
        </li>
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg"></div>
    </div>
    <!--/. Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top org-navbar navbar-toggleable-md navbar-expand-lg navbar-dark double-nav p-2">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto">
        
      </div>
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle" style="font-size: 24px;"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Account Settings</a>
            <a class="dropdown-item" href="php/logout.php">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>
  <!--/.Double navigation-->

  <!--Main Layout-->
  <main class="main mx-5">
    <div class="container-fluid dashboard-container mt-2 p-0">
      <h2 class="page-title mb-4">Add Member</h2>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card p-4">
            <form class="form-row" action="./php/addMember.php" method="POST">
                <input type="text" name="val" value="SA" hidden/>

                <div class="col-md-12 mb-4" style="border-bottom: 1px solid lightgray;">
                  <div class="pb-2" style="font-size: 18px;">Personal Information</div>
                </div>

                <div class="col-5 mb-4">
                  <label class="float-left mb-1 field-label">First Name</label>
                  <input type="text" class="form-control" id="memberFirstName" name="memberFirstName" placeholder="Enter First Name" required>
                </div>

                <div class="col-5 mb-4">
                  <label class="float-left mb-1 field-label">Last Name</label>
                  <input type="text" class="form-control" id="memberLastName" name="memberLastName" placeholder="Enter Last Name" required>
                </div>

                <div class="col-2 mb-4">
                  <label class="float-left mb-1 field-label">Middle Initial</label>
                  <input type="text" class="form-control" id="memberMiddleInitial" name="memberMiddleInitial" placeholder="Enter Middle Initial" required>
                </div>

                <div class="col-6 mb-4">
                  <label class="float-left mb-1 field-label">Department</label>
                  <input type="text" class="form-control" id="memberDepartment" name="memberDepartment" placeholder="Enter Department" required>
                </div>

                <div class="col-6 mb-4">
                  <label class="float-left mb-1 field-label">Course & Year</label>
                  <input type="text" class="form-control" id="memberCourseYear" name="memberCourseYear" placeholder="Enter Course & Year" required>
                </div>

                <div class="col-6 mb-4">
                  <label class="float-left mb-1 field-label">Email</label>
                  <input type="text" class="form-control" id="memberEmail" name="memberEmail" placeholder="Enter Email" required>
                </div>

                <div class="col-md-6 px-2">
                  <label class="float-left mb-1 field-label">Phone Number</label>
                  <input type="text" id="memberContact" name="memberContact" class="form-control mb-4" placeholder="Enter Phone Number">
                </div>

                <div class="col-6 mb-2">
                  <label class="float-left mb-1 field-label">Designation</label>
                  <select class="browser-default custom-select" id="orgClassification" name="orgClassification" required>
                    <option selected disabled>Select Designation</option>
                    <option value="0">Designation Name</option>
                    <option value="1">Designation Name</option>
                    <option value="2">Designation Name</option>
                    <option value="3">Designation Name</option>
                  </select>
                </div>

                <div class="col-md-6 mb-2">
                  <label class="float-left mb-1 field-label">Date Joined</label>
                  <input type="date" id="memberDateJoined" name="memberDateJoined" class="form-control datepicker mb-4" placeholder="Select Date">
                </div>

                <div class="col-md-12 mb-4" style="border-bottom: 1px solid lightgray;">
                  <div class="pb-2" style="font-size: 18px;">Account Settings</div>
                </div>

                <div class="col-md-6 mb-5">
                  <label class="float-left mb-1 field-label">Password</label>
                  <input type="password" id="memberPassword" name="memberPassword" class="form-control" placeholder="Set Password" />
                </div>

                <div class="col-md-6 mb-5">
                  <label class="float-left mb-1 field-label">Confirm Password</label>
                  <input type="password" id="memberConfirmPassword" name="memberConfirmPassword" class="form-control" placeholder="Confirm Password" />
                </div>
                
                <div class="button-container mx-auto mt-3">
                  <button type="button" class="btn close-btn">Clear</button>
                  <button type="submit" class="btn save-btn">Save Changes</button>
                </div>

            </form>
              
           </div>
        </div>
      </div>
      
      
    </div>
  </main>
  <!--Main Layout-->


<!-- jQuery -->
  <script type="text/javascript" src="../../../../js/jquery2.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../../../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../../../js/bootstrap2.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../../../js/mdb2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {

  // SideNav Initialization
  $(".button-collapse").sideNav();
    })
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
  // SideNav Button Initialization
  $(".button-collapse").sideNav({
    slim: true,
    });
    });
  </script>

  <script type="text/javascript">
    $('.datepicker').pickadate({
      weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      showMonthsShort: true,
      })
  </script>
  

</body>
</html>