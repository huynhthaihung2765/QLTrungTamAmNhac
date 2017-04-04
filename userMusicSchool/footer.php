<div class="footer">
  <div class="about">
    <h3>Giới Thiệu</h3>
    <div>
      <a href="about.html"><img src="images/instructors.jpg" alt=""></a>
      <p>
        <strong>Bạn muốn 1 lớp học</strong> dành cho Guitar hay Violin. Lắng nghe chúng tôi , <em> Không nơi nào</em> tốt hơn chúng tôi.
      </p>
      <a href="blog.html" class="more">Xem Thêm</a>
    </div>
  </div>
  <div class="contact">
    <h3>Liên hệ</h3>
    <ul>
      <li>
        <span>Địa chỉ :</span>
        <p>
          Quận Thủ Đức ,Thành Phố Hồ Chí Minh, VN
        </p>
      </li>
      <li>
        <span>Email :</span>
        <p>
          <a href="hr@musiccenter.com">Email</a>
        </p>
      </li>
      <li>
        <span>Số Điện Thoại :</span>
        <p>
          (84) 123 123 456
        </p>
      </li>
    </ul>
  </div>
  <div class="connect">
    <a href="http://freewebsitetemplates.com/go/twitter/" id="twitter">twitter</a> <a href="http://freewebsitetemplates.com/go/facebook/" id="facebook">facebook</a> <a href="http://freewebsitetemplates.com/go/googleplus/" id="googleplus">google+</a>
  </div>
  <p class="footnote">
    &#169; Copyright 2016. All rights reserved
  </p>
</div>
</div>

<script src="jquery/dist/jquery.min.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}

var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>



</body>
</html>
