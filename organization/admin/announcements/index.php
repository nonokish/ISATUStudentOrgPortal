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
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-bullhorn"></i> Announcements<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Post Announcement</span></a>
                  </li>
                  <li><a href="./history" class="waves-effect">
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
            <a class="dropdown-item" href="../php/logout.php">Logout</a>
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
      <h2 class="page-title mb-4">Post Announcement</h2>

      <div class="row mb-5">
      	<div class="col-md-7">
          <form class="text-center border border-light p-5 post-announcement-form" action="./php/postAnnouncement.php" method="POST" enctype="multipart/form-data">

              <p class="h5 mb-4 font-weight-normal text-left">Fill out announcement details</p>

              <label class="float-left mb-1 field-label">Announcement Title</label>
              <input type="text" id="annTitle" name="ann_title" class="form-control mb-4" placeholder="Enter Announcement Title" required>

              <label class="float-left mb-1 field-label">Publish Date</label>
                <input placeholder="Select Date" type="date" id="annDate" name="pub_date" class="form-control datepicker mb-4">

              <label class="float-left mb-1 field-label">Organization</label>
              <select class="browser-default custom-select mb-4" id="orgList" name="org_list" required>
              </select>

              <div class="form-group mb-5">
                 <label class="float-left mb-1 field-label">Content</label>
                <textarea class="form-control rounded-0" id="annContent" name="ann_content" rows="3" placeholder="Write Something..." required></textarea>
              </div>

              <div class="form-group mb-5">
                <label class="field-label mb-4">Upload Images</label>
                <div class="upload-images">
                  <div class="mb-2">
                    <label class="field-sub-label">Display Image</label>
                  </div>
                  <input class="upload-btn w-100 mb-4" type="file" id="ann_display_image_id" name="ann_display_image" required/>

                  <!--<div class="mb-2">
                    <label class="field-sub-label">Article Images</label>
                  </div>
                  <input class="upload-btn w-100" type="file" id="ann_article_image_id" name="ann_article_image" multiple />-->
                </div>
              </div>

              <button class="btn btn-block preview-btn" type="submit">Post</button>

          </form>

      	</div>

        <div class="col-md-5">
          <div class="preview-header mb-2">Preview</div>

          <div class="card announcements-card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="../../../img/mel.jpg" class="img-fluid" id="card_display_img"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <div class="announcements-date-author mb-3"><label id="card_pub_date"></label><span class="mx-2">/</span><label id="card_org"></label></div>
              <h5 class="card-title" id="card_title">Card title</h5>
              <p class="card-text" id="card_content">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#!" class="btn btn-read-more">Read More</a>
            </div>
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

  <script type="text/javascript">
    $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#displayImage").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove</span>" +
                "</span>").insertAfter("#displayImage");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });
              
              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/
              
            });
            fileReader.readAsDataURL(f);
          }
          console.log(files);
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
    });
  </script>
  
  <!--<script type="text/javascript">
    $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#ann_article_image_id").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          for (var i = 0; i < filesLength; i++) {
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                "<br/><span class=\"remove\">Remove</span>" +
                "</span>").insertAfter("#ann_article_image_id");
              $(".remove").click(function(){
                $(this).parent(".pip").remove();
              });
              
              // Old code here
              /*$("<img></img>", {
                class: "imageThumb",
                src: e.target.result,
                title: file.name + " | Click to remove"
              }).insertAfter("#files").click(function(){$(this).remove();});*/
              
            });
            fileReader.readAsDataURL(f);
          }
          console.log(files);
        });
      } else {
        alert("Your browser doesn't support to File API")
      }
    });
  </script>-->

  <script type="text/javascript">
    $('#switchOrgList').load("php/postAnnouncementDropdownListOrganization.php");
  </script>

  <script type="text/javascript">
    $('#orgList').load("php/postAnnouncementDropdownListOrganization.php");
  </script>

  <script type="text/javascript">
    $("#annTitle").change(function(){
      var card_title = $("#annTitle").val();
      $("#card_title").text(card_title);
    });

    $("#annDate").change(function(){
      var card_pub_date = $("#annDate").val();
      $("#card_pub_date").text(card_pub_date);
    });

    $("#orgList").change(function(){
      var card_org = $("#orgList option:selected").text();
      $("#card_org").text(card_org);
    });

    $("#annContent").change(function(){
      var card_content = $("#annContent").val();
      $("#card_content").text(card_content);
    });

    $("#ann_display_image_id").change(function(){
      var file = $("#ann_display_image_id").get(0).files[0];
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#card_display_img").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    });
  </script>

  

</body>
</html>