<?php // phpcs:ignore
/**
 * Home Settings Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Home Settings Fields
 */
class HomeSettingsFields {
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
					'param'    => 'options_page',
					'operator' => '==',
					'value'    => 'acf-options-home',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_home',
					'title'    => __( 'Home Settings Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'         => 'field_home_title',
							'label'       => __( 'Title', 'creatorfund' ),
							'name'        => 'home_title',
							'type'        => 'text',
							'placeholder' => __( 'Title', 'creatorfund' ),
						),
						array(
							'key'         => 'field_home_introduction',
							'label'       => __( 'Introduction', 'creatorfund' ),
							'name'        => 'home_introduction',
							'type'        => 'textarea',
							'placeholder' => __( 'Introduction', 'creatorfund' ),
							'rows'        => 4,
							'new_lines'   => 'br',
						),

					),
					'location' => $location,
				)
			);
		}
	}


}
