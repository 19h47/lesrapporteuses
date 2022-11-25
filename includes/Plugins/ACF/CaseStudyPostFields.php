<?php // phpcs:ignore
/**
 * Case Study Post Fields
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

namespace LesRapporteuses\Plugins\ACF;

/**
 * Case Study Post Fields
 */
class CaseStudyPostFields {
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
					'value'    => 'case_study',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'        => 'group_case_study_post',
					'title'      => __( 'Case Study Post Fields', 'lesrapporteuses' ),
					'fields'     => array(
						array(
							'key'   => 'field_post_color',
							'label' => __( 'Color', 'lesrapporteuses' ),
							'name'  => 'color',
							'type'  => 'color_picker',
						),
						array(
							'key'         => 'field_case_study_post_client',
							'label'       => __( 'Client', 'lesrapporteuses' ),
							'name'        => 'client',
							'type'        => 'text',
							'placeholder' => __( 'Client', 'lesrapporteuses' ),
						),
						array(
							'key'         => 'field_case_study_post_description',
							'label'       => __( 'Description', 'lesrapporteuses' ),
							'name'        => 'description',
							'type'        => 'textarea',
							'new_lines'   => 'br',
							'rows'        => 2,
							'placeholder' => __( 'Description', 'lesrapporteuses' ),
						),
						array(
							'key'         => 'field_case_study_post_credits',
							'label'       => __( 'Credits', 'lesrapporteuses' ),
							'name'        => 'credits',
							'type'        => 'textarea',
							'new_lines'   => 'br',
							'rows'        => 3,
							'placeholder' => __( 'Credits', 'lesrapporteuses' ),
						),
						array(
							'key'         => 'field_case_study_post_content',
							'label'       => __( 'Content', 'lesrapporteuses' ),
							'name'        => 'content',
							'type'        => 'textarea',
							'new_lines'   => 'br',
							'rows'        => 4,
							'placeholder' => __( 'Content', 'lesrapporteuses' ),
						),
					),
					'location'   => $location,
					'menu_order' => 0,
				),
			);
		}
	}
}

