                <!-- Footer -->
                <div class="row">
                    <div id="footer" class="col-md-12 footer">
                        <ul>
                            <li class="developer text-center"><a href="http://jamesdriscoll.london" target="_blank">Developed by James Driscoll</a></li>
                            <li class="text-center"><a href="http://mattlee.graphics/" target="_blank">Logo design by Matt Lee</a></li>
                            <li class="copy text-right"><span>Copyright &copy; Thomas Line 2016</span></li>
                        </ul>
                    </div>
                </div>
                <!-- / Footer -->
            </div>
        </div>

        <!-- BxSlider -->
        <script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.bxSlider.min.js"></script>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

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
