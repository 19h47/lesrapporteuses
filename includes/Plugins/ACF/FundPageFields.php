<?php // phpcs:ignore
/**
 * Fund Page Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Fund Page Fields
 */
class FundPageFields {
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
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'templates/archive-fund.php',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_fund_page',
					'title'    => __( 'Fund Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'        => 'field_fund_page_hero',
							'label'      => __( 'Hero', 'creatorfund' ),
							'name'       => 'hero',
							'type'       => 'group',
							'layout'     => 'block',
							'sub_fields' => array(
								array(
									'key'         => 'field_fund_page_hero_title',
									'label'       => __( 'Title', 'creatorfund' ),
									'name'        => 'title',
									'type'        => 'text',
									'placeholder' => __( 'Title', 'creatorfund' ),
								),
								array(
									'key'          => 'field_fund_page_hero_content',
									'label'        => __( 'Content', 'creatorfund' ),
									'name'         => 'content',
									'type'         => 'wysiwyg',
									'toolbar'      => 'basic',
									'media_upload' => 0,
								),
								array(
									'key'           => 'field_fund_page_hero_link',
									'label'         => __( 'Link', 'creatorfund' ),
									'name'          => 'link',
									'type'          => 'link',
									'return_format' => 'array',
								),
								array(
									'key'           => 'field_fund_page_hero_image',
									'label'         => __( 'Image', 'creatorfund' ),
									'name'          => 'image',
									'type'          => 'image',
									'return_format' => 'id',
									'preview_size'  => 'medium',
								),
							),
						),
					),
					'location' => $location,
				)
			);
		}
	}
}
