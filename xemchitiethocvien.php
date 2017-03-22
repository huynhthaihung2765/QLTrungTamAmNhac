<?php include_once("entities/hocvien.class.php"); ?>
<?php include_once("entities/phieudangky.class.php"); ?>

<?php include_once("header.php");
  if(!isset($_GET["idHV"])){
    header('location: 404.php');
  } else {
    $idHocVien = $_GET["idHV"];
    $hv = Hocvien::Get_A_HV($idHocVien);
    $phieuDangKy = PhieuDangKy::Get_A_PDK($idHocVien);
    //if (!isset($_GET["idkh"])) {
    //  header('location: 404.php');
  //  }
    //else {
    //  $idkh = $_GET["idkh"];
    //  $classHVLearn = reset(Hocvien::Get_Class_HV_Learn($idkh));
    //}
  }
 ?>

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User Profile</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Chi tiết học viên <small>Activity report</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <?php foreach ($hv as $key => $itemH){ ?>
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="<?php echo isset($itemH['HinhAnhHV']) ? $itemH['HinhAnhHV'] : "user.png" ; ?>" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h3><?php echo $itemH['HoTenHocVien']; ?></h3>

                <ul class="list-unstyled user_data">
                  <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $itemH['NoiOHienTai']; ?>
                  </li>

                  <li>
                    <i class="fa fa-briefcase user-profile-icon"></i><?php echo $itemH['SDT']; ?>
                  </li>

                  <li class="m-top-xs">
                    <i class="fa fa-external-link user-profile-icon"></i>
                    <a href="http://www.kimlabs.com/profile/" target="_blank">
                     </a>
                  </li>
                </ul>

                <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Sửa học viên</a>
                <br />

                <!-- start skills -->
                <h4>Skills</h4>
                <ul class="list-unstyled user_data">
                  <li>
                    <p>Web Applications</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                  <li>
                    <p>Website Design</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                    </div>
                  </li>
                  <li>
                    <p>Automation & Testing</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                    </div>
                  </li>
                  <li>
                    <p>UI / UX</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                    </div>
                  </li>
                </ul>
                <!-- end of skills -->

              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">

                <div class="profile_title">
                  <div class="col-md-6">
                    <h2>Lớp đang học : </h2>
                  </div>
                  <div class="col-md-6">
                    <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                    </div>
                  </div>
                </div>
                <!-- start of user-activity-graph -->
                <!--<div id="graph_bar" style="width:100%; height:280px;"></div>
                <!-- end of user-activity-graph -->

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Đánh giá</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Điểm danh</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Lớp đã học</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                      <!-- start recent activity -->
                      <ul class="messages">
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Hung Huynh</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Cuong Dang</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Phat Cao</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Nhi Nguyen</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>
                        <li>
                          <img src="images/img.jpg" class="avatar" alt="Avatar">
                          <div class="message_date">
                            <h3 class="date text-info">24</h3>
                            <p class="month">May</p>
                          </div>
                          <div class="message_wrapper">
                            <h4 class="heading">Nhân viên Cuong Dang</h4>
                            <blockquote class="message">Học viên học rất nhiệt tình và chăm chỉ.</blockquote>
                            <br />
                            <!--<p class="url">
                              <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                              <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                            </p>-->
                          </div>
                        </li>

                      </ul>
                      <!-- end recent activity -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                      <!-- start user projects -->
                      <table class="data table table-striped no-margin">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Ngày tháng</th>
                            <th>Khoá học</th>
                            <th class="hidden-phone">Điểm danh</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>1/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>2/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>3/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Có</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>4/2/2017</td>
                            <td>Guitar</td>
                            <td class="hidden-phone">Vắng</td>
                            <td class="vertical-align-mid">
                              <div class="progress">
                                <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- end user projects -->

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">

                      <!--lop da hoc-->
                      <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Bảng quá trình <small>basic table subtitle</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">

                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Tên lớp</th>
                                  <th>Thời gian</th>
                                  <th>Giáo viên</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Guitar vỡ lòng</td>
                                  <td>1/2/2017 - 1/5/2017</td>
                                  <td>Tuan Pham</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Guitar cơ bản</td>
                                  <td>2/5/2017 - 2/8/2017</td>
                                  <td>Tuan Pham</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Guitar Nâng cao</td>
                                  <td>3/8/2017 - 3/12/2017</td>
                                  <td>Tuan Pham</td>
                                </tr>
                              </tbody>
                            </table>

                          </div>
                        </div>
                      </div>
                      <!---->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once("footer.php"); ?>
