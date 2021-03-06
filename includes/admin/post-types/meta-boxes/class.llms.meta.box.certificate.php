<?php
/**
 * Certificates metabox
 * @since    1.0.0
 * @version  3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

class LLMS_Meta_Box_Certificate extends LLMS_Admin_Metabox {

	/**
	 * Configure the metabox settings
	 * @return void
	 * @since  3.0.0
	 */
	public function configure() {

		$this->id = 'lifterlms-certificate';
		$this->title = __( 'Certificate Settings', 'lifterlms' );
		$this->screens = array(
			'llms_certificate',
		);
		$this->priority = 'high';

	}

	/**
	 * Builds array of metabox options.
	 * Array is called in output method to display options.
	 * Appropriate fields are generated based on type.
	 *
	 * @return array [md array of metabox fields]
	 *
	 * @version 3.0.0
	 */
	public function get_fields() {

		 return array(
			array(
				'title' 	=> 'General',
				'fields' 	=> array(
					array(
						'label' 	=> __( 'Certificate Title', 'lifterlms' ),
						'desc' 		=> __( 'Enter a title for your certificate. EG: Certificate of Completion', 'lifterlms' ),
						'id' 		=> $this->prefix . 'certificate_title',
						'type'  	=> 'text',
						'section' 	=> 'certificate_meta_box',
						'class' 	=> 'code input-full',
						'desc_class' => 'd-all',
						'group' 	=> '',
						'value' 	=> '',
					),
					array(
						'label'  	=> __( 'Background Image', 'lifterlms' ),
						'desc'  	=> __( 'Select an Image to use for the certificate.', 'lifterlms' ),
						'id'    	=> $this->prefix . 'certificate_image',
						'type'  	=> 'image',
						'section' 	=> 'certificate_meta_box',
						'class' 	=> 'certificate',
						'desc_class' => 'd-all',
						'group' 	=> '',
						'value' 	=> '',
					),
					array(
						'label'  	=> '',
						'desc'  	=> '',
						'id'    	=> $this->prefix . 'help',
						'type'  	=> 'custom-html',
						'section' 	=> 'certificate_meta_box',
						'class' 	=> 'code input-full',
						'desc_class' => 'd-all',
						'group' 	=> '',
						'value' 	=> '<p>' . __( 'Use the text editor above to add content to your certificate. You can include any of the following merge fields.', 'lifterlms' ) . '
										<br>{site_title}
										<br>{user_login}
										<br>{site_url}
										<br>{first_name}
										<br>{last_name}
										<br>{email_address}
										<br>{current_date}
										</p>',
					),
				),
			),
		 );
	}

}
