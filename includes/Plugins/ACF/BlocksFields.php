<?php // phpcs:ignore
/**
 * Blocks Fields
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

namespace LesRapporteuses\Plugins\ACF;

/**
 * Blocks Fields
 */
class BlocksFields {
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
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'page',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'        => 'group_blocks',
					'title'      => __( 'Blocks', 'lesrapporteuses' ),
					'fields'     => array(
						array(
							'key'          => 'field_blocks',
							'label'        => __( 'Blocks', 'lesrapporteuses' ),
							'name'         => 'blocks',
							'type'         => 'flexible_content',
							'layouts'      => array(
								'layout_two_images'    => array(
									'key'        => 'layout_two_images',
									'name'       => 'two_images',
									'label'      => __( 'Two images', 'lesrapporteuses' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'        => 'field_layout_two_images',
											'label'      => __( 'Images', 'lesrapporteuses' ),
											'name'       => 'images',
											'type'       => 'group',
											'required'   => 0,
											'layout'     => 'block',
											'sub_fields' => array(
												array(
													'key'  => 'field_layout_two_images_0',
													'label' => __( 'Image', 'lesrapporteuses' ),
													'name' => 0,
													'type' => 'image',
													'wrapper' => array( 'width' => 50 ),
													'return_format' => 'id',
													'preview_size' => 'medium',
												),
												array(
													'key'  => 'field_layout_two_images_1',
													'label' => __( 'Image', 'lesrapporteuses' ),
													'name' => 1,
													'type' => 'image',
													'wrapper' => array( 'width' => 50 ),
													'return_format' => 'id',
													'preview_size' => 'medium',
												),
											),
										),
									),
								),
								'layout_image'         => array(
									'key'        => 'layout_image',
									'name'       => 'image',
									'label'      => __( 'Image', 'lesrapporteuses' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'          => 'field_layout_image_image',
											'label'        => __( 'Image', 'lesrapporteuses' ),
											'name'         => 'image',
											'type'         => 'image',
											'required'     => 0,
											'return_format' => 'id',
											'library'      => 'all',
											'preview_size' => 'medium',
										),
									),
								),
								'layout_title_content' => array(
									'key'        => 'layout_title_content',
									'name'       => 'title_content',
									'label'      => __( 'Title and content', 'lesrapporteuses' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'         => 'field_layout_title_content_title',
											'label'       => __( 'Title', 'lesrapporteuses' ),
											'name'        => 'title',
											'type'        => 'textarea',
											'new_lines'   => 'br',
											'rows'        => 2,
											'placeholder' => __( 'Title', 'lesrapporteuses' ),
										),
										array(
											'key'          => 'field_layout_title_content_content',
											'label'        => __( 'Content', 'lesrapporteuses' ),
											'name'         => 'content',
											'type'         => 'wysiwyg',
											'tabs'         => 'all',
											'toolbar'      => 'basic',
											'media_upload' => 0,
										),
									),
								),
								'layout_title_list'    => array(
									'key'        => 'layout_title_list',
									'name'       => 'title_list',
									'label'      => __( 'Title and list', 'lesrapporteuses' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'         => 'field_layout_title_list_title',
											'label'       => __( 'Title', 'lesrapporteuses' ),
											'name'        => 'title',
											'type'        => 'textarea',
											'new_lines'   => 'br',
											'rows'        => 2,
											'placeholder' => __( 'Title', 'lesrapporteuses' ),
										),
										array(
											'key'          => 'field_layout_title_list_list',
											'label'        => __( 'List', 'creatorfund' ),
											'name'         => 'list',
											'type'         => 'repeater',
											'layout'       => 'block',
											'sub_fields'   => array(
												array(
													'key'  => 'field_layout_title_list_list_title',
													'label' => __( 'Title', 'lesrapporteuses' ),
													'name' => 'title',
													'type' => 'text',
													'placeholder' => __( 'Title', 'lesrapporteuses' ),
												),
												array(
													'key'  => 'field_layout_title_list_list_content',
													'label' => __( 'Content', 'lesrapporteuses' ),
													'name' => 'content',
													'type' => 'textarea',
													'new_lines' => 'br',
													'rows' => 2,
													'placeholder' => __( 'Content', 'lesrapporteuses' ),
												),
											),
										),
									),
								),
							),
							'button_label' => __( 'Add Block', 'lesrapporteuses' ),
						),
					),
					'location'   => $location,
					'menu_order' => 2,
				),
			);

		}
	}
}

