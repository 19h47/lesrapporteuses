<?php // phpcs:ignore
/**
 * Page Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Page Fields
 */
class PageFields {
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
			),
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
					'key'      => 'group_page',
					'title'    => __( 'Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'        => 'field_page_contact',
							'label'      => __( 'Contact', 'creatorfund' ),
							'name'       => 'contact',
							'type'       => 'group',
							'layout'     => 'block',
							'sub_fields' => array(
								array(
									'key'           => 'field_page_contact_type',
									'label'         => __( 'Type', 'creatorfund' ),
									'name'          => 'type',
									'type'          => 'radio',
									'choices'       => array(
										'none'       => __( 'None', 'creatorfund' ),
										'newsletter' => __( 'Newsletter', 'creatorfund' ),
										'apply'      => __( 'Apply', 'creatorfund' ),
									),
									'default_value' => 'none',
									'allow_null'    => 0,
									'layout'        => 'vertical',
									'return_format' => 'value',
								),
								array(
									'key'         => 'field_page_contact_title',
									'label'       => __( 'Title', 'creatorfund' ),
									'name'        => 'title',
									'type'        => 'text',
									'placeholder' => __( 'Title', 'creatorfund' ),
								),
								array(
									'key'         => 'field_page_contact_content',
									'label'       => __( 'Content', 'creatorfund' ),
									'name'        => 'content',
									'type'        => 'textarea',
									'placeholder' => __( 'Content', 'creatorfund' ),
									'rows'        => 2,
									'new_lines'   => '',
								),
							),
						),
					),
					'location' => $location,
					'position' => 'side',
				)
			);

		}
	}
}
