<?php // phpcs:ignore
/**
 * Member Post Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Member Post Fields
 */
class MemberPostFields {
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
					'value'    => 'member',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_member',
					'title'    => __( 'Member Post Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'          => 'field_member_job_title',
							'label'        => __( 'Job Title', 'creatorfund' ),
							'name'         => 'job_title',
							'type'         => 'text',
							'placeholder'  => __( 'Job Title', 'creatorfund' ),
							'wrapper'      => array( 'width' => 50 ),
							'instructions' => __( 'The job title of the member.', 'creatorfund' ),
						),
						array(
							'key'          => 'field_member_research_area',
							'label'        => __( 'Research Area', 'creatorfund' ),
							'name'         => 'research_area',
							'type'         => 'text',
							'instructions' => __( 'Separate research areas with commas.', 'creatorfund' ),
							'placeholder'  => __( 'Research Area', 'creatorfund' ),
							'wrapper'      => array( 'width' => 50 ),
						),
						array(
							'key'           => 'field_member_color',
							'label'         => __( 'Color', 'creatorfund' ),
							'name'          => 'color',
							'type'          => 'select',
							'choices'       => array(
								'white' => __( 'White', 'creatorfund' ),
								'pink'  => __( 'Pink', 'creatorfund' ),
							),
							'default_value' => false,
							'return_format' => 'value',
						),
						array(
							'key'           => 'field_member_avatar',
							'label'         => __( 'Avatar', 'creatorfund' ),
							'name'          => 'avatar',
							'type'          => 'image',
							'return_format' => 'id',
							'preview_size'  => 'thumbnail',
							'library'       => 'all',
						),
						array(
							'key'        => 'field_member_socials',
							'label'      => __( 'Socials', 'creatorfund' ),
							'name'       => 'socials',
							'type'       => 'group',
							'sub_fields' => array(
								array(
									'key'          => 'field_member_socials_facebook',
									'label'        => __( 'Facebook', 'creatorfund' ),
									'name'         => 'facebook',
									'type'         => 'url',
									'placeholder'  => 'https://facebook.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Facebook URL of the member.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_member_socials_twitter',
									'label'        => __( 'Twitter', 'creatorfund' ),
									'name'         => 'twitter',
									'type'         => 'url',
									'placeholder'  => 'https://twitter.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Twitter URL of the member.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_member_socials_instagram',
									'label'        => __( 'Instagram', 'creatorfund' ),
									'name'         => 'instagram',
									'type'         => 'url',
									'placeholder'  => 'https://instagram.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Instagram URL of the member.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_member_socials_medium',
									'label'        => __( 'Medium', 'creatorfund' ),
									'name'         => 'medium',
									'type'         => 'url',
									'placeholder'  => 'https://medium.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The Medium URL of the member.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_member_socials_linkedin',
									'label'        => __( 'LinkedIn', 'creatorfund' ),
									'name'         => 'linkedin',
									'type'         => 'url',
									'placeholder'  => 'https://linkedin.com/username',
									'wrapper'      => array( 'width' => 50 ),
									'instructions' => __( 'The LinkedIn URL of the member.', 'creatorfund' ),
								),
							),
						),
						array(
							'key'         => 'field_member_network_excerpt',
							'label'       => __( 'Network Excerpt', 'creatorfund' ),
							'name'        => 'network_excerpt',
							'type'        => 'textarea',
							'rows'        => 4,
							'new_lines'   => 'br',
							'placeholder' => __( 'Excerpt', 'creatorfund' ),
						),
					),
					'location' => $location,
				)
			);
		}
	}
}

