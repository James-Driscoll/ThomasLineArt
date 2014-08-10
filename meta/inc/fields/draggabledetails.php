<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Text_Field' ) )
{
	class RWMB_draggabledetails_Field
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{

			 echo make_draggabledetails_ui($meta,$field);
			 return "<span id='latLongName'></span>";
		}

		/**
		 * Normalize parameters for field
		 *
		 * @param array $field
		 *
		 * @return array
		 */
		static function normalize_field( $field )
		{
			return $field;
		}
	}
}




function make_draggabledetails_ui($meta, $field) {?>
<style type="text/css">

/* Hide Label for this area ------------------------ */

.rwmb-draggabledetails-wrapper .rwmb-label {
  display: none;
}

#sortable li {
  height: 80px;
  background: #EEE;
  border: 1px solid #EEE;
  padding: 5px;
  position: relative;
}
#sortable li input {
  float: left;
}
#sortable li .type {
  float: left;
  width: 50px;
  height: 50px;
  border-radius: 5px;
  border: 1px solid #999;
  margin-right: 10px;
  background:  #F8F8F8 url("<?php echo get_stylesheet_directory_uri();?>/images/icon-sprite-details.png") no-repeat -100px -100px;
}

#sortable li .select-type {
  clear:both;
  float:left;
  width: 100px;
  margin-left: 62px;
  margin-right: 10px;
}
#sortable li .select-layout {
  float: left;
  width: 100px;
}

body #sortable li .selected {
  border-color: #000;
}

#sortable li .close {
  position: absolute;
  right: 5px;
  top: 5px;
  height: 20px;
  width: 20px;
  text-decoration: none;
  text-align: center;
  line-height: 20px;
  background: #BBB;
  color: #FFF;
  font-weight: bold;
  font-size: 17px;
  border-radius: 17px;
}
#sortable li .close:hover {
  background: #888;
}

#sortable .ui-state-highlight {
  background: #EEE;
  border: 1px #888 dotted;
}
#sortable .ui-sortable-helper {
  border-color: #BBB;
  cursor: move;
}
#sortable .h5 {
  font-size: 14px;
  display: block;
  width: 70%;
}
#sortable .h6 {
  width: 60%;
  font-size: 12px;
}

.rwmb-field.rwmb-draggabledetails-wrapper {height: 30px;}


/* Types ------------------------ */
#sortable li .pan {  background-position: 10px -92px;}
#sortable li .coil {  background-position: 10px -45px;}
#sortable li .power {  background-position: 10px 7px;}
#sortable li .three-phase {  background-position: 10px -143px;}
#sortable li .dimensions {background-position: 10px -190px;}
#sortable li .warranty {background-position: 10px -240px;}




</style>
<ul id="sortable">
<?php
  //echo "<pre>";
  //print_r($meta);

  if (is_array($meta)) {
    $inputs = array();
    foreach($meta as $key => $value){
      $key = explode("-", $key);
      //Hash is used as a default item
      if ($key[0] != "#") {
        $inputs[$key[0]][$key[1]] = $value;
      }
    }

    //Now it's sorted, lets go though and build the UI
    foreach($inputs as $detail){
      extract($detail);
      echo '<li>
        <div class="type  '.$type.'" "> </div>
        <input  name="'.$field['field_name'].'[#-heading]" type="text" class="h5" value="'.$heading.'" />
        <input  name="'.$field['field_name'].'[#-subheading]" type="text" class="h6"  value="'.$subheading.'"  />
        <select name="'.$field['field_name'].'[#-type]" class="select-type">
        <option  value="'.$type.'" > '.$type.'</option>
        </select>
        <select name="'.$field['field_name'].'[#-layout]" class="select-layout">
        <option  value="'.$layout.'" > '.$layout.'</option>
        </select>
        <a href="#" class="close">x</a>

      </li>';
    }
  }



?>









</ul>

<!-- the below is copied for new items -->
<div id="default" style="display: none">
    <div class="type"> </div>
    <input  name="<?php echo $field['field_name']; ?>[#-heading]" type="text" class="h5" />
    <input  name="<?php echo $field['field_name']; ?>[#-subheading]" type="text" class="h6" />
    <select name="<?php echo $field['field_name']; ?>[#-type]" class="select-type"></select>
    <select name="<?php echo $field['field_name']; ?>[#-layout]" class="select-layout"></select>
    <a href="#" class="close">x</a>
</div>




<a href="#" id="add-detail" style="float: right; margin-top: 5px;" class="button-primary">+ Add Detail</a>


<script type="text/javascript">
   jQuery(document).ready(function($){

    /* Available types and layouts ------------------------ */
    types = ["none","pan","coil","power","three-phase","dimensions","warranty"];
    layouts = ["full","half","third","heading"];

    /* Select up <selects> ------------------------ */
    optionsHTML = "";
    $(types).each(function(){
      optionsHTML += "<option value='" + this + "'>" + this +"</option>";
    });
    $("#pdetails .select-type").append(optionsHTML);

    optionsHTML = "";
    $(layouts).each(function(){
      optionsHTML += "<option value='" + this + "'>" + this +"</option>";
    });
    $("#pdetails .select-layout").append(optionsHTML);


    /* Make sortable ------------------------ */
    $("#pdetails #sortable" ).sortable({
      placeholder: "ui-state-highlight"
    });


    /* Make new element ------------------------ */
    counter = 0;
    $("#pdetails #sortable li").each(function(){
      $(this).html($(this).html().replace(/#/g,counter));
      counter++;
    });


    $("#pdetails #add-detail").click(function(){
      counter++;
      newElement = $("#pdetails #default").html().replace(/#/g,counter);

      $("#pdetails #sortable").append("<li>" + newElement +"</li>");
      return false;
    });


    /* On Type change ------------------------ */
    $("#pdetails .select-type").live("change", function(){
      $(this).parents("li").find(".type").attr("class","type " + $(this).val());
    });

    /* On Close ------------------------ */
    $("#pdetails #sortable li .close").live("click", function(){
      $(this).parents("li").remove();
      return false;
    });




  });


</script>





<?php }