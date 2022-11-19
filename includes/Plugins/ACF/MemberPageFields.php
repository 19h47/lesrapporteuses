<?php // phpcs:ignore
/**
 * Member Page Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

/**
 * Member Page Fields
 */
class MemberPageFields {
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
					'value'    => 'templates/archive-member.php',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group(
				array(
					'key'      => 'group_member_page',
					'title'    => __( 'Member Page Fields', 'creatorfund' ),
					'fields'   => array(
						array(
							'key'           => 'field_member_page_member_categories',
							'label'         => __( 'Member Categories', 'creatorfund' ),
							'name'          => 'member_categories',
							'type'          => 'taxonomy',
							'instructions'  => __( 'Select the categories to display on the page.', 'creatorfund' ),
							'taxonomy'      => 'member_cat',
							'field_type'    => 'multi_select',
							'return_format' => 'id',
							'multiple'      => 0,
							'wrapper'       => array( 'width' => 50 ),
						),
						array(
							'key'           => 'field_member_page_filters',
							'label'         => __( 'Filters', 'creatorfund' ),
							'name'          => 'filters',
							'type'          => 'true_false',
							'default_value' => 1,
							'instructions'  => __( 'Should the page show filters or not?', 'creatorfund' ),
							'wrapper'       => array( 'width' => 50 ),
						),
						array(
							'key'        => 'field_member_page_push',
							'label'      => __( 'Push', 'creatorfund' ),
							'name'       => 'push',
							'type'       => 'group',
							'sub_fields' => array(
								array(
									'key'          => 'field_member_page_push_title',
									'label'        => __( 'Title', 'creatorfund' ),
									'name'         => 'title',
									'type'         => 'text',
									'placeholder'  => __( 'Title', 'creatorfund' ),
									'instructions' => __( 'The title of the push.', 'creatorfund' ),
								),
								array(
									'key'          => 'field_member_page_push_content',
									'label'        => __( 'Content', 'creatorfund' ),
									'name'         => 'content',
									'type'         => 'wysiwyg',
									'instructions' => __( 'The content of the push.', 'creatorfund' ),
								),
								array(
									'key'           => 'field_member_page_push_link',
									'label'         => __( 'Link', 'creatorfund' ),
									'name'          => 'link',
									'type'          => 'link',
									'instructions'  => __( 'The link of the push.', 'creatorfund' ),
									'return_format' => 'array',
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

