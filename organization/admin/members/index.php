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

  <!-- Member Details Modal -->
  <div class="modal fade" id="memberDetailsModal" tabindex="-1" role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-fill mb-2">
          <h5 class="modal-title" id="">Member Details</h5>
  
          <button type="button" class="close modal-close-icon" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-4" id="getMemberModalDetails">
          <!--<div class="row">
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Name</label>
              <input type="text" id="" class="form-control mb-4" value="Member Name">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Department</label>
              <input type="text" id="" class="form-control mb-4" value="Department Name">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Course & Year</label>
              <input type="text" id="" class="form-control mb-4" value="Course & Year">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Email</label>
              <input type="text" id="" class="form-control mb-4" value="member@gmail.com">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Phone Number</label>
              <input type="text" id="" class="form-control mb-4" value="09123456789">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Designation</label>
              <input type="text" id="" class="form-control mb-4" value="Designation Name">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Date Joined</label>
              <input type="date" id="" class="form-control datepicker mb-4" value="1980-08-26">
            </div>
          </div>-->
          <div class="mx-auto text-center mt-2">
            <a class="delete-btn">Delete Member</a>
          </div>
        </div>
        <div class="modal-footer">
          <div class="button-container mx-auto">
            <button type="button" class="btn close-btn" data-dismiss="modal">Close</button>
            <button type="button" class="btn save-btn">Save Changes</button>
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
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-bullhorn"></i> Announcements<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../announcements" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Post Announcement</span></a>
                  </li>
                  <li><a href="../announcements/history" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Announcements History</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                  <li><a href="./add_member" class="waves-effect">
                    <span class="sv-slim"> AM </span>
                    <span class="sv-normal">Add Member</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a href="../archives" class="collapsible-header waves-effect arrow-r"><i class="fas fa-copy"></i> Archives</a>
            </li>
            <li class="sidenav-link-item"><a href="../settings" class="collapsible-header waves-effect arrow-r"><i class="fas fa-cog"></i> Settings</a>
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
      <h2 class="page-title mb-4">Members List</h2>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card p-4">

            <div class="advisers-filter-search">
              <select class="browser-default custom-select w-25 mr-3">
                <option value="0" selected>By Date</option>
                <option value="1">By Title</option>
              </select>
              <input class="form-control w-75 mb-4" id="dbMembersSearch" type="text" placeholder="Type something to search list items">
            </div>

              <!-- Member Table -->
              <div id="getMembersDetailsGrid"></div>
              <!--<table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date Joined</th>
                    <th scope="col">Name</th>
                    <th scope="col">Course & Year</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="dbMembersTable">
                  <tr>
                    <th scope="row">1</th>
                    <td>11/26/22</td>
                    <td>Member Name</td>
                    <td>BSIT-1</td>
                    <td>sample@gmail.com</td>
                    <td>09123456789</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#memberDetailsModal">See Details</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>11/26/22</td>
                    <td>Member Name</td>
                    <td>BSIT-1</td>
                    <td>sample@gmail.com</td>
                    <td>09123456789</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#memberDetailsModal">See Details</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>11/26/22</td>
                    <td>Member Name</td>
                    <td>BSIT-1</td>
                    <td>sample@gmail.com</td>
                    <td>09123456789</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#memberDetailsModal">See Details</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>11/26/22</td>
                    <td>Member Name</td>
                    <td>BSIT-1</td>
                    <td>sample@gmail.com</td>
                    <td>09123456789</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#memberDetailsModal">See Details</a>
                    </td>
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
    $(document).ready(function(){
      $("#dbOrgsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dbOrgsTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
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

  <script type="text/javascript">
    $('.datepicker').pickadate({
      weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
      showMonthsShort: true,
      })
  </script>

  <!-- Member Details Grid -->
  <script type="text/javascript">
    $.ajax({
      url: "php/getMembersDetailsGrid.php",
      type: "GET",
      success: function(response){
        $("#getMembersDetailsGrid").append(response);
      }
    });
  </script>

  <script type="text/javascript">
    $('#orgList').load("php/changeOrganizationDropdownList.php");
  </script>

  <!--Member Details Modal -->
  <script type="text/javascript">
    function getMemberDetailsModal(id){
      $.ajax({
        url:"php/getMemberModalDetails.php",
        type: "POST",
        data: {
          "id":id
        },
        success: function(response){
          $("#getMemberModalDetails").html("");
          $("#getMemberModalDetails").append(response);
        }
      });
    }
  </script>
  

</body>
</html>