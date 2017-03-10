<?php include_once("header.php") ?>

<!-- jQuery -->
<script src="public/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="public/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="public/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="public/vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="public/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="public/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="public/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="public/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="public/vendors/Flot/jquery.flot.js"></script>
<script src="public/vendors/Flot/jquery.flot.pie.js"></script>
<script src="public/vendors/Flot/jquery.flot.time.js"></script>
<script src="public/vendors/Flot/jquery.flot.stack.js"></script>
<script src="public/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="public/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="public/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="public/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="public/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="public/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="public/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="public/vendors/moment/min/moment.min.js"></script>
<script src="public/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="public/build/js/custom.min.js"></script>
<!-- FullCalendar -->
<script src="public/vendors/moment/min/moment.min.js"></script>
<script src="public/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng học viên</span>
      <div class="count">2500</div>
      <span class="count_bottom"><i class="green">4% </i> Từ tuần trước</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i> Tổng lớp học</span>
      <div class="count">123</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> Từ tuần trước</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng bài viết</span>
      <div class="count green">2,500</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Từ tuần trước</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng khách ghé website</span>
      <div class="count">4,567</div>
      <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> Từ tuần trước</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng nhân viên</span>
      <div class="count">2,315</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Từ tuần trước</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Tổng comment</span>
      <div class="count">7,325</div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> Từ tuần trước</span>
    </div>
  </div>
  <!-- /top tiles -->
  <!-- Lịch  -->
  <!-- page content -->


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Calendar Events</h2>
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

            <div id='calendar'></div>

          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /page content -->

<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
      </div>
      <div class="modal-body">
        <div id="testmodal" style="padding: 5px 20px;">
          <form id="antoform" class="form-horizontal calender" role="form">
            <div class="form-group">
              <label class="col-sm-3 control-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary antosubmit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
      </div>
      <div class="modal-body">

        <div id="testmodal2" style="padding: 5px 20px;">
          <form id="antoform2" class="form-horizontal calender" role="form">
            <div class="form-group">
              <label class="col-sm-3 control-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="title2" name="title2">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->
      <!-- /Lịch  -->


</div>
</div>
<?php include_once("footer.php") ?>
