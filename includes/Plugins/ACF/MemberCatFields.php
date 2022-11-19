<?php // phpcs:ignore
/**
 * Member Cat Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Member Cat Fields
 */
class MemberCatFields {
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
					'param'    => 'taxonomy',
					'operator' => '==',
					'value'    => 'member_cat',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_member_cat',
					'title'    => __( 'Member Category', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'          => 'field_member_cat_title',
							'label'        => __( 'Title', 'creatorfund' ),
							'name'         => 'title',
							'type'         => 'text',
							'placeholder'  => __( 'Title', 'creatorfund' ),
							'instructions' => __( 'The title is how it appears on your site.', 'creatorfund' ),
						),
					),
					'location' => $location,
				)
			);
		}
	}
}

