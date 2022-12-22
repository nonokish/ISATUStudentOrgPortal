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
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  
  <body>
    <!-- Start your project here-->

    <!-- Modals -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby=""
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" method="POST" action="../login.php">
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
          <div class="d-flex align-items-center top-navbar-right px-4">
            <!-- Icon -->
            <a type="button" class="text-reset" data-toggle="modal" data-target="#loginModal">
              <i class="fas fa-sign-in-alt pe-2"></i>Login
            </a>
          </div>
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
              <a class="navbar-brand mt-2 mt-lg-0" href="../">
                <img
                  src="../img/ISATULogo.png"
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
                <a class="nav-link nav p-3" aria-current="page" href="../">Home</a>
              </li>
              <li class="nav-item ps-2">
                <a class="nav-link nav p-3" href="../organizations">Organizations</a
                >
              </li>
              <li class="nav-item px-2">
                <a class="nav-link nav p-3 active" href="#">About Us</a>
              </li>
            </ul>
            <!-- Right links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
    <!-- Main Navbar -->

    <div class="subhero-section-container mb-5">
    <div class="bg-image">
      <img
        src="../img/isat.jpeg"
        class="img-fluid subhero-image"
        alt="Sample"
      />
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="d-flex justify-content-center align-items-center h-100">
          <p class="text-white mb-0 subhero-title">About Us</p>
        </div>
      </div>
    </div>
    </div>

    <section class="container-fluid announcements-section px-5" id="announcements">

    <div class="row px-5" style="margin-bottom: 100px;">
      <div class="col-md-6 px-4">
        <div class="subpage-section-title" style="width: 80%!important;">
          <h3 class="mb-5">ISAT-U Student's Organization</h3>
        </div>
        <div class="mx-auto">
        <p>ISAT-U Students Organization aims to build relationship, develop students' leadership skills, determines learner's bilities and limitations and enhanced engagement in learning in different aspects.
        <br>
        Students organization allowing students to explore their interests, knowledge and skills to gain real lifelong experiences.</p>
        </div>
      </div>
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide about-us-slide" data-mdb-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../img/isat6.jpg" class="d-block w-100" alt="ISAT-U Image"/>
            </div>
            <div class="carousel-item">
              <img src="../img/isat5.jpg" class="d-block w-100" alt="ISAT-U Image"/>
            </div>
            <div class="carousel-item">
              <img src="../img/isat4.jpg" class="d-block w-100" alt="ISAT-U Image"/>
            </div>
            <div class="carousel-item">
              <img src="../img/isat7.jpg" class="d-block w-100" alt="ISAT-U Image"/>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>

    <div class="row px-5">
      <div class="col-md-12">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs org-tabs mb-3" id="ex1" role="tablist">
          <li class="nav-item" role="presentation">
            <a
              class="nav-link org-tabs active"
              id="ex1-tab-1"
              data-mdb-toggle="tab"
              href="#ex1-tabs-1"
              role="tab"
              aria-controls="ex1-tabs-1"
              aria-selected="true"
              >List of Organizations</a
            >
          </li>
          <li class="nav-item" role="presentation">
            <a
              class="nav-link org-tabs"
              id="ex1-tab-2"
              data-mdb-toggle="tab"
              href="#ex1-tabs-2"
              role="tab"
              aria-controls="ex1-tabs-2"
              aria-selected="false"
              >Classification of Organizations</a
            >
          </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content py-4" id="ex1-content">
          <div
            class="tab-pane fade show active"
            id="ex1-tabs-1"
            role="tabpanel"
            aria-labelledby="ex1-tab-1"
          >
            <div class="org-content-content">
              <div class="row">
                <div class="col-md-12">
                  <div class="card p-3">
                    <div class="card-body">
                      <div class="org-content-title mb-5">
                        Name of Organizations – Coordinator/Adviser
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="org-list mb-4">
                            <div class="card-title">
                              A. Student Republic Organization
                            </div>
                            Mr. Joselito P. Mendoza – Chair, Board of Adviser
                            <br>
                            Mrs. Mary Jean Nobleza – Adviser, Dept. of Finance
                            <br>
                            Mr. Bonnie S. Arenal – Adviser, DILG
                            <br>
                            Mr. George L. Lopez II – Adviser, Dept. of External Affairs
                            <br>
                            Dr. Georgia Demavibas – Adviser, Dept. of Education
                            <br>
                            Engr. Al Joevid Mirasol – Adviser, Dept. of Public Works
                            <br>
                            Engr. Pablo Minerva – Adviser, Dept. of Ways and Mean
                            <br>
                            Dr. John Eric V. Juaneza – Adviser, DENR
                            <br>
                            Mr. Andres Ortega – Adviser, DSWD
                            <br>
                            Engr. Naci John Trance – Adviser, Dept. of Justice
                            <br>
                            Dr. Noel Quidato – Adviser, Dept. of Sports
                            <br>
                            Ms. Maylene H. Provido – Adviser, Dept. of Health
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="org-list mb-4">
                            <div class="card-title">
                              B. Campus Publication
                            </div> 
                              The Technovator – Mr. Pedro Fontonalgo
                              <br>
                              Batang Tekniko – Gng. Rowilyn Turija, Bb. Cherry Mae Ricabar
                              <br>
                              Junior Technovator – Mrs. Lysa P. Laza (Adviser), Ms. Emmie Jan P. Endonila (Co-adviser)
                          </div>
                          <div class="org-list">
                            <div class="card-title">
                              Graduate Education Council
                              <br>
                              <span style="font-weight: normal;">
                              – Dr. Meriam A. Ohao
                              </span>
                            </div>
                              MSCS Council – Dr. RIchard de Leon
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            D. CEA Srudent Council
                            <br>
                            <span style="font-weight: normal;">
                            – Engr. Al Joevid Mirasol (Adviser), Engr. Rewill R. Tornalejo (Co-adviser)
                            </span>
                          </div> 
                            IECEP-WVCST SC – Engr. Carlito S. Anatan
                            <br>
                            IIEE-WVCST SC – Engr. Ferdinand S. Pedrajas
                            <br>
                            Arkitekton – Arch. Rosa Lea V. Ajesta (Adviser), Arch. Vernan Lamis (Co-adviser)
                            <br>
                            JPIA-WVCST SC – Arch. Gelmar S. Montefrio
                            MESTO – Dr. Ernesto E. Morales (Adviser), Engr. Enrique V. Provendido (Co-adviser)
                            <br>
                            UAPSA – Arch. Rony de Juan
                            <br>
                            Jr. Phil. Society of Mechanical Engineering – Engr. Godofredo P. Defensor
                            UREKK – Arch. Angelo A. Duarte
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            E. CAS Student Council
                            <br>
                            <span style="font-weight: normal;">
                            – Mr. George L. Lopez II (Adviser), Mrs. Lynna B. Marquelencia (Co-adviser)
                            </span>
                          </div>
                            IECEP-WVCST SC – Engr. Carlito S. Anatan
                            <br>
                            IIEE-WVCST SC – Engr. Ferdinand S. Pedrajas
                            <br>
                            Arkitekton – Arch. Rosa Lea V. Ajesta (Adviser), Arch. Vernan Lamis (Co-adviser)
                            <br>
                            JPIA-WVCST SC – Arch. Gelmar S. Montefrio
                            MESTO – Dr. Ernesto E. Morales (Adviser), Engr. Enrique V. Provendido (Co-adviser)
                            <br>
                            UAPSA – Arch. Rony de Juan
                            <br>
                            Jr. Phil. Society of Mechanical Engineering – Engr. Godofredo P. Defensor
                            UREKK – Arch. Angelo A. Duarte
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            F. Org. of Industrial Technologist
                            <br>
                            <span style="font-weight: normal;">
                            – Engr. Pablo Minerva (Adviser), Mr. Rene L. Celda (Co-adviser)
                            </span>
                          </div>
                            CIT Junior Council – Mrs. Maylene H. Provido (Adviser), Mrs. Glenda Nakila (Co-adviser)
                            <br>
                            CIT Senior Council – Mrs. Adelfa Fontonalgo
                            AYFAD – Mrs. Jasmine S. Ibones
                            <br>
                            Asso. of Hotel and Restaurant Tech. – Mrs. Grace Valenciana
                            <br>
                            Artist Guild (Drafting Technology) – Engr. Ma. Analie Celda
                            <br>
                            The Builders (Civil Tech.) – Mr. Bernaldo E. Fajura
                            <br>
                            AMSO – Mr. Danilo Calanza
                            <br>
                            Electrical Tech. Student Org. – Mr. Rene L. Celda
                            <br>
                            HVACRTSO – Mr. Romulo Candoliza
                            <br>
                            ASSESTS – Engr. Christian Le Marjo A. Caiphang
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            G. Educator's Guild
                            <br>
                            <span style="font-weight: normal;">
                            – Dr. Georgia Demavibas
                            </span>
                          </div>
                            Junior Council (COE) – Ms. Arlyn Jimenes
                            <br>
                            Senior Council (COE) – Dr. Frisian Y. Causing
                            <br>
                            Student Teaching Org. (STO) – Prof. Emma Palomo (Co-adviser), Prof. Gloria Oscares (Co-adviser)
                            <br>
                            BEED Council – Dr. Susan Pagunsan
                            <br>
                            BSED Council – Mr. John S. Corona
                            <br>
                            BSIE Council – Dr. Alma C. Palabrica
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            H. Lab School Student Council
                            <br>
                            <span style="font-weight: normal;">
                            – Mr. John Lorence Camacho, Mr. Ricky Quibingco
                            </span>
                          </div>
                            Lab. School Junior Council – Ms. Manilyn A. Quidan (Adviser), Mrs. Lysa P. Laza (Co-Adviser)
                            <br>
                            Lab. School Senior Council – Mrs. Jo-Ann A. Requillo, Ms. Cherrie Mae Recabar
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="org-list mb-4">
                          <div class="card-title">
                            I. Special Interest Clubs
                          </div>
                            Lab School Red Cross Yout Club – Mrs. Lysa P. Laza (Adviser), Ms. Manilyn A. Quidan (Co-Adviser)
                            <br>
                            Boy Scout of the Philippines Outfit 271-272 – Mr. John Lorence Camacho, Mr. jerry P. Jovacon
                            <br>
                            Girl Scout of the Philippines – Ms. Manilyn Q, Quidan, Ms. Cherrie Mae Recabar
                            <br>
                            Lab School Computer Club – Mrs. Jo-Ann A. Requillo, Mr. Vincent Paul Requillo
                            <br>
                            SAMAGFIL (Lab Sch.) – Mrs. Rowilyn C. Turija, Ms. Cherrie Mae Recabar
                            <br>
                            Lab School English Club – Ms. Lysa P. Piolo, Ms. Emmie Jan Endolina
                            <br>
                            Lab School Mathematics Club – Mr. Ricky Quibingco (Adviser), Mr. John Lorence Camacho (Co-Adviser)
                            <br>
                            High School Science Club –  Ms. Lowe Ana Marie Ligad, Ms. Manilyn Q. Quidan
                            <br>
                            YWCA Club – Ms. Emmie Jan Endolina, Ms. Lowe Ana MArie Ligad
                            <br>
                            High School Youth Club – Mr. Vincent Paul Requillo, Ms. Susan Tuburan
                            <br>
                            Balaan Dance Troupe – Mrs. Gina P. Haresco
                            <br>
                            Campus Ministry – Mr. Sotero E. Fajarito
                            AMICUS –  Mr. Renato D. Demavibad (Adviser), Engr. Rewil R. Tornalejo (Co-Adviser)
                            <br>
                            Knights of Columbus – Prof. Sotero E. Fajarito
                            Alumni Dormers Asso. (ADA) – Mr. Lno Baldevarona
                            <br>
                            KAPARIZ – Mr. Roger Galvan(Adviser), Ms. Michelle Escriba (Co-Adviser)
                            <br>
                            CPTA Dormers Association – Prof. Pacifico Senador
                            <br>
                            URISS –  Prof. Renato D. Demavibas
                            <br>
                            VETP Student Council –  Mr. Lino BAldevarona
                            Christian Brotherhood International – Dr. Erman G. Gange
                            <br>
                            Young Flames for Jesus – Ms. Josefa Dalipe
                            United Dormitorian Association – Mr. Lino Baldevarona, Mr. Pacifico Senador (Co-Adviser)
                            <br>
                            SAVER – Engr. Christian D. Misola (Adviser), Mr. John Corona (Commander)
                            Student Labor Association – Engr. Christian D. Misola
                            <br>
                            DOST Scholars Association – Engr. Gelien S. Sales
                            <br>
                            OIKOS – Ms. Alma S. Torremoro
                            <br>
                            CHED Scholars Association – Dr. Susan MArie R. Dela Cruz
                            <br>
                            Extension Student Volunteers –  Engr. Albert Z. Janapon
                            <br>
                            GUAM Alumni Scholars Association – Mr. Lino Baldevarona
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
            <div class="card p-3">
              <div class="card-body">
                <div class="org-content-title mb-5">
                  Designation of Concerned Faculty and Staff as Advisers and Co-Advisers of Accredited Student Clubs and Organizations for Academic Year 2021 – 2022. 
                </div>
                <div class="mb-5">
                  1. The faculty and staff on the attached list are hereby designated as advisers and co – advisers of the Accredited Student Clubs and Organizations of the University for Academic Year 2021 – 2022.
                  <br>
                  <br>
                  2. As advisers/co- advisers/coordinators, you shall perform the following functions:
                  <br>
                  • Provide assistance to the officers and members of the respective organizations on how to achieve their goals and objectives;
                  <br>
                  • Guide the officers and members of the clubs and organizations on the proper utilization of their funds;
                  <br>
                  • Be available whenever possible to assist the officers and members in the planning, implementation and operation of any program, projects and activities sponsored by the particular student clubs and organizations;
                  <br>
                  • Be available as mentors to organization members  by assisting them with their individual problems and decisions as well as with those related to the organization ; and
                  <br>
                  • Resolve any problem that may occur within the organization that could not be resolved within the leadership or membership of the organization.
                  For the information, guidance and compliance of all concerned.
                  <br>
                  <br>
                  3. For the information, guidance and compliance of all concerned.
                </div>

                <div class="org-class-slider-container" style="padding: 5% 15% 5% 15%;">
                  <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
                    <div class="carousel-indicators">
                      <button
                        type="button"
                        data-mdb-target="#carouselExampleIndicators"
                        data-mdb-slide-to="0"
                        class="active"
                        aria-current="true"
                        aria-label="Slide 1"
                      ></button>
                      <button
                        type="button"
                        data-mdb-target="#carouselExampleIndicators"
                        data-mdb-slide-to="1"
                        aria-label="Slide 2"
                      ></button>
                      <button
                        type="button"
                        data-mdb-target="#carouselExampleIndicators"
                        data-mdb-slide-to="2"
                        aria-label="Slide 3"
                      ></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="../img/classification1.jpg" class="d-block w-100" alt="ISAT-U Image"/>
                      </div>
                      <div class="carousel-item">
                        <img src="../img/classification2.jpg" class="d-block w-100" alt="ISAT-U Image"/>
                      </div>
                      <div class="carousel-item">
                        <img src="../img/classification3.jpg" class="d-block w-100" alt="ISAT-U Image"/>
                      </div>
                      <div class="carousel-item">
                        <img src="../img/classification4.jpg" class="d-block w-100" alt="ISAT-U Image"/>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev" style="color: #003366;!important;">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next" style="color: #003366;!important;">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Tabs content -->
      </div>
    </div>
      
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
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/jquery2.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap2.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script type="text/javascript" src="../js/mdb2.min.js"></script>

  </body>
</html>
