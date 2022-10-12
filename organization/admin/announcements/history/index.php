<?php
  require_once '../../../../db.php';
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
            <button type="button" class="btn btn-danger alert-btn btn-sm" data-toggle="modal" data-target="#announcementDetailsModal" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
    </div>
  </div>

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
            <select class="browser-default custom-select select-organization mb-5" id="switchOrgList" name="switchOrgList">
            </select>

            <div class="mx-auto text-center">
              <button type="submit" class="btn login-btn px-5">Select</button>
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Announcement Details Modal -->
  <div class="modal fade" id="announcementDetailsModal" tabindex="-1" role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-fill mb-2">
          <h5 class="modal-title" id="exampleModalLabel">Announcement Details</h5>
          <button type="button" class="close modal-close-icon" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body py-4 px-5" id="getAnnouncementHistoryModalDetails">
          <!--<label class="float-left mb-1 field-label">Announcement Title</label>
          <input type="text" id="ann_title_detail" class="form-control mb-4" value="Sample Title" disabled>

          <label class="float-left mb-1 field-label">Publish Date</label>
          <input type="text" id="ann_pub_date_detail" class="form-control mb-4" value="23 September, 2022" disabled>

          <label class="float-left mb-1 field-label">Organization</label>
          <input type="text" id="ann_org_detail" class="form-control mb-4" value="Sample Organization" disabled>

          <div class="form-group mb-4">
            <label class="float-left mb-1 field-label">Content</label>
            <textarea class="form-control rounded-0" id="ann_content_detail" rows="3" value="Some quick example text to build on the card title and make up the bulk of the card's content." disabled></textarea>
          </div>

          <div class="form-group mb-3">
            <label class="field-label mb-4">Images</label>
            <div class="announcement-images-container">
              <div class="mb-2">
                <label class="field-sub-label">Display Image</label>
              </div>
              <div class="announcement-images mb-4">
                <img src="" alt="thumbnail" id="ann_display_img_detail" class="img-thumbnail mb-1" style="width: 150px">
              </div>

              <div class="mb-2">
                <label class="field-sub-label">Article Images</label>
              </div>
              <div class="announcement-images">
                <img src="" alt="thumbnail" id="ann_article_img_detail" class="img-thumbnail mb-1" style="width: 150px">
              </div>
              
            </div>
          </div>-->

        </div>
        <div class="modal-footer">
          <div class="button-container mx-auto">
            <button type="button" class="btn close-btn" data-dismiss="modal">Close</button>
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
            <a href="#"><img src="../../../../img/ISATULogo.png" class="rounded-circle"><span class="sidenav-org-name">
              <?php echo $org_name;?>
            </span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li class="sidenav-link-item"><a href="../../" class="collapsible-header waves-effect arrow-r"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-bullhorn"></i> Announcements<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Post Announcement</span></a>
                  </li>
                  <li><a href="#" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Announcements History</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../../members" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                  <li><a href="../../members/add_member" class="waves-effect">
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
            <a class="dropdown-item" data-toggle="modal" data-target="#switchOrgModal">Switch Organization</a>
            <a class="dropdown-item" href="../../my_account">My Account</a>
            <a class="dropdown-item" href="../../php/logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>
  <!--/.Double navigation-->

  <!--Main Layout-->
  <main class="main mx-5">
    <div class="container-fluid dashboard-container mt-2 p-0">
      <h2 class="page-title mb-4">Announcements History</h2>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card p-4">

            <div class="announcements-filter-search">
              <select class="browser-default custom-select w-25 mr-3">
                <option value="1" selected>By Date</option>
                <option value="2">By Title</option>
              </select>
              <input class="form-control w-75 mb-4" id="dbOrgsSearch" type="text" placeholder="Type something to search list items">
            </div>

              <!-- Announcement History Table -->
              <div id="getAnnouncementHistoryGrid"></div>

              <!--<table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Organization</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="dbOrgsTable">
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Title</td>
                    <td>09/22/22</td>
                    <td>Organization Name</td>
                    <td><a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#announcementDetailsModal">See Details</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Title</td>
                    <td>09/22/22</td>
                    <td>Organization Name</td>
                    <td><a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#announcementDetailsModal">See Details</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Title</td>
                    <td>09/22/22</td>
                    <td>Organization Name</td>
                    <td><a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#announcementDetailsModal">See Details</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Title</td>
                    <td>09/22/22</td>
                    <td>Organization Name</td>
                    <td><a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#announcementDetailsModal">See Details</a></td>
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
    $('#switchOrgList').load("php/announcementHistoryDropdownListOrganization.php");
  </script>

  <!--Announcement History Grid -->
  <script type="text/javascript">
    $.ajax({
      url: "php/getAnnouncementHistoryGrid.php",
      type: "GET",
      success: function(response){
        $("#getAnnouncementHistoryGrid").append(response);
      }
    });
  </script>

  <!--Announcement History Modal -->
  <script type="text/javascript">
    function getAnnouncementHistoryModal(id){
      $.ajax({
        url:"php/getAnnouncementHistoryModalDetails.php",
        type: "POST",
        data: {
          "id":id
        },
        success: function(response){
          $("#getAnnouncementHistoryModalDetails").html("");
          $("#getAnnouncementHistoryModalDetails").append(response);
          //var res = response.split(',')
          //$("#ann_title_detail").val(res[0]);
          //$("#ann_pub_date_detail").val(res[1]);
          //$("#ann_org_detail").val(res[2]);
          //$("#ann_content_detail").val(res[3]);
          //console.log("res", res);
          //$("#ann_display_img_detail").attr("src",'../announcement_uploads/'+res[4]);
          //$("#ann_article_img_detail").attr("src",'../announcement_uploads/'+res[5]);
        }
      });
    }
  </script>

  
</body>
</html>