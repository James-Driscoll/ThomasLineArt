<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Text_Field' ) )
{
	class RWMB_requiredfixes_field
	{


		static function html( $html, $meta, $field )
		{ ?>


    <style>
    .rwmb-requiredfixes-wrapper {display: none;}
    .rwmb-input h4 {display: none;}
    .rwmb-file-wrapper ol li {
      list-style: none;
    }
    .rwmb-file-wrapper .rwmb-uploaded {
      margin: 0px;
    }
    </style>


    <script type="text/javascript">
    jQuery(document).ready(function($){

      //If a file has been uploaded, hide the input
      $(".rwmb-file-wrapper .rwmb-uploaded li").parents(".rwmb-file-wrapper").find(".new-files").hide();

      $(".rwmb-file-wrapper .rwmb-uploaded .rwmb-delete-file").on("click", function(){

        $(this).parents(".rwmb-input").find(".new-files").show();

      });


      //If it's not a homepage hide everything!
      if ($("#page_template").val() != "page_homepage.php"){

        $("#phomepage").hide();
      }




    });

    </script>




		<?php }
	}
}


