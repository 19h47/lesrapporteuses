<?php // phpcs:ignore
/**
 * Insight Post Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Insight Post Fields
 */
class InsightPostFields {
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
					'value'    => 'post',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_post',
					'title'    => __( 'Insight', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'           => 'field_post_related_posts',
							'label'         => __( 'Related Posts', 'creatorfund' ),
							'name'          => 'related_posts',
							'type'          => 'relationship',
							'post_type'     => array( 'post' ),
							'filters'       => array(
								'search',
							),
							'max'           => 4,
							'return_format' => 'id',
						),
					),
					'location' => $location,
				),
			);
		}
	}
}

