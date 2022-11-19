<?php // phpcs:ignore
/**
 * Case Study Post Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Case Study Page Fields
 */
class CaseStudyPageFields {
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
					'value'    => 'templates/archive-case-study.php',
				),
			),

		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_case_study_page',
					'title'    => __( 'Case Study Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'           => 'field_case_study_page_taxonomies',
							'label'         => __( 'Taxonomies', 'creatorfund' ),
							'name'          => 'taxonomies',
							'type'          => 'checkbox',

							'choices'       => array(
								'sector'     => 'Sector',
								'university' => 'University',
								'stage'      => 'Stage',
								'country'    => 'Country',
							),
							'layout'        => 'vertical',
							'return_format' => 'array',
						),
						array(
							'key'        => 'field_case_study_page_push',
							'label'      => __( 'Push', 'creatorfund' ),
							'name'       => 'push',
							'type'       => 'group',
							'layout'     => 'block',
							'sub_fields' => array(
								array(
									'key'           => 'field_case_study_page_push_link',
									'label'         => __( 'Link', 'creatorfund' ),
									'name'          => 'link',
									'type'          => 'link',
									'return_format' => 'array',
								),
							),
						),
					),
					'location' => $location,
				),
			);
		}
	}
}

