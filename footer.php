  </div>
    </div>
  <!-- footer content -->
  <footer>
    <div class="pull-right">
      <p>Nhóm 29</p>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->


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

  <script type="text/javascript">
    $(function(){
      $(".search").keyup(function()
      {
        var searchid = $(this).val();
        var dataString = 'search='+ searchid;
        if(searchid!='')
        {
            $.ajax({
            type: "POST",
            url: "search.php",
            data: dataString,
            cache: false,
            success: function(html)
            {
            $("#result").html(html).show();
            }
            });
        }return false;
      });

      jQuery("#result").live("click",function(e){
          var $clicked = $(e.target);
          var $name = $clicked.find('.name').html();
          var decoded = $("<div/>").html($name).text();
          $('#searchid').val(decoded);
      });
      jQuery(document).live("click", function(e) {
          var $clicked = $(e.target);
          if (! $clicked.hasClass("search")){
          jQuery("#result").fadeOut();
          }
      });
      $('#searchid').click(function(){
          jQuery("#result").fadeIn();
      });
    });
  </script>

  <script>
  $('.body').on('click', function(){
    function load_unseen_notification(view = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data){
          $('.dropdown-menuc').html(data.notification2);
          if(data.unseen_notification2 > 0){
            $('.countc').html(data.unseen_notification2);
          }
        }
      });
    }
    load_unseen_notification();
  });
  </script>


</body>
</html>
