<section class="contact-us" id="contact">
  <div class="row text-center">
    <div class="col-md-4">
      <h4 style="color:white">Encuéntranos en:</h4>
      <br>
      <i class="bi bi-pin-map" style="color: white; font-size: 25px">
      </i>
       <b style="color:white">Av. Kenedit and Str. Lincon</b>
       <br>
       <br>
       <b style="color:white">Av. Kenedit and Str. Lincon</b>
       <br>
       <br>
       <b style="color:white">Av. Kenedit and Str. Lincon</b>
      
    </div>
    <div class="col-md-4">
      <h4 style="color:white">Contáctanos:</h4>
      <br>
      <i class="bi bi-telephone-outbound-fill" style="color: white; font-size: 25px">
      </i>
      <b style="color:white">1800-300</b>
      <br>
      <i class="bi bi-envelope-at" style="color: white; font-size: 25px">
      </i>
      <b style="color:white">fedex@gmail.com</b>
    </div>
    <div class="col-md-4">
      <h4 style="color:white">Nuestras Redes Sociales:</h4>
      <br>
      <i class="bi bi-twitter" style="color: white; font-size: 35px"></i>
      <i class="bi bi-facebook" style="color: white; font-size: 35px"></i>
      <i class="bi bi-tiktok" style="color: white; font-size: 35px"></i>
    </div>
  </div>
  <div class="footer">
    <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
        <br>
        Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
        <br>
        Distibuted By: <a href="https://themewagon.com" target="_blank" title="Build Better UI, Faster">ThemeWagon</a>
      </p>

  </div>
</section>




  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url('plantilla/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?php echo base_url('plantilla/assets/js/isotope.min.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/owl-carousel.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/lightbox.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/tabs.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/video.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/slick-slider.js'); ?>"></script>
    <script src="<?php echo base_url('plantilla/assets/js/custom.js'); ?>"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>

</html>
