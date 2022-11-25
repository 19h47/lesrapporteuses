<?php // phpcs:ignore
/**
 * Message Post Fields
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

namespace LesRapporteuses\Plugins\ACF;

/**
 * Message Post Fields
 */
class MessagePostFields {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'fields' ) );
	}

	/**
	 * Registers the field group.
	 *
	 * @return void
	 */
	public function fields() {
		$location = array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'message',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_contact_page',
					'title'    => __( 'Contact Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'         => 'field_contact_page_full_name',
							'label'       => __( 'First and last name', 'lesrapporteuses' ),
							'name'        => 'full_name',
							'type'        => 'text',
							'placeholder' => __( 'Art Vandelay', 'lesrapporteuses' ),
						),
						array(
							'key'         => 'field_contact_page_email',
							'label'       => __( 'Email', 'lesrapporteuses' ),
							'name'        => 'email',
							'type'        => 'email',
							'placeholder' => __( 'art@vandelay.com', 'lesrapporteuses' ),
						),
						array(
							'key'         => 'field_contact_page_message',
							'label'       => __( 'Message', 'lesrapporteuses' ),
							'name'        => 'message',
							'type'        => 'textarea',
							'placeholder' => __( 'Message', 'lesrapporteuses' ),
						),

					),
					'location' => $location,
				)
			);
		}
	}
}

