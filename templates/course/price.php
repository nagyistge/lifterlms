<?php
/**
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 */

if ( ! defined( 'ABSPATH' ) ) exit;

global $post, $course;

$course_not_class = get_post_custom($post->ID);

?>



<div class="llms-price-wrapper">

	<p class="llms-price"><?php echo $course->get_price_html(); ?></p> 

</div>