<?php // phpcs:ignore
/**
 * Case Study Post Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

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
					'key'        => 'group_case_study',
					'title'      => __( 'Case Study Post Fields', 'creatorfund' ),
					'fields'     => array(
						array(
							'key'           => 'field_case_study_related_posts',
							'label'         => __( 'Related Posts', 'creatorfund' ),
							'name'          => 'related_posts',
							'type'          => 'relationship',
							'post_type'     => array( 'post' ),
							'filters'       => array(
								'search',
							),
							'max'           => 3,
							'return_format' => 'id',
							'instructions'  => __( 'Select up to 3 related posts.', 'creatorfund' ),
						),
						array(
							'key'           => 'field_case_study_post_logo',
							'label'         => __( 'Logo', 'creatorfund' ),
							'name'          => 'logo',
							'type'          => 'image',
							'return_format' => 'id',
							'preview_size'  => 'medium',
							'library'       => 'all',
							'instructions'  => __( 'Upload the logo for the case study.', 'creatorfund' ),

						),
						array(
							'key'        => 'field_case_study_post_socials',
							'label'      => __( 'Socials', 'creatorfund' ),
							'name'       => 'socials',
							'type'       => 'group',
							'sub_fields' => array(
								array(
									'key'          => 'field_case_study_post_socials_facebook',
									'label'        => __( 'Facebook', 'creatorfund' ),
									'name'         => 'facebook',
									'type'         => 'url',
									'placeholder'  => 'https://facebook.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Facebook URL of the case study.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_case_study_post_socials_twitter',
									'label'        => __( 'Twitter', 'creatorfund' ),
									'name'         => 'twitter',
									'type'         => 'url',
									'placeholder'  => 'https://twitter.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Twitter URL of the case study.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_case_study_post_socials_instagram',
									'label'        => __( 'Instagram', 'creatorfund' ),
									'name'         => 'instagram',
									'type'         => 'url',
									'placeholder'  => 'https://instagram.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Instagram URL of the case study.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_case_study_post_socials_medium',
									'label'        => __( 'Medium', 'creatorfund' ),
									'name'         => 'medium',
									'type'         => 'url',
									'placeholder'  => 'https://medium.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Medium URL of the case study.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_case_study_post_socials_linkedin',
									'label'        => __( 'LinkedIn', 'creatorfund' ),
									'name'         => 'linkedin',
									'type'         => 'url',
									'placeholder'  => 'https://linkedin.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The LinkedIn URL of the case study.', 'creatorfund' ),
								),
							),
						),
						array(
							'key'         => 'field_case_study_post_link',
							'label'       => __( 'Link', 'creatorfund' ),
							'name'        => 'link',
							'type'        => 'url',
							'placeholder' => 'https://example.com/',
							'wrapper'     => array( 'width' => 50 ),
						),
						array(
							'key'         => 'field_case_study_post_investment_year',
							'label'       => __( 'Investment Year', 'creatorfund' ),
							'name'        => 'investment_year',
							'type'        => 'text',
							'placeholder' => __( '1986', 'creatorfund' ),
							'wrapper'     => array( 'width' => 50 ),
						),
						array(
							'key'         => 'field_case_study_introduction',
							'label'       => __( 'List Excerpt', 'creatorfund' ),
							'name'        => 'list_excerpt',
							'type'        => 'textarea',
							'rows'        => 4,
							'new_lines'   => 'br',
							'placeholder' => __( 'Excerpt', 'creatorfund' ),
						),
					),
					'location'   => $location,
					'menu_order' => 3,
				),
			);
		}
	}
}

