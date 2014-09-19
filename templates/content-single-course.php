<?php
/**
 * The Template for displaying all single courses.
 *
 * @author 		codeBOX
 * @package 	lifterLMS/Templates
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div id="course-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="summary entry-summary">

		<?php

			do_action( 'lifterlms_single_course_summary' );

		?>

	</div>

</div>
