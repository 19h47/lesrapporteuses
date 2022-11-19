<?php // phpcs:ignore
/**
 * Fund Post Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Fund Post Fields
 */
class FundPostFields {
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
					'value'    => 'fund',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_fund',
					'title'    => __( 'Fund Post Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'         => 'field_fund_stage',
							'label'       => __( 'Stage', 'creatorfund' ),
							'name'        => 'stage',
							'type'        => 'text',
							'placeholder' => __( 'Stage', 'creatorfund' ),
							'wrapper'     => array( 'width' => 50 ),
						),
						array(
							'key'         => 'field_fund_fund_size',
							'label'       => __( 'Fund Size', 'creatorfund' ),
							'name'        => 'fund_size',
							'type'        => 'text',
							'placeholder' => __( 'Size', 'creatorfund' ),
							'wrapper'     => array( 'width' => 50 ),
						),
						array(
							'key'         => 'field_fund_geographical_scope',
							'label'       => __( 'Geographical Scope', 'creatorfund' ),
							'name'        => 'geographical_scope',
							'type'        => 'text',
							'placeholder' => __( 'Geographical scope', 'creatorfund' ),
							'wrapper'     => array( 'width' => 50 ),
						),
						array(
							'key'         => 'field_fund_ticket_range',
							'label'       => __( 'Ticket Range', 'creatorfund' ),
							'name'        => 'ticket_range',
							'type'        => 'text',
							'placeholder' => __( 'Ticket range', 'creatorfund' ),
							'wrapper'     => array( 'width' => 50 ),
						),

					),
					'location' => $location,
				)
			);
		}
	}
}
