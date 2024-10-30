<?php
/*
Plugin Name: Business Hours
Plugin URI: http://francisaltomare.com
Description: Biz Hours
Version: 1.0
Author: Francis Altomare
Author URI: http://francisaltomare.com
License: MIT
*/

register_activation_hook(__FILE__,'installPlugin');
register_deactivation_hook( __FILE__, 'removePlugin' );
add_shortcode( 'business_hours', 'echo_hours' );
function echo_hours()
{

$dayID = get_option('biz_hours_day_id');
$hourID = get_option('biz_hours_hour_id');

//range first
echo '<div id="biz_hours_container">';
echo '<b>Hours: </b><br />';


$range = get_option('biz_hours_range');
$int = strlen($range);
if($int > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo $range.':';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo get_option('biz_hours_range_hours');
	echo '</div><br />';
}

$sat = get_option('biz_hours_saturday');
if(strlen($sat) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Saturday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $sat;
	echo '</div><br />';
}

$sun = get_option('biz_hours_sunday');
if(strlen($sun) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Sunday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $sun;
	echo '</div><br />';
}




$mon = get_option('biz_hours_monday');
if(strlen($mon) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Monday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $mon;
	echo '</div><br />';
}



$tus = get_option('biz_hours_tuesday');
if(strlen($tus) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Tuesday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $tus;
	echo '</div><br />';
}

$wed = get_option('biz_hours_wednesday');
if(strlen($wed) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Wednesday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $wed;
	echo '</div><br />';
}


$thu = get_option('biz_hours_thursday');
if(strlen($thu) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Thursday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $thu;
	echo '</div><br />';
}

$fri = get_option('biz_hours_friday');
if(strlen($fri) > 0){
	echo '<div id="'. $dayID . '" style="float:left;">';
	echo 'Friday:';
	echo '</div>';
	echo '<div id="'. $hourID . '" style="float:right;">';
	echo $fri;
	echo '</div><br />';
}


echo '</div>';


}


function installPlugin()
{
	add_option("biz_hours_sunday", 'Closed', '', 'yes');
	add_option("biz_hours_monday", '', '', 'yes');
	add_option("biz_hours_tuesday", '', '', 'yes');
	add_option("biz_hours_wednesday", '', '', 'yes');
	add_option("biz_hours_thursday", '', '', 'yes');
	add_option("biz_hours_friday", '', '', 'yes');
	add_option("biz_hours_saturday", 'Closed', '', 'yes');
	add_option("biz_hours_day_id", 'biz_hours_day', '', 'yes');
	add_option("biz_hours_hour_id", 'biz_hours_hour', '', 'yes');
	add_option("biz_hours_range", 'Monday - Friday', '', 'yes');
	add_option("biz_hours_range_hours", '9am to 5pm', '', 'yes');
	
	
}

function removePlugin() {
	
	delete_option("biz_hours_sunday");
	delete_option("biz_hours_monday");
	delete_option("biz_hours_tuesday");
	delete_option("biz_hours_wednesday");
	delete_option("biz_hours_thursday");
	delete_option("biz_hours_friday");
	delete_option("biz_hours_saturday");
	delete_option("biz_hours_day_id");
	delete_option("biz_hours_hour_id");
	delete_option("biz_hours_range");
	delete_option("biz_hours_range_hours");
}


if ( is_admin() ){

/* Call the html code */
add_action('admin_menu', 'hello_world_admin_menu');

function hello_world_admin_menu() {
add_options_page('Business Hours', 'Business Hours', 'administrator',
'biz-hours', 'biz_hours_html_page');
}
}
function biz_hours_html_page() {
?>

<div>
<h2>Store Hours Options</h2>
<h4>Any field left blank will not show up</h4>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<b>Day Range: </b>

<input name="biz_hours_range" type="text" id="biz_hours_range"
value="<?php echo get_option('biz_hours_range'); ?>" />
(ex. Monday - Friday)
<br />
<b>Day Range Hours: </b>
<input name="biz_hours_range_hours" type="text" id="biz_hours_range_hours"
value="<?php echo get_option('biz_hours_range_hours'); ?>" />
(ex. 9am to 5pm)

<br />
<br />
<b>Saturday: </b>
<input name="biz_hours_saturday" type="text" id="biz_hours_saturday"
value="<?php echo get_option('biz_hours_saturday'); ?>" />(ex. 9am to 5pm or Closed)
<br />

<b>Sunday: </b>
<input name="biz_hours_sunday" type="text" id="biz_hours_sunday"
value="<?php echo get_option('biz_hours_sunday'); ?>" />
<br />
<br />
<b>Monday: </b>
<input name="biz_hours_monday" type="text" id="biz_hours_monday"
value="<?php echo get_option('biz_hours_monday'); ?>" />
<br />
<b>Tuesday: </b>
<input name="biz_hours_tuesday" type="text" id="biz_hours_tuesday"
value="<?php echo get_option('biz_hours_tuesday'); ?>" />
<br />
<b>Wednesday: </b>
<input name="biz_hours_wednesday" type="text" id="biz_hours_wednesday"
value="<?php echo get_option('biz_hours_wednesday'); ?>" />
<br />
<b>Thursday: </b>
<input name="biz_hours_thursday" type="text" id="biz_hours_thursday"
value="<?php echo get_option('biz_hours_thursday'); ?>" />

<br />
<b>Friday: </b>
<input name="biz_hours_friday" type="text" id="biz_hours_friday"
value="<?php echo get_option('biz_hours_friday'); ?>" />


<br /><br />
<h2>Advanced Options: </h2>
<br />
<b>Day DIV ID: </b><input name="biz_hours_day_id" type="text" id="biz_hours_day_id"
value="<?php echo get_option('biz_hours_day_id'); ?>" />
<br />
<b>Hours DIV ID: </b><input name="biz_hours_hour_id" type="text" id="biz_hours_hour_id"
value="<?php echo get_option('biz_hours_hour_id'); ?>" />





<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="biz_hours_sunday, biz_hours_monday, biz_hours_tuesday, biz_hours_wednesday, biz_hours_thursday, biz_hours_friday, biz_hours_saturday, biz_hours_day_id, biz_hours_hour_id, biz_hours_range, biz_hours_range_hours" />


<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
<?php
}



?>