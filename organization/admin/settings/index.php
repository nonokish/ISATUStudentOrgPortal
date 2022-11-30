<?php
require_once "../../../db.php";
$org_name = $_SESSION['org_name'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal - Admin</title>
  <!-- MDB icon -->
  <link rel="icon" href="../../../img/ISATULogo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../../css/mdb2.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" type="text/css" href="../../../css/style.css">
  <!-- Your custom styles media query (optional) -->

  <!-- Font Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap"/>
</head>

<body class="fixed-sn">

  <!-- Modals -->

  <!-- Switch Organization Modal -->
  <div class="modal fade" id="switchOrgModal" tabindex="-1" role="dialog" aria-labelledby=""
      aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="./php/updateOrganizationIdSession.php" method="POST">
          <div class="modal-header modal-header-fill mb-2">
            <h5 class="modal-title login-modal-title" id="loginModal">Select Organization</h5>
            <button type="button" class="close login-modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body py-4 px-5">
            
            <label style="font-weight: 500!important">Your organizations:</label>
            <select class="browser-default custom-select select-organization mb-5" id="orgList" name="orgList">
            </select>

            <div class="mx-auto text-center">
              <button type="submit" class="btn login-btn px-5">Select</button>
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Alert Modal -->
  <div class="modal fade" id="deleteAlert" tabindex="1" role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content px-3 py-4">
        <div class="modal-body text-center">
          <h5 style="font-weight: 500;">Confirm Delete?</h5>
        </div>
        <div class="modal-footer" style="border: none!important;">
          <div class="mx-auto">
            <button type="button" class="btn btn-success alert-btn btn-sm" data-dismiss="modal">Yes</button>
            <button type="button" class="btn btn-danger alert-btn btn-sm" data-toggle="modal" data-target="#viewImageModal" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed wide org-side-nav">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper sn-ad-avatar-wrapper p-2">
            <a href="#"><img src="../../../img/ISATULogo.png" class="rounded-circle"><span class="sidenav-org-name">
              <?php echo $org_name;?>
            </span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li class="sidenav-link-item"><a href="../" class="collapsible-header waves-effect arrow-r"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="far fa-newspaper"></i> Newsfeed<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../newsfeed" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Add a Post</span></a>
                  </li>
                  <li><a href="../newsfeed/manage_posts" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Manage Posts</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-bullhorn"></i> Announcements<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../announcements" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Post Announcement</span></a>
                  </li>
                  <li><a href="../announcements../history" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Announcements History</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../members" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                  <li><a href="../members/add_member" class="waves-effect">
                    <span class="sv-slim"> AM </span>
                    <span class="sv-normal">Add Member</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a href="../archives" class="collapsible-header waves-effect arrow-r"><i class="fas fa-copy"></i> Archives</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-cog"></i> Settings</a>
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
            <a class="dropdown-item" data-toggle="modal" data-target="#switchOrgModal">Switch Organization</a>
            <a class="dropdown-item" href="../my_account">My Account</a>
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
      <h2 class="page-title mb-4">Settings</h2>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card p-4">
           
            <form class="" action="./php/updateUserSettings.php" method="POST">
              <!-- User Settings Fields -->
              <div class="form-row" id="getUserSettings">
                <!--<div class="col-md-12 px-2">
                  <label class="float-left mb-1 field-label">Organization</label>
                  <input type="text" id="orgName" name="orgName" class="form-control mb-4" value="Sample Organization">
                </div>
                <div class="col-md-6 px-2">
                  <label class="float-left mb-1 field-label">Classification</label>
                  <select class="browser-default custom-select" id="orgClassification" name="orgClassification" required>
                  </select>
                </div>
                <div class="col-md-6 px-2">
                  <label class="float-left mb-1 field-label">Adviser</label>
                  <input type="text" id="orgAdviser" name="orgAdviser" class="form-control mb-4" value="Adviser Name" disabled>
                </div>
                <div class="col-md-6 px-2">
                  <label class="float-left mb-1 field-label">Date Joined</label>
                  <input type="text" id="orgDateJoined" name="orgDateJoined" class="form-control mb-4" value="23 September, 2022" disabled>
                </div>
                <div class="col-md-6 px-2">
                  <label class="float-left mb-1 field-label">Date Created</label>
                  <input type="date" id="orgDateCreated" name="orgDateCreated" class="form-control datepicker mb-4" value="1980-08-26">
                </div>-->
              </div>

              <div class="button-container mx-auto mt-3">
                <button type="button" class="btn close-btn">Clear</button>
                <button type="submit" class="btn save-btn">Update</button>
              </div>

            </form>
           </div>
        </div>
      </div>
      
      
    </div>
  </main>
  <!--Main Layout-->


<!-- jQuery -->
  <script type="text/javascript" src="../../../js/jquery2.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../../js/bootstrap2.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../../js/mdb2.min.js"></script>

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

  <script type="text/javascript">
    $('#orgList').load("php/changeOrganizationDropdownList.php");
  </script>

  <!-- User Settings -->
  <script type="text/javascript">
    $.ajax({
      url: "php/getUserSettings.php",
      type: "GET",
      success: function(response){
        $("#getUserSettings").append(response);
        $('#orgClassification').load("php/dropdownListOrgClassification.php");
      }
    });
  </script>
  

</body>
</html>