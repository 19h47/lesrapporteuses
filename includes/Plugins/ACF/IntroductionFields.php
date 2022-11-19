<?php // phpcs:ignore
/**
 * Introduction Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Introduction Fields
 */
class IntroductionFields {
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
					'value'    => 'page',
				),
				array(
					'param'    => 'page_template',
					'operator' => '!=',
					'value'    => 'templates/about.php',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_mobile_thumbnail',
					'title'    => __( 'Introduction', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'          => 'field_introduction',
							'label'        => __( 'Introduction', 'creatorfund' ),
							'name'         => 'introduction',
							'type'         => 'textarea',
							'instructions' => __( 'Page introduction text.', 'creatorfund' ),
							'placeholder'  => __( 'Introduction text', 'creatorfund' ),
							'rows'         => 4,
							'new_lines'    => 'br',
						),
					),
					'location' => $location,
					'position' => 'acf_after_title',
				)
			);
		}
	}
}

