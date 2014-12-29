    <!-- Footer begins here -->
    <div class="container footer">
        <div class="email"><a href="mailto:enquiries@thomasline.uk" target="_blank">enquiries@thomasline.uk</a></div>
        <div class="developer"><a href="http://jamesdriscoll.london" target="_blank">Wordpress theme developed by James Driscoll</a></div>
        <div class="copy">Copyright Thomas Line</div>
            
    </div>
    <!-- Footer ends here -->  

    <!-- JQuery -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

    <!-- Bootstrap JS -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    <script src="<?php echo get_stylesheet_directory_uri();?>/js/site.js"></script>


    <script type="text/javascript">

      if (0) {
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-17999473-1']);
        _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
      }
    </script>
      
    <?php wp_footer(); ?>
  </body>
</html>