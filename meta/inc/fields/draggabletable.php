<?php
// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'RWMB_Text_Field' ) )
{
	class RWMB_draggabletable_Field
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

			 echo make_draggabletable_ui($meta,$field);
			 return "";
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




function make_draggabletable_ui($meta, $field) {?>
<style type="text/css">

.drag-table {
  width: 100%;
}
.drag-table th {
  text-align: left;
}
.drag-table input {
  width: 90%;
}
.drag-table .close {
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
  display: block;
  float: right;
}
#sortable li .close:hover {
  background: #888;
}
.drag-table .default {
  display: none;
}
.rwmb-draggabletable-wrapper .rwmb-label {
  display: none;
}
.drag-table .ui-sortable-helper {
  width: 100%;
}

.drag-table .ui-sortable-placeholder {
  background: blue;
  width: 100%;
  display: block;
  height: 27px;
}

</style>
<div id="<?php echo $field["id"]."-".$field["type"]; ?>" class="draggabletable">


<table id="<?php echo $field["id"]; ?>" class="drag-table">
  <tbody>

<?php

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
      echo '<tr>';

      foreach($detail as $key => $det) {
        echo '<td><input  name="'.$field['field_name'].'[#-'.$key.']" type="text" class="h6"  value="'.$det.'"  /></td>';
      };

      echo '<td><a href="#" class="close">x</a></td></tr>';
    }
  }
?>


  <tr class="default">
    <?php foreach($field["columns"] as $column){ ?>
    <td>
      <input  name="<?php echo $field['field_name']."[#-".$column."]"; ?>" type="text" class="<?php echo $column; ?>" />
    </td>
    <?php } ?>


    <td>
      <a href="#" class="close">x</a>
    </td>
  </tr>

 </tbody>





</table>


[n] = New Line













<a href="#" id="add-detail" style="float: right; margin-top: 5px;" class="button-primary">+ Add Detail</a>

</div>

<script type="text/javascript">
   jQuery(document).ready(function($){

    /* Unique Selector ------------------------ */
    $area = $("#<?php echo $field["id"]."-".$field["type"]; ?>");


    /* Make the table sortable ------------------------ */
    $(".drag-table tbody", $area).sortable();


    /* Make new element ------------------------ */
    counter = 0;
    $(".drag-table tr:not(.default)").each(function(){
      $(this).html($(this).html().replace(/#/g,counter));
      counter++;
    });

    /* New Detail Added ------------------------ */
    $("#add-detail",$area).click(function(){
      counter++;
      newElement = $(".default",$area).html().replace(/#/g,counter);
      console.log(counter);
      $(".drag-table tbody",$area).append("<tr>" + newElement +"</tr>");
      return false;
    });


    /* On Close ------------------------ */
    $(".close",$area).live("click", function(){
      $(this).parents("tr").remove();
      return false;
    });




  });


</script>





<?php }