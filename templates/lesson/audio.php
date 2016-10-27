<?php
/**
 * Lesson Audio embed
 * @since    1.0.0
 * @version  3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

global $post, $lesson;

if ( ! $lesson->get( 'audio_embed' ) ) { return; }
?>

<div class="llms-audio-wrapper">
	<div class="center-audio">
		<?php echo $lesson->get_audio(); ?>
	</div>
</div>
