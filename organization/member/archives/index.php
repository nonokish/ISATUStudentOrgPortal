<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>ISAT-U Student's Organization Online Portal</title>
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
        <form class="">
          <div class="modal-header modal-header-fill mb-2">
            <h5 class="modal-title login-modal-title" id="loginModal">Select Organization</h5>
            <button type="button" class="close login-modal-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body py-4 px-5">
            
            <label style="font-weight: 500!important">Your organizations:</label>
            <select class="browser-default custom-select select-organization mb-5">
              <option value="1">Organization Name</option>
              <option value="2">Organization Name</option>
              <option value="3">Organization Name</option>
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

  <!-- View Image Modal -->
  <div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="viewImageModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body pb-0">
           <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(7).webp" class="img-fluid" alt="Sample image with waves effect.">
          <a>
            <div class="mask waves-effect waves-light rgba-white-slight"></div>
          </a>
        </div>
        <div class="modal-footer" style="border: none!important;">
          <a class="delete-link py-1 px-3" data-toggle="modal" data-target="#deleteAlert" data-dismiss="modal">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Adviser Details Modal -->
  <div class="modal fade" id="adviserDetailsModal" tabindex="-1" role="dialog" aria-labelledby=""
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-fill mb-2">
          <h5 class="modal-title" id="">Adviser Details</h5>
  
          <button type="button" class="close modal-close-icon" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-4">
          <div class="row">
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Name</label>
              <input type="text" id="" class="form-control mb-4" value="Adviser Name">
            </div>
            <div class="col-md-6 px-2">
            <label class="float-left mb-1 field-label">Organization</label>
              <select class="browser-default custom-select" id="orgClassification" name="" required>
                <option disabled>Select Organization</option>
                <option selected value="0">Organization Name</option>
                <option value="1">Organization Name</option>
                <option value="2">Organization Name</option>
                <option value="3">Organization Name</option>
              </select>
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Email</label>
              <input type="text" id="" class="form-control mb-4" value="adviser@gmail.com">
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Phone Number</label>
              <input type="text" id="" class="form-control mb-4" value="09123456789" disabled>
            </div>
            <div class="col-md-6 px-2">
              <label class="float-left mb-1 field-label">Date Joined</label>
              <input type="text" id="" class="form-control mb-4" value="23 September, 2022">
            </div>
          </div>
          <div class="mx-auto text-center mt-2">
            <a class="delete-btn">Delete Adviser</a>
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
            Organization Name
            </span></a>
          </div>
        </li>
        <!--/. Logo -->
        <!-- Side navigation links -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li class="sidenav-link-item"><a href="../" class="collapsible-header waves-effect arrow-r"><i class="fas fa-desktop"></i> Dashboard</a>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-users"></i> Members<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../members" class="waves-effect">
                    <span class="sv-slim"> ML </span>
                    <span class="sv-normal">Members List</span></a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidenav-link-item"><a class="collapsible-header waves-effect arrow-r active"><i class="fas fa-copy"></i> Archives</a>
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
      <h2 class="page-title mb-4">Archives</h2>

      <div class="row mb-5">
        <div class="col-md-12">
          <div class="card p-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item nav-item-archives">
                <a class="nav-link active" id="documents-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="documents"
                  aria-selected="true">Documents</a>
              </li>
              <li class="nav-item nav-item-archives">
                <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media"
                  aria-selected="false">Media Files</a>
              </li>
            </ul>
            <div class="tab-content pt-3" id="myTabContent">
              <div class="tab-pane fade show active" id="documents" role="tabpanel" aria-labelledby="documents-tab">

                <div class="archives-filter-search mt-2">
                  <select class="browser-default custom-select w-25 mr-3">
                    <option value="0" selected>By Date</option>
                    <option value="1">By Title</option>
                  </select>
                  <input class="form-control w-75 mb-4" id="dbDocumentsSearch" type="text" placeholder="Type something to search list items">
                </div>

                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Document Name</th>
                    <th scope="col">Date Uploaded</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="dbDocumentsTable">
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Document</td>
                    <td>11/01/19</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#docsDownload">Download</a>
                      <a class="delete-link py-1 px-3" data-toggle="modal" data-target="#deleteAlert">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Document</td>
                    <td>11/01/19</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#docsDownload">Download</a>
                      <a class="delete-link py-1 px-3" data-toggle="modal" data-target="#deleteAlert">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Document</td>
                    <td>11/01/19</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#docsDownload">Download</a>
                      <a class="delete-link py-1 px-3" data-toggle="modal" data-target="#deleteAlert">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Sample Document</td>
                    <td>11/01/19</td>
                    <td>
                      <a class="see-contents-link py-1 px-3" data-toggle="modal" data-target="#docsDownload">Download</a>
                      <a class="delete-link py-1 px-3" data-toggle="modal" data-target="#">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
              </div>
              <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                <div class="row mt-2">
                  <div class="col-md-4 px-2 mb-3">
                    <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(7).webp" class="img-fluid" alt="Sample image with waves effect.">
                      <a>
                      <div class="mask waves-effect rgba-white-slight"></div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 px-2 mb-3">
                    <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(6).webp" class="img-fluid" alt="Sample image with waves effect.">
                      <a>
                      <div class="mask waves-effect rgba-white-slight"></div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 px-2 mb-3">
                    <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(8).webp" class="img-fluid" alt="Sample image with waves effect.">
                      <a>
                      <div class="mask waves-effect rgba-white-slight"></div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 px-2 mb-3">
                    <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(1).webp" class="img-fluid" alt="Sample image with waves effect.">
                      <a>
                      <div class="mask waves-effect rgba-white-slight"></div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 px-2 mb-3">
                    <div class="view overlay" data-toggle="modal" data-target="#viewImageModal">
                      <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img%20(2).webp" class="img-fluid" alt="Sample image with waves effect.">
                      <a>
                      <div class="mask waves-effect rgba-white-slight"></div>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-4 px-2 mb-4">
                    <video width="100%" height="100%" controls>
                      <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4">
                      <source src="movie.ogg" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                  <div class="col-md-4 px-2 mb-4">
                    <video width="100%" height="100%" controls>
                      <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4">
                      <source src="movie.ogg" type="video/ogg">
                      Your browser does not support the video tag.
                    </video>
                  </div>

                </div>

              </div>
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
      $("#dbDocumentsSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dbDocumentsTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#dbArchivesName").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dbArchivesTable tr").filter(function() {
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
  

</body>
</html>