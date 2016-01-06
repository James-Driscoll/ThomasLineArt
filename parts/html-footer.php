    <!-- Footer begins here -->

        <div class="container footer">
            <a class="col-md-4 email text-left" href="mailto:info@thomasline.uk" target="_blank">info@thomasline.uk</a>
            <a class="col-md-4 developer text-center" href="http://jamesdriscoll.london" target="_blank">Wordpress theme developed by James Driscoll</a>
            <div class="col-md-4 copy text-right">copyright &copy; Thomas Line 2016</div>
        </div>

    </div>
    <!-- Footer ends here -->

    <!-- BxSlider -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.bxSlider.min.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/site.js"></script>

    <script type="text/javascript">
      if (0)
      {
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-17999473-1']);
        _gaq.push(['_trackPageview']);

        (function()
        {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
      }
    </script>

    <?php wp_footer(); ?>
  </body>
</html>
