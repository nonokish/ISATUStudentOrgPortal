<?php
require_once "../../db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal - Super Admin</title>
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
  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav fixed wide org-side-nav">
      <ul class="custom-scrollbar">
        <!-- Logo -->
        <li>
          <div class="logo-wrapper sn-ad-avatar-wrapper p-2">
            <a href="#"><img src="../../img/ISATULogo.png" class="rounded-circle"><span class="sidenav-org-name">Super Admin</span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
          	<li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r" href="../"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="far fa-newspaper"></i> Newsfeed<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="" class="waves-effect">
                    <span class="sv-slim"> PA </span>
                    <span class="sv-normal">Add a Post</span></a>
                  </li>
                  <li><a href="manage_posts" class="waves-effect">
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
                  <li><a href="../announcements/history" class="waves-effect">
                    <span class="sv-slim"> AH </span>
                    <span class="sv-normal">Announcements History</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-user-tie"></i> Advisers<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../advisers" class="waves-effect">
                    <span class="sv-slim"> AL </span>
                    <span class="sv-normal">Advisers List</span></a>
                  </li>
                  <li><a href="../advisers/add_adviser" class="waves-effect">
                    <span class="sv-slim"> AA </span>
                    <span class="sv-normal">Add Adviser</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Organizations<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../organizations" class="waves-effect">
                    <span class="sv-slim"> OL </span>
                    <span class="sv-normal">Organizations List</span></a>
                  </li>
                  <li><a href="../organizations/add_organization" class="waves-effect">
                    <span class="sv-slim"> AO </span>
                    <span class="sv-normal">Add Organization</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r" href="../archives"><i class="fas fa-copy"></i> Archives</a>
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
      <h2 class="page-title mb-4">Add a Post</h2>

      <div class="row mb-5">
      	<div class="col-md-7">
          <form class="text-center border border-light p-5 post-announcement-form" action="./php/postAnnouncement.php" method="POST" enctype="multipart/form-data">

              <p class="h5 mb-4 font-weight-normal text-left">Fill out post details</p>

              <div class="form-row">
                <div class="col-md-6">
                  <label class="float-left mb-1 field-label">Publish Date</label>
                    <input placeholder="Select Date" type="date" id="annDate" name="pub_date" class="form-control datepicker mb-4">
                </div>
                <div class="col-md-6">
                  <label class="float-left mb-1 field-label">Publish Time</label>
                    <input placeholder="Select Time" type="time" id="annTime" name="pub_time" class="form-control timepicker mb-4">
                </div>
              </div>

              <label class="float-left mb-1 field-label">Organization</label>
              <select class="browser-default custom-select mb-4" id="orgList" name="org_list" required>
              </select>

              <div class="form-group mb-5">
                 <label class="float-left mb-1 field-label">Caption</label>
                <textarea class="form-control rounded-0" id="annContent" name="ann_content" rows="3" placeholder="Write Something..." required></textarea>
              </div>

              <div class="form-group mb-5">
                <label class="field-label mb-4">Upload Image</label>
                <div class="upload-images">
                  <div class="mb-2">
                    <label class="field-sub-label">Post Image</label>
                  </div>
                  <input class="upload-btn w-100 mb-4" type="file" id="ann_display_image_id" name="ann_display_image" required/>

                  <!--<div class="mb-2">
                    <label class="field-sub-label">Article Images</label>
                  </div>
                  <input class="upload-btn w-100" type="file" id="articleImages" name="files[]" multiple />-->
                </div>
              </div>

              <button class="btn btn-block preview-btn" type="submit">Post</button>

          </form>

      	</div>

        <div class="col-md-5">
          <div class="preview-header mb-2">Preview</div>

          <div class="card prev-nf-post-card py-4 px-4">
            <div class="nf-post-body mb-4">
              <div class="nf-post-org-name">Organization Name</div>
                <div class="nf-post-date-author mb-2">Posted 3 mins ago</div>
                <div class="nf-post-caption">
                  Some quick example text to build on the card title and make up the bulk of the card's content.
                </div>
            </div>
            <img src="../../img/image_icon.png" class="prev-nf-post-img" alt="Post Image"/>
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
        $("#articleImages").on("change", function(e) {
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
                "</span>").insertAfter("#articleImages");
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

  

  

</body>
</html>