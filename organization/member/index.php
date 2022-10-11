<?php
require_once "../../db.php";
require_once "php/session.php";
require_once "php/getOrganizationDetails.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal</title>
  <!-- MDB icon -->
  <link rel="icon" href="../../img/ISATULogo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../css/mdb2.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
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

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed wide org-side-nav">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper sn-ad-avatar-wrapper p-2">
            <a href="#"><img src="../../img/ISATULogo.png" class="rounded-circle"><span class="sidenav-org-name">
              <?php 
                if($orgName) {
                  echo $orgName;
                } else {
                  echo "No Organization";
                }
              ?>
            </span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
          	<li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="./members" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a href="./archives" class="collapsible-header waves-effect arrow-r"><i class="fas fa-copy"></i> Archives</a>
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
            <a class="dropdown-item" href="./my_account">My Account</a>
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
      <h2 class="page-title mb-4">Dashboard</h2>
      <div class="row mb-1">
      	<div class="col-md-3 mb-4">
      		<div class="card dashboard-stat-card card-body">
      			<h5 class="card-title mb-4">New Members</h5>
     			 <div class="dashboard-stat">
     			 	<i class="fas fa-user-plus"></i>
     			 	<span class="float-right" style="color: #f7CA18;">00</span>
     			 </div>
    			</div>
      	</div>

      	<div class="col-md-3 mb-4">
      		<div class="card dashboard-stat-card card-body">
      			<h5 class="card-title mb-4">Members</h5>
     			 <div class="dashboard-stat">
     			 	<i class="fas fa-users"></i>
     			 	<span class="float-right" style="color: #f7CA18;">
              <?php 
                if($orgTotalMember) {
                  echo $orgTotalMember;
                } else {
                  echo "00";
                }
              ?>
            </span>
     			 </div>
    			</div>
      	</div>

      	<div class="col-md-3 mb-4">
      		<div class="card dashboard-stat-card card-body">
      			<h5 class="card-title mb-4">Announcements</h5>
     			 <div class="dashboard-stat">
     			 	<i class="fas fa-bullhorn"></i>
     			 	<span class="float-right" style="color: #f7CA18;">00</span>
     			 </div>
    			</div>
      	</div>

      	<div class="col-md-3 mb-4">
      		<div class="card dashboard-stat-card card-body">
      			<h5 class="card-title mb-4">Docs & Files</h5>
     			 <div class="dashboard-stat">
     			 	<i class="fas fa-copy"></i>
     			 	<span class="float-right" style="color: #f7CA18;">00</span>
     			 </div>
    			</div>
      	</div>
      </div>

      <div class="row">
      	<div class="col-md-12">
      		<div class="card p-4">
      			<h5 class="mb-4 font-weight-bold">Members<a class="font-weight-normal view-all-link float-right" style="font-size: 14px;" href="members/">View all</a></h5>

            <input class="form-control mb-4" id="dbMembersSearch" type="text" placeholder="Type something to search list items">

            <!-- Organization Member Table -->
            <div id="getOrganizationMemberGrid"></div>

      			<!--<table class="table table-hover dashboard-table">
      				<thead>
      				  <tr>
      				    <th scope="col">#</th>
      				    <th scope="col">Date Joined</th>
      				    <th scope="col">Name</th>
      				    <th scope="col">Course & Year</th>
      				    <th scope="col">Email</th>
      				    <th scope="col">Phone Number</th>    
      				  </tr>
      				</thead>
      				<tbody id="dbMembersTable">
      				  <tr>
      				    <th scope="row">1</th>
      				    <td>11/26/20</td>
      				    <td>Sample Name</td>
      				    <td>BSIT-4</td>
      				    <td>sample@gmail.com</td>
      				    <td>09123456789</td>
      				  </tr>
      				  <tr>
      				    <th scope="row">2</th>
      				    <td>11/26/20</td>
      				    <td>Sample Name</td>
      				    <td>BSIT-4</td>
      				    <td>sample@gmail.com</td>
      				    <td>09123456789</td>
      				  </tr>
      				  <tr>
      				    <th scope="row">3</th>
      				    <td>11/26/20</td>
      				    <td>Sample Name</td>
      				    <td>BSIT-4</td>
      				    <td>sample@gmail.com</td>
      				    <td>09123456789</td>
      				  </tr>
      				  <tr>
      				    <th scope="row">4</th>
      				    <td>11/26/20</td>
      				    <td>Sample Name</td>
      				    <td>BSIT-4</td>
      				    <td>sample@gmail.com</td>
      				    <td>09123456789</td>
      				  </tr>
      				</tbody>
				    </table>-->
			   </div>
      	</div>
      </div>
      
    </div>
  </main>
  <!--Main Layout-->


<!-- jQuery -->
  <script type="text/javascript" src="../../js/jquery2.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../../js/bootstrap2.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../../js/mdb2.min.js"></script>

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
    $(document).ready(function(){
      $("#dbMembersSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dbMembersTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <!--Organization Member Grid -->
  <script type="text/javascript">
    $.ajax({
      url: "php/getOrganizationMemberGrid.php",
      type: "GET",
      success: function(response){
        $("#getOrganizationMemberGrid").append(response);
      }
    });
  </script>

  <script type="text/javascript">
    $('#orgList').load("php/changeOrganizationDropdownList.php");
  </script>
  
</body>
</html>