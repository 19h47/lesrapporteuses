<?php // phpcs:ignore
/**
 * Fund Settings Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Fund Settings Fields
 */
class FundSettingsFields {
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
					'value'    => 'acf-options-fund',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_fund_settings',
					'title'    => __( 'Fund Settings Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'           => 'field_fund_settings_sticky_funds',
							'label'         => __( 'Sticky Funds', 'creatorfund' ),
							'name'          => 'sticky_funds',
							'type'          => 'relationship',
							'post_type'     => array( 'fund' ),
							'filters'       => array( 'search' ),
							'max'           => 1,
							'return_format' => 'id',
						),
					),
					'location' => $location,
				)
			);
		}
	}
}
