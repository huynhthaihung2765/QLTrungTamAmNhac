<?php
if(!isset($_SESSION))
    {
        session_start();
    }
  $tennhanvien = $_SESSION['HoTenNhanVien'];
  $tenQuyenHan = $_SESSION['TenQuyen'];
  $tenChucVu = $_SESSION['TenChucVu'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý trung tâm âm nhạc </title>

    <!-- Bootstrap -->
    <link href="public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/build/css/custom.min.css" rel="stylesheet">

    <!-- FullCalendar -->
    <link href="public/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="public/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="public/images/img.jpg" alt=""><?php echo $tennhanvien; ?>
                    <span class="fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">Quyền: <?php echo $tenQuyenHan; ?></a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Trạng thái: <?php echo $_SESSION['TrangThaiOnline']; ?></span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Chức vụ: <?php echo $tenChucVu; ?></a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Đăng xuất</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number cli" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green countc"></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu dropdown-menuc list-unstyled msg_list" role="menu"></ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>

        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="admin.php" class="site_title"><i class="fa fa-paw"></i> <span>Quản lí nhạc viện</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="public/images/img.jpg" alt="public." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Hung Huynh</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="admin.php"><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
                    <!--<ul class="nav child_menu">
                      <li><a href="index.html">Dashboard</a></li>
                      <li><a href="index2.html">Dashboard2</a></li>
                      <li><a href="index3.html">Dashboard3</a></li>
                    </ul>-->
                  </li>
                  <li><a><i class="fa fa-edit"></i> Quản lí học viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="xemhocvien.php">Xem học viên</a></li>
                      <?php if($tenQuyenHan == "Quản trị"){ ?>
                        <li><a href="themhocvien.php">Thêm học viên</a></li>
                      <?php } ?>  
                      <li><a href="xemhvdangkymoi.php">Đăng ký mới</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Quản lí lớp học <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($tenQuyenHan == "Quản trị"){ ?>
                        <li><a href="themlophoc.php">Xem / Thêm lớp học</a></li>
                      <?php } ?>
                      <li><a href="typography.html">Xem môn học</a></li>
                      <li><a href="icons.html">Xem cấp độ</a></li>
                      <li><a href="glyphicons.html"></a></li>
                      <li><a href="widgets.html">Widgets</a></li>
                      <li><a href="invoice.html">Invoice</a></li>
                      <li><a href="inbox.html">Inbox</a></li>
                      <li><a href="calendar.html">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Quản lí giáo viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="xemgiaovien.php">Xem giáo viên</a></li>
                      <li><a href="themgiaovien.php">Thêm giáo viên</a></li>
                      <li><a href="#">Giáo viên đăng ký mới</a></li>
                      <li><a href="#"></a>Giáo viên đã nghỉ</li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Quản lí cơ sở vật chất <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="themcsvc.php">Thêm cơ sở vật chất</a></li>
                      <li><a href="xemcosovatchat.php">Xem Cơ sở vật chất</a></li>
                      <li><a href="#">Đồ hư</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Quản lí bài viết <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Xem bài viết</a></li>
                      <li><a href="chartjs2.html">Thêm bài mới</a></li>
                      <li><a href="morisjs.html">Xem danh mục</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Quản lí thu chi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="fixed_sidebar.html">Mục thu</a></li>
                      <li><a href="fixed_footer.html">Mục chi</a></li>
                      <li><a href="fixed_footer.html">Báo cáo</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">

                  <li><a><i class="fa fa-bug"></i> Nhân viên <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if($tenQuyenHan == "Quản trị"){ ?>
                        <li><a href="themnhanvien.php">Thêm nhân viên</a></li>
                      <?php } ?>
                      <li><a href="#">Xem nhân viên</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
