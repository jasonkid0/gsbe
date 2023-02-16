<?php 
ob_start();
include "../../../template/includes/css_plugins.php";
include "../../../template/includes/navbar.php";
if($_SESSION['role'] == "Administrator")
{
?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GSBE Library System</title>
        <!-- plugins:css -->
        
        <style>
          #design1{
            background-color: #FFB1F6;
            border-radius: 20px;
            color: #860377;
            
          }
          #designgreen{
            background-color: #98F38F;
            border-radius: 20px;
            color: #009717;
            
          }
          #designblue{
            background-color: #8DD9FF;
            border-radius: 20px;
            color: #034493;
            
          }
          #designred{
            background-color: #FFB4B4;
            border-radius: 20px;
            color: #B05151;
            
          }
          #designyellow{
            background-color: #FFFFBC;
            border-radius: 20px;
            color: #979700;
            
          }
          #link1{
            background-color: white;
            color: #00AAAF;
            text-decoration: none;
            border-radius: 0px 0px 20px 20px;
            font-size: 15px;
            
            
          }
        a {
          text-decoration: none;
        }
        </style>
      </head>

      <body>
        
        <div class="container-scroller">
          <div class="container-fluid page-body-wrapper">

      <!-- // SIDEBAR -->
      <?php include '../../includes/sidebar.php'; ?>     
      <!-- SIDE BAR -->

            <div class="main-panel">
              <div class="content-wrapper">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="home-tab">
                      <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Dashboard</a>
                          </li>
                          <!-- <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Total Users</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Add Books</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Add E-Books</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Total SpColl</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Total Borrowed Books</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Total Archived Books</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab" href="thesis.php">Total Archived SpColl</a>
                          </li> -->



<!--              
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                          </li>
-->
                        </ul>
                      </div>
                      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1></h1>
    </section>
<br><br><br>
<center>
  <div class="buttonstyle">
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div id="designgreen" class="panel panel-success">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                    <i style="font-size: 60px;" class='fas fa-user-alt'></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM user");
                                            $num_rows = mysqli_num_rows($result);
                                            ?>
                                        <div class="huge"><?php echo $num_rows; ?></div>
                                        <div>Total <br> Users</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../students/student_search.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div id="design1" class="panel panel-default">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(quantity) as total FROM `special_collection`")) or die(mysqli_error($con));
                                            ?>
                                        <div class="huge"><?php echo $result['total']; ?></div>
                                        <div>Total SpColl</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../special_collections/special_collection_search.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div  class="col-lg-3 col-md-6">
                        <div id="designblue" class="panel panel-info">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(quantity) as total FROM `book`")) or die(mysqli_error($con));
                                            ?>
                                        <div class="huge"><?php echo $result['total']; ?></div>
                                        <div>Total Books</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../books/add_book.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left"> Add Book Here </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div id="designblue" class="panel panel-info">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(quantity) as total FROM `ebooks`")) or die(mysqli_error($con));
                                            ?>
                                        <div class="huge"><?php echo $result['total']; ?></div>
                                        <div>Total E-Books</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                                <a href="../ebooks/add_ebook.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left"> Add E-Book Here </span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                        <br>
                    </div>
                    <div>
                    <br>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div id="designred" class="panel panel-danger">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $count1 = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) as total FROM `borrow_book` WHERE `borrowed_status` = 'borrowed'")) or die(mysqli_error($con));
                                            ?>
                                        <div class="huge"><?php echo $count1['total']; ?></div>
                                        <div>Total Borrowed Books</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../borrow/borrowed_book.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div id="designyellow" class="panel panel-warning">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM archive");
                                            $num_rows = mysqli_num_rows($result);
                                            ?>
                                        <div class="huge"><?php echo $num_rows; ?></div>
                                        <div>Total Archived Books</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../archives/archive_book.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div id="designyellow" class="panel panel-warning">
                          <br>
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-book fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM arc_special_collection");
                                            $num_rows = mysqli_num_rows($result);
                                            ?>
                                        <div class="huge"><?php echo $num_rows; ?></div>
                                        <div>Total Archived SpColl</div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <a href="../archives/archive_thesis.php">
                                <div id="link1" class="panel-footer">
                                  <br>
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                    <br>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </section>

        </div>

    </section>
    </center>
    </div>




      <!-- (HIDDEN) ======== LAZO
                                <div class="d-none d-md-block">
                                  <p class="statistics-title">Avg. Time on Site</p>
                                  <h3 class="rate-percentage">2m:35s</h3>
                                  <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                                </div>
      -->

                            <!-- <div class="col-lg-4 d-flex flex-column">
                              <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                  <div class="card card-rounded">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="card-title card-title-dash">To-Do list</h4> -->
                                            <!-- <div class="add-items d-flex mb-0"> -->
                                              <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                              <!-- <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                            </div>
                                          </div>
                                          <div class="list-wrapper">
                                            <ul class="todo-list todo-list-rounded">
                                              <li class="d-block">
                                                <div class="form-check w-100">
                                                  <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                  </label>
                                                  <div class="d-flex mt-2">
                                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                                    <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                                    <i class="mdi mdi-flag ms-2 flag-color"></i>
                                                  </div>
                                                </div>
                                              </li>
                                              <li class="d-block">
                                                <div class="form-check w-100">
                                                  <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                  </label>
                                                  <div class="d-flex mt-2">
                                                    <div class="ps-4 text-small me-3">23 June 2020</div>
                                                    <div class="badge badge-opacity-success me-3">Done</div>
                                                  </div>
                                                </div>
                                              </li>
                                              <li>
                                                <div class="form-check w-100">
                                                  <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                  </label>
                                                  <div class="d-flex mt-2">
                                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                                    <div class="badge badge-opacity-success me-3">Done</div>
                                                  </div>
                                                </div>
                                              </li>
                                              <li class="border-bottom-0">
                                                <div class="form-check w-100">
                                                  <label class="form-check-label">
                                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                                  </label>
                                                  <div class="d-flex mt-2">
                                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                                    <div class="badge badge-opacity-danger me-3">Expired</div>
                                                  </div>
                                                </div>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div> -->
                              </div>
                              <!-- <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                  <div class="card card-rounded">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title card-title-dash">Type By Amount</h4>
                                          </div>
                                          <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                          <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                  <div class="card card-rounded">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                              <h4 class="card-title card-title-dash">Leave Report</h4>
                                            </div>
                                            <div>
                                              <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Month Wise </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                  <h6 class="dropdown-header">week Wise</h6>
                                                  <a class="dropdown-item" href="#">Year Wise</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="mt-3">
                                            <canvas id="leaveReport"></canvas>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row flex-grow">
                                <div class="col-12 grid-margin stretch-card">
                                  <div class="card card-rounded">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-lg-12">
                                          <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                              <h4 class="card-title card-title-dash">Top Performer</h4>
                                            </div>
                                          </div>
                                          <div class="mt-3">
                                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                              <div class="d-flex">
                                                <img class="img-sm rounded-10" src="images/faces/face1.jpg" alt="profile">
                                                <div class="wrapper ms-3">
                                                  <p class="ms-1 mb-1 fw-bold">Brandon Washington</p>
                                                  <small class="text-muted mb-0">162543</small>
                                                </div>
                                              </div>
                                              <div class="text-muted text-small">
                                                1h ago
                                              </div>
                                            </div>
                                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                              <div class="d-flex">
                                                <img class="img-sm rounded-10" src="images/faces/face2.jpg" alt="profile">
                                                <div class="wrapper ms-3">
                                                  <p class="ms-1 mb-1 fw-bold">Wayne Murphy</p>
                                                  <small class="text-muted mb-0">162543</small>
                                                </div>
                                              </div>
                                              <div class="text-muted text-small">
                                                1h ago
                                              </div>
                                            </div>
                                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                              <div class="d-flex">
                                                <img class="img-sm rounded-10" src="images/faces/face3.jpg" alt="profile">
                                                <div class="wrapper ms-3">
                                                  <p class="ms-1 mb-1 fw-bold">Katherine Butler</p>
                                                  <small class="text-muted mb-0">162543</small>
                                                </div>
                                              </div>
                                              <div class="text-muted text-small">
                                                1h ago
                                              </div>
                                            </div>
                                            <div class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                              <div class="d-flex">
                                                <img class="img-sm rounded-10" src="images/faces/face4.jpg" alt="profile">
                                                <div class="wrapper ms-3">
                                                  <p class="ms-1 mb-1 fw-bold">Matthew Bailey</p>
                                                  <small class="text-muted mb-0">162543</small>
                                                </div>
                                              </div>
                                              <div class="text-muted text-small">
                                                1h ago
                                              </div>
                                            </div>
                                            <div class="wrapper d-flex align-items-center justify-content-between pt-2">
                                              <div class="d-flex">
                                                <img class="img-sm rounded-10" src="images/faces/face5.jpg" alt="profile">
                                                <div class="wrapper ms-3">
                                                  <p class="ms-1 mb-1 fw-bold">Rafell John</p>
                                                  <small class="text-muted mb-0">Alaska, USA</small>
                                                </div>
                                              </div>
                                              <div class="text-muted text-small">
                                                1h ago
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- content-wrapper ends -->

                <!-- NAVBAR -->
                <?php include '../../includes/footer.php'; ?>
                <!-- NAVBAR -->

            </div>
            <!-- main-panel ends -->
          </div>
          <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
          <?php include '../../includes/scripts.php'; ?>
        <!-- End custom js for this page-->
      </body>

      </html>

<?php }else{
    header("Location:../samples/404.php");
} ?>