<?php
  require_once "../../db.php";
  if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
  }
  $organization_id = $_GET['oid'];

  $sql = "SELECT o.id as o_id, o.org_image as org_image, oc.name as org_classification, o.name as org_name, o.org_date_created as org_date_created FROM organization o INNER JOIN organization_classification oc ON o.org_classification_id = oc.id INNER JOIN user_organization uo ON o.id = uo.organization_id WHERE o.id = '$organization_id'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

  $adviserSql = "SELECT uo.organization_id as org_id, CONCAT(u.first_name, ' ', u.middle_initial, '. ', u.last_name) as adv_name FROM user u INNER JOIN user_organization uo ON u.id = uo.user_id WHERE u.user_type_id = 4 AND uo.organization_id = '$organization_id'";
	$adviserResult = mysqli_query($conn, $adviserSql);
	$adviserRow = mysqli_fetch_assoc($adviserResult);

	$o_id = $row['o_id'];
	$org_image = $row['org_image'];
  if($row['org_image']){
      $src = '../../superadmin/organizations/add_organization/organization_uploads/'.$org_image.'';
  } else {
      $src = "../../img/ISATULogo.png";
  }
	$org_classification = $row['org_classification'];
	$org_name = $row['org_name'];
	$org_date_created = $row['org_date_created'];
	$adv_name = $adviserRow['adv_name'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ISAT-U Student's Organization Online Portal</title>
    <!-- MDB icon -->
    <link rel="icon" href="../img/ISATULogo.png" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Poppins -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../../css/mdb.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/style.css" />
  </head>
  
  <body>
    <!-- Start your project here-->

    <!-- Modals -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby=""
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" method="POST" action="../../login.php">
            <div class="modal-header modal-header-fill mb-2">
              <h5 class="modal-title login-modal-title" id="loginModal">Login</h5>
              <button type="button" class="close login-modal-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body py-4 px-5">
              <div class="input-group mb-4">
                <span class="input-group-text border-0" id="search-addon"><i class="fas fa-envelope" style="font-size: 24px; color:#003366;"></i></span>
                <input
                  type="text"
                  class="form-control rounded login-field"
                  placeholder="Email"
                  aria-label="Email"
                  aria-describedby=""
                  id="loginEmail"
                  name="loginEmail"
                />
              </div>

              <div class="input-group mb-3">
                <span class="input-group-text border-0" id="search-addon"><i class="fas fa-unlock" style="font-size: 24px; color:#003366;"></i></span>
                <input
                  type="password"
                  class="form-control rounded login-field"
                  placeholder="Password"
                  aria-label="Password"
                  aria-describedby=""
                  id="loginPassword"
                  name="loginPassword"
                />
              </div> 
            </div>
            <div class="modal-footer">
              <div class="mx-auto">
                <button type="submit" class="btn login-btn px-5">LOGIN</button>
              </div>
            </div>
          <!--</div>-->
          </form>
          
        </div>
      </div>
    </div>

      <!-- Top Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark top-navbar px-5">
        <!-- Container wrapper -->
        <div class="container-fluid top-navbar-section">
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item me-2">
              <a class="nav-link"><i class="fas fa-phone me-2"></i>+639123456789</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"><i class="fas fa-envelope me-2"></i>studentrepublic@isatu.edu.ph</a>
            </li>
          </ul>
          <!-- Left links -->

          <!-- Right elements -->
          <?php
            if($user_id){
              echo '';
            } else {
              echo '
                <div class="d-flex align-items-center top-navbar-right px-4">
                  <!-- Icon -->
                  <a type="button" class="text-reset" data-toggle="modal" data-target="#loginModal">
                    <i class="fas fa-sign-in-alt pe-2"></i>Login
                  </a>
                </div>
              ';
            }
          ?>
          <!--<div class="d-flex align-items-center top-navbar-right px-4">-->
            <!-- Icon -->
            <!--<a type="button" class="text-reset" data-toggle="modal" data-target="#loginModal">
              <i class="fas fa-sign-in-alt pe-2"></i>Login
            </a>-->
          <!--</div>-->
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Top Navbar -->

      <!-- Main Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top main-navbar px-5">
        <!-- Container wrapper -->
        <div class="container-fluid main-navbar-section">
          <!-- Toggle button -->
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarCenteredExample"
            aria-controls="navbarCenteredExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>

          <!-- Collapsible wrapper -->
          <div
            class="collapse navbar-collapse justify-content-evenly"
            id="navbarCenteredExample"
          >
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item me-2">
              <!-- Navbar brand -->
              <a class="navbar-brand mt-2 mt-lg-0" href="../../">
                <img
                  src="../../img/ISATULogo.png"
                  height="60"
                  alt="ISAT-U Logo"
                  loading="lazy"
                />
                <div class="ms-2 main-navbar-title" style="color: #003366;">ISAT-U Student's Organization Portal</div>
              </a>
              </li>
     
            </ul>
            <!-- Left links -->
           

            <!-- Right links -->
            <ul class="navbar-nav mb-2 mb-lg-0 main-navbar-right">
              <li class="nav-item px-2">
                <a class="nav-link nav p-3" aria-current="page" href="../../">Home</a>
              </li>
              <li class="nav-item ps-2">
                <a class="nav-link nav p-3 active" href="../">Organizations</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link nav p-3" href="../../about">About Us</a>
              </li>
            </ul>
            <!-- Right links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
    <!-- Main Navbar -->

    <section class="container-fluid organizations-section px-5" id="announcements">

    <!-- Breadcrumb -->
    <nav class="d-flex mb-4">
      <h6 class="mb-0">
        <a href="../../#postsContainer" class="text-reset breadcrumbs-link">Home</a>
        <span>/</span>
        <a href="../" class="text-reset breadcrumbs-link">
          Organizations
        </a>
        <span>/</span>
        <a href="" class="text-reset breadcrumbs-link active">
          Organization Name
        </a>
      </h6>
    </nav>
    <!-- Breadcrumb -->

    <div class="row">
      <div class="col-md-12">
        <div class="card org-details-card py-4 px-5">
          <div class="row">
            <div class="col-md-4 d-flex flex-row align-items-center">
              <img
                src="<?php echo $src; ?>"
                class="img-fluid rounded-circle org-details-logo me-4"
                alt="Organization Logo"
              />
              <div class="org-details-name"><?php if($organization_id) { echo $org_name; } else { echo "Organization name"; } ?></div>
            </div>
            <div class="col-md-8 d-flex align-items-center">
              <div class="row" style="margin-left: 20%;">
                <div class="col-md-6 mb-1">
                  <label class="org-details-label me-2">Classification: </label>
                  <span><?php if($organization_id) { echo $org_classification; } else { echo "Organization classification"; } ?></span>
                </div>
                <div class="col-md-6 mb-1">
                  <label class="org-details-label me-2">Adviser: </label>
                  <span><?php if($organization_id) { echo $adv_name; } else { echo "Adviser name"; } ?></span>
                </div>
                <div class="col-md-6 mb-1">
                  <label class="org-details-label me-2">Date Joined: </label>
                  <span>January 1, 2000</span>
                </div>
                <div class="col-md-6 mb-1">
                  <label class="org-details-label me-2">Date Created: </label>
                  <span><?php if($organization_id) { echo $org_date_created; } else { echo "-----"; } ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </section>

    <section class="container-fluid org-posts-section px-5 mb-5" id="">
      <div class="section-title-container d-flex mb-3">
        <div class="section-title me-2">
          <!-- Tabs navs -->
            <ul class="nav nav-pills posts-pills-container" id="ex-with-icons" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link posts-pills active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#ex-with-icons-tabs-1" role="tab"
                  aria-controls="ex-with-icons-tabs-1" aria-selected="true"><i class="fas fa-newspaper me-2"></i>Newsfeed</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link posts-pills" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2" role="tab"
                  aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i class="fas fa-bullhorn me-2"></i>Announcements</a>
              </li>
            </ul>
            <!-- //Tabs navs -->
            
        </div>
        <div class="section-title-divider flex-grow-1"></div>
      </div>

      <!-- Tabs content -->
      <div class="tab-content" id="ex-with-icons-content">

        <!-- Newsfeed -->
        <div class="tab-pane fade posts-tab-content show active" id="ex-with-icons-tabs-1" role="tabpanel" aria-labelledby="ex-with-icons-tab-1">
          <div class="posts-container">
            <div class="row posts-grid mt-5">
              <div class="col-md-4">
                <div class="sort-date-container">
                  <div class="input-group mb-4">
                    <div class="form-outline">
                      <input type="search" id="newsfeedInputFilter" class="form-control" />
                      <label class="form-label" for="newsfeedInputFilter">Search</label>
                    </div>
                    <button type="button" class="btn btn-search btn-search-newsfeed">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                  <div class="sort-date">
                    <h6 class="mb-3">Sort by date</h6>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="sortDate" id="newsfeedAllDate" checked/>
                      <label class="form-check-label" for="newsfeedAllDate"> All </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="sortDate" id="newsfeedTodayDate"/>
                      <label class="form-check-label" for="newsfeedTodayDate"> Today </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="sortDate" id="newsfeedWeekDate"/>
                      <label class="form-check-label" for="newsfeedWeekDate"> This Week </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="sortDate" id="newsfeedMonthDate"/>
                      <label class="form-check-label" for="newsfeedMonthDate"> This Month </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="radio" name="sortDate" id="newsfeedYearDate"/>
                      <label class="form-check-label" for="newsfeedYearDate"> This Year </label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="row newsfeed-grid" id="getHomePageNewsfeedHistoryCard">
                  <input type="hidden" id="org_id" name="org_id" value="<?php if($organization_id) { echo $organization_id; } else { echo "0"; } ?>">
                  <!--<div class="col-md-12">
                    <div class="card nf-post-card py-4 px-5">
                      <div class="nf-post-body mb-4">
                        <div class="nf-post-org-name">Organization Name</div>
                          <div class="nf-post-date-author mb-2">Posted 3 mins ago</div>
                          <div class="nf-post-caption">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                          </div>
                      </div>
                      <img src="../../img/image_icon.png" class="nf-post-img" alt="Post Image"/>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="card nf-post-card py-4 px-5">
                      <div class="nf-post-body mb-4">
                        <div class="nf-post-org-name">Organization Name</div>
                          <div class="nf-post-date-author mb-2">Posted 3 mins ago</div>
                          <div class="nf-post-caption">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                          </div>
                      </div>
                      <img src="../../img/image_icon.png" class="nf-post-img" alt="Post Image"/>
                    </div>
                  </div>-->

                  <!-- If there are no announcements -->
                  <!-- <div class="text-center mt-3" style="font-size: 24px; font-weight: bold; color: grey;">There are no announcements right now</div> -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //Newsfeed -->

        <!-- Announcements -->
        <div class="tab-pane fade show posts-tab-content" id="ex-with-icons-tabs-2" role="tabpanel" aria-labelledby="ex-with-icons-tab-2">

            <div class="posts-container" id="postsContainer">

              <!-- Audience select tabs -->
              <ul class="nav nav-tabs audience-select-container" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link audience-select active"
                    id="ex1-tab-1"
                    data-mdb-toggle="tab"
                    href="#ex1-tabs-1"
                    role="tab"
                    aria-controls="ex1-tabs-1"
                    aria-selected="true"
                    >All Organizations</a
                  >
                </li>
                <li class="nav-item" role="presentation">
                  <a
                    class="nav-link audience-select"
                    id="ex1-tab-2"
                    data-mdb-toggle="tab"
                    href="#ex1-tabs-2"
                    role="tab"
                    aria-controls="ex1-tabs-2"
                    aria-selected="false"
                    >Your Organizations</a
                  >
                </li>
              </ul>
              <!-- //Audience select tabs -->

              <!-- Audience select content -->
              <div class="tab-content" id="ex1-content">
                <div
                  class="tab-pane fade show active"
                  id="ex1-tabs-1"
                  role="tabpanel"
                  aria-labelledby="ex1-tab-1"
                >
                
                  <div class="row posts-grid">
                    <div class="col-md-4">
                      <div class="sort-date-ann-container">
                        <div class="input-group mb-4">
                          <div class="form-outline">
                            <input type="search" id="annInputFilter" class="form-control" />
                            <label class="form-label" for="annInputFilter">Search</label>
                          </div>
                          <button type="button" class="btn btn-search btn-search-ann">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                        <div class="sort-date">
                          <h6 class="mb-3">Sort by date</h6>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="sortDate" id="annAllDate" checked/>
                            <label class="form-check-label" for="annAllDate"> All </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="sortDate" id="annTodayDate"/>
                            <label class="form-check-label" for="annTodayDate"> Today </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="sortDate" id="annWeekDate"/>
                            <label class="form-check-label" for="annWeekDate"> This Week </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="sortDate" id="annMonthDate"/>
                            <label class="form-check-label" for="annMonthDate"> This Month </label>
                          </div>
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="sortDate" id="annYearDate"/>
                            <label class="form-check-label" for="annYearDate"> This Year </label>
                          </div>
                        </div>
                      </div>
                    </div>

                      <div class="col-md-8 px-0">
                        <div class="row announcements-grid" id="getHomePageAnnouncementHistoryCard">
                          <!-- <div class="col-md-4 px-3">
                            <div class="card announcements-card">
                              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/mel.jpg" class="img-fluid"/>
                                <a href="#!">
                                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="announcements-date-author mb-3">August 29, 2022<span class="mx-2">/</span>Math Club</div>
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#!" class="btn btn-read-more">Read More</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 px-3">
                            <div class="card announcements-card">
                              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/mel.jpg" class="img-fluid"/>
                                <a href="#!">
                                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="announcements-date-author mb-3">August 29, 2022<span class="mx-2">/</span>Math Club</div>
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#!" class="btn btn-read-more">Read More</a>
                              </div>
                            </div>
                          </div> -->

                          <!-- If there are no announcements -->
                          <!-- <div class="text-center mt-3" style="font-size: 24px; font-weight: bold; color: grey;">There are no announcements right now</div> -->

                        </div>
                      </div>
                    </div>
                  </div>
  
                <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                  <div class="row posts-grid">
                    <div class="col-md-4">
                      <div class="input-group mb-4">
                        <div class="form-outline">
                          <input type="search" id="yourOrgAnnInputFilter" class="form-control" />
                          <label class="form-label" for="yourOrgAnnInputFilter">Search</label>
                        </div>
                        <button type="button" class="btn btn-search btn-search-yourOrgAnn">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                      <div class="sort-date">
                        <h6 class="mb-3">Sort by date</h6>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="sortDate" id="yourOrgAnnAllDate" checked/>
                          <label class="form-check-label" for="yourOrgAnnAllDate"> All </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="sortDate" id="yourOrgAnnTodayDate"/>
                          <label class="form-check-label" for="yourOrgAnnTodayDate"> Today </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="sortDate" id="yourOrgAnnWeekDate"/>
                          <label class="form-check-label" for="yourOrgAnnWeekDate"> This Week </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="sortDate" id="yourOrgAnnMonthDate"/>
                          <label class="form-check-label" for="yourOrgAnnMonthDate"> This Month </label>
                        </div>
                        <div class="form-check mb-2">
                          <input class="form-check-input" type="radio" name="sortDate" id="yourOrgAnnYearDate"/>
                          <label class="form-check-label" for="yourOrgAnnYearDate"> This Year </label>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-8 px-0">
                      <div class="row announcements-grid" id="getHomePageYourOrgAnnouncementHistoryCard">

                      </div>
                      
                      <!-- If there are no announcements -->
                      <!--<div class="text-center mt-3" style="font-size: 24px; font-weight: bold; color: grey;">There are no announcements yet</div> -->
                    </div>
                  </div>
                    
                </div>
              <!-- //Audience select content -->
            </div>
          </div>
     
          
        </div>
        <!-- //Announcements -->

      </div>
      <!-- //Tabs content -->

      
    </section>

    <!-- Footer -->
      <footer class="text-center text-lg-start isatu-footer">

        <div class="isatu-footer-section">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between py-5" style="background-color: #003366;">
          <!-- Left -->
          <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
          </div>
          <!-- Left -->

          <!-- Right -->
          <div>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="mb-4 fw-bold">
                  ISAT-U<br>
                  Student's Organization Portal
                </h6>
                <p>
                  Here you can use rows and columns to organize your footer content. Lorem ipsum
                  dolor sit amet, consectetur adipisicing elit.
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Our Campus
                </h6>
                <p>
                  <a href="#!" class="text-reset">ISAT-U Site</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">ISAT-U Site 2</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">ISAT-U Site 3</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">ISAT-U Site 4</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">
                  Other links
                </h6>
                <p>
                  <a href="#!" class="text-reset">Sitemap</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">External Campuses</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Archive</a>
                </p>
                <p>
                  <a href="#!" class="text-reset">Alumni</a>
                </p>
              </div>
              <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                <p><i class="fas fa-home me-3"></i> Burgos St. La Paz, Iloilo City, Philippines 5000</p>
                <p>
                  <i class="fas fa-envelope me-3"></i>
                  studentrepublic@isatu.edu.ph
                </p>
                <p><i class="fas fa-phone me-3"></i> (033) 320-7190</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->

        </div>

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: #011f3e;">
          © 2022 Copyright:
          <a class="text-reset fw-bold" href="https://www.isatu.edu.ph/">Iloilo Science and Technology University</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->



    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/jquery2.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap2.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../js/mdb.min.js"></script>
    <script type="text/javascript" src="../../js/mdb2.min.js"></script>

    <!-- Announcement History Card -->
    <script type="text/javascript">
      var org_id = $("#org_id").val();
      var filter_input = "";
      var filter_radio = "";
      $.ajax({
        url: "php/getHomePageAnnouncementHistoryCard.php",
        type: "GET",
        data: {
          "oid":org_id,
          "filter_input":"",
          "filter":"all"
        },
        success: function(response){
          $("#getHomePageAnnouncementHistoryCard").html("");
          $("#getHomePageAnnouncementHistoryCard").append(response);
        }
      });

      $("#annInputFilter").click(function () {
        var input_filter_value = $("#annInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $(".btn-search-ann").click(function () {
        var input_filter_value = $("#annInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#annAllDate").click(function () {
        filter_radio = "all";
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#annTodayDate").click(function () {
        filter_radio = "today";
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#annWeekDate").click(function () {
        filter_radio = "this_week";
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#annMonthDate").click(function () {
        filter_radio = "this_month";
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#annYearDate").click(function () {
        filter_radio = "this_year";
        $.ajax({
          url: "php/getHomePageAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageAnnouncementHistoryCard").html("");
            $("#getHomePageAnnouncementHistoryCard").append(response);
          }
        });
      });
    </script>

    <!-- Your Org Announcement History Card -->
    <script type="text/javascript">
      var org_id = $("#org_id").val();
      var filter_input = "";
      var filter_radio = "";
      $.ajax({
        url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
        type: "GET",
        data: {
          "oid":org_id,
          "filter_input":"",
          "filter":"all"
        },
        success: function(response){
          $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
          $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
        }
      });

      $("#yourOrgAnnInputFilter").click(function () {
        var input_filter_value = $("#yourOrgAnnInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $(".btn-search-yourOrgAnn").click(function () {
        var input_filter_value = $("#yourOrgAnnInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#yourOrgAnnAllDate").click(function () {
        filter_radio = "all";
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#yourOrgAnnTodayDate").click(function () {
        filter_radio = "today";
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#yourOrgAnnWeekDate").click(function () {
        filter_radio = "this_week";
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#yourOrgAnnMonthDate").click(function () {
        filter_radio = "this_month";
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });

      $("#yourOrgAnnYearDate").click(function () {
        filter_radio = "this_year";
        $.ajax({
          url: "php/getHomePageYourOrgAnnouncementHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageYourOrgAnnouncementHistoryCard").html("");
            $("#getHomePageYourOrgAnnouncementHistoryCard").append(response);
          }
        });
      });
    </script>

    <!-- Newsfeed History Card -->
    <script type="text/javascript">
      var org_id = $("#org_id").val();
      var filter_input = "";
      var filter_radio = "";
      $.ajax({
        url: "php/getHomePageNewsfeedHistoryCard.php",
        type: "GET",
        data: {
          "oid":org_id,
          "filter_input":"",
          "filter":"all"
        },
        success: function(response){
          $("#getHomePageNewsfeedHistoryCard").html("");
          $("#getHomePageNewsfeedHistoryCard").append(response);
        }
      });

      $("#newsfeedInputFilter").click(function () {
        var input_filter_value = $("#newsfeedInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $(".btn-search-newsfeed").click(function () {
        var input_filter_value = $("#newsfeedInputFilter").val();
        filter_input = input_filter_value;
        if(filter_radio == ""){
          filter_radio = "all";
        } else {
          filter_radio = filter_radio;
        }
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $("#newsfeedAllDate").click(function () {
        filter_radio = "all";
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $("#newsfeedTodayDate").click(function () {
        filter_radio = "today";
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $("#newsfeedWeekDate").click(function () {
        filter_radio = "this_week";
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $("#newsfeedMonthDate").click(function () {
        filter_radio = "this_month";
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });

      $("#newsfeedYearDate").click(function () {
        filter_radio = "this_year";
        $.ajax({
          url: "php/getHomePageNewsfeedHistoryCard.php",
          type: "GET",
          data: {
            "oid":org_id,
            "filter_input":filter_input,
            "filter":filter_radio
          },
          success: function(response){
            $("#getHomePageNewsfeedHistoryCard").html("");
            $("#getHomePageNewsfeedHistoryCard").append(response);
          }
        });
      });
    </script>

    <script type="text/javascript">
      
    </script>

  </body>
</html>
