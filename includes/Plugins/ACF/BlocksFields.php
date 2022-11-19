<?php // phpcs:ignore
/**
 * Blocks Fields
 *
 * @package WordPress
 * @subpackage CreatorFund
 */

namespace CreatorFund\Plugins\ACF;

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
					'value'    => 'post',
				),
			),
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
					'value'    => 'member',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'job',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'page',
				),
				array(
					'param'    => 'page_type',
					'operator' => '!=',
					'value'    => 'front_page',
				),
				array(
					'param'    => 'page_template',
					'operator' => '!=',
					'value'    => 'templates/archive-case-study.php',
				),
				array(
					'param'    => 'page_template',
					'operator' => '!=',
					'value'    => 'templates/archive-member.php',
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'        => 'group_blocks',
					'title'      => 'Blocks',
					'fields'     => array(
						array(
							'key'          => 'field_blocks',
							'label'        => 'Blocks',
							'name'         => 'blocks',
							'type'         => 'flexible_content',
							'instructions' => '',
							'layouts'      => array(
								'layout_blocks_image'   => array(
									'key'        => 'layout_blocks_image',
									'name'       => 'image',
									'label'      => __( 'Image', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'          => 'field_blocks_image',
											'label'        => __( 'Image', 'creatorfund' ),
											'name'         => 'image',
											'type'         => 'image',
											'return_format' => 'id',
											'preview_size' => 'medium',
											'library'      => 'all',
										),
									),
								),
								'layout_blocks_content_quote' => array(
									'key'        => 'layout_blocks_content_quote',
									'name'       => 'content_quote',
									'label'      => __( 'Content, Quote', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'         => 'field_blocks_content_quote_title',
											'label'       => __( 'Title', 'creatorfund' ),
											'name'        => 'title',
											'type'        => 'text',
											'placeholder' => __( 'Title', 'creatorfund' ),
										),
										array(
											'key'          => 'field_blocks_content_quote_content',
											'label'        => __( 'Content', 'creatorfund' ),
											'name'         => 'content',
											'type'         => 'wysiwyg',
											'wrapper'      => array( 'width' => 50 ),
											'tabs'         => 'all',
											'toolbar'      => 'basic',
											'media_upload' => 0,
										),
										array(
											'key'        => 'field_blocks_content_quote_quote',
											'label'      => __( 'Quote', 'creatorfund' ),
											'name'       => 'quote',
											'type'       => 'group',
											'wrapper'    => array( 'width' => 50 ),
											'layout'     => 'block',
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_content_quote_quote_content',
													'label' => __( 'Content', 'creatorfund' ),
													'name' => 'content',
													'type' => 'textarea',
													'rows' => 4,
													'new_lines' => 'br',
													'placeholder' => __( 'Content', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_content_quote_quote_author',
													'label' => __( 'Author', 'creatorfund' ),
													'name' => 'author',
													'type' => 'text',
													'placeholder' => __( 'Author', 'creatorfund' ),
												),
											),
										),
									),
								),
								'layout_blocks_content_images' => array(
									'key'        => 'layout_blocks_content_images',
									'name'       => 'content_images',
									'label'      => __( 'Content, Images', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'        => 'field_blocks_content_images_content',
											'label'      => __( 'Content', 'creatorfund' ),
											'name'       => 'content',
											'type'       => 'group',
											'wrapper'    => array( 'width' => 50 ),
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_content_images_content_title',
													'label' => __( 'Title', 'creatorfund' ),
													'name' => 'title',
													'type' => 'text',
													'placeholder' => __( 'Title', 'creatorfund' ),
													'instructions' => __( 'Title', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_content_images_content_content',
													'label' => __( 'Content', 'creatorfund' ),
													'name' => 'content',
													'type' => 'wysiwyg',
													'tabs' => 'all',
													'toolbar' => 'basic',
													'media_upload' => 0,
													'instructions' => __( 'Content', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_content_images_content_links',
													'label' => __( 'Links', 'creatorfund' ),
													'name' => 'links',
													'type' => 'repeater',
													'layout' => 'block',
													'instructions' => __( 'Links', 'creatorfund' ),
													'sub_fields' => array(
														array(
															'key'  => 'field_blocks_content_images_content_links_link',
															'label' => __( 'Link', 'creatorfund' ),
															'name' => 'link',
															'type' => 'link',
															'return_format' => 'array',
														),
														array(
															'key'           => 'field_blocks_content_images_content_links_style',
															'label'         => __( 'Style', 'creatorfund' ),
															'name'          => 'style',
															'type'          => 'select',
															'choices'       => array(
																'button'            => __( 'Button', 'creatorfund' ),
																'button button-red' => __( 'Button Red', 'creatorfund' ),
																'button-white'      => __( 'Button White', 'creatorfund' ),
																'button-blue'       => __( 'Button Blue', 'creatorfund' ),
															),
															'default_value' => 'button',
															'return_format' => 'value',
															'placeholder'   => __( 'Style', 'creatorfund' ),
														),
													),
												),
											),
										),
										array(
											'key'     => 'field_blocks_content_images_images',
											'label'   => __( 'Images', 'creatorfund' ),
											'name'    => 'images',
											'type'    => 'gallery',
											'min'     => 0,
											'max'     => 2,
											'wrapper' => array( 'width' => 50 ),
										),
										array(
											'key'     => 'field_blocks_content_images_image_position',
											'label'   => __( 'Image Position', 'creatorfund' ),
											'name'    => 'image_position',
											'type'    => 'select',
											'choices' => array(
												'left'  => __( 'Left', 'creatorfund' ),
												'right' => __( 'Right', 'creatorfund' ),
											),
											'default_value' => array( 'left' ),
											'return_format' => 'value',
										),
									),
								),
								'layout_blocks_content_image' => array(
									'key'        => 'layout_blocks_content_image',
									'name'       => 'content_image',
									'label'      => __( 'Content, Image', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'         => 'field_blocks_content_image_title',
											'label'       => __( 'Title', 'creatorfund' ),
											'name'        => 'title',
											'type'        => 'text',
											'placeholder' => __( 'Title', 'creatorfund' ),
										),
										array(
											'key'          => 'field_blocks_content_image_content',
											'label'        => __( 'Content', 'creatorfund' ),
											'name'         => 'content',
											'type'         => 'wysiwyg',
											'wrapper'      => array( 'width' => 50 ),
											'tabs'         => 'all',
											'toolbar'      => 'basic',
											'media_upload' => 0,
										),
										array(
											'key'          => 'field_blocks_content_image_image',
											'label'        => __( 'Image', 'creatorfund' ),
											'name'         => 'image',
											'type'         => 'image',
											'return_format' => 'id',
											'preview_size' => 'medium',
											'library'      => 'all',
											'wrapper'      => array( 'width' => 50 ),

										),
									),
								),
								'layout_blocks_content_related_posts' => array(
									'key'        => 'layout_blocks_content_related_posts',
									'name'       => 'content_related_posts',
									'label'      => __( 'Content, Related Posts', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'         => 'field_blocks_content_related_posts_title',
											'label'       => __( 'Title', 'creatorfund' ),
											'name'        => 'title',
											'type'        => 'text',
											'placeholder' => __( 'Title', 'creatorfund' ),
										),
										array(
											'key'          => 'field_blocks_content_related_posts_content',
											'label'        => __( 'Content', 'creatorfund' ),
											'name'         => 'content',
											'type'         => 'wysiwyg',
											'wrapper'      => array( 'width' => 50 ),
											'tabs'         => 'all',
											'toolbar'      => 'basic',
											'media_upload' => 0,
										),
										array(
											'key'       => 'field_blocks_content_related_posts_related_posts',
											'label'     => __( 'Related Posts', 'creatorfund' ),
											'name'      => 'related_posts',
											'type'      => 'relationship',
											'post_type' => array( 'post' ),
											'filters'   => array(
												'search',
											),
											'max'       => 2,
											'return_format' => 'id',
											'wrapper'   => array( 'width' => 50 ),
										),
									),
								),
								'layout_blocks_push'    => array(
									'key'        => 'layout_blocks_push',
									'name'       => 'push',
									'label'      => __( 'Push', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'        => 'field_blocks_push_text',
											'label'      => __( 'Text', 'creatorfund' ),
											'name'       => 'text',
											'type'       => 'group',
											'wrapper'    => array( 'width' => 50 ),
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_push_text_title',
													'label' => __( 'Title', 'creatorfund' ),
													'name' => 'title',
													'type' => 'text',
													'placeholder' => __( 'Title', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_push_text_content',
													'label' => __( 'Content', 'creatorfund' ),
													'name' => 'content',
													'type' => 'wysiwyg',
													'tabs' => 'all',
													'toolbar' => 'basic',
													'media_upload' => 0,
												),
											),
										),

										array(
											'key'        => 'field_blocks_push_cta',
											'label'      => __( 'Click To Action', 'creatorfund' ),
											'name'       => 'cta',
											'type'       => 'group',
											'wrapper'    => array( 'width' => 50 ),
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_push_cta_title',
													'label' => __( 'Title', 'creatorfund' ),
													'name' => 'title',
													'type' => 'text',
													'placeholder' => __( 'Title', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_push_cta_content',
													'label' => __( 'Content', 'creatorfund' ),
													'name' => 'content',
													'type' => 'wysiwyg',
													'tabs' => 'all',
													'toolbar' => 'basic',
													'media_upload' => 0,
												),
												array(
													'key'  => 'field_blocks_push_cta_link',
													'label' => __( 'Link', 'creatorfund' ),
													'name' => 'link',
													'type' => 'link',
													'return_format' => 'array',
												),

												array(
													'key'  => 'field_blocks_push_cta_image',
													'label' => __( 'Image', 'creatorfund' ),
													'name' => 'image',
													'type' => 'image',
													'return_format' => 'id',
												),
											),
										),

									),
								),
								'layout_blocks_links'   => array(
									'key'        => 'layout_blocks_links',
									'name'       => 'links',
									'label'      => __( 'Links', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'        => 'field_blocks_links_links',
											'label'      => __( 'Links', 'creatorfund' ),
											'name'       => 'links',
											'type'       => 'repeater',
											'layout'     => 'block',
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_links_links_link',
													'label' => __( 'Link', 'creatorfund' ),
													'name' => 'link',
													'type' => 'link',
													'return_format' => 'array',
												),
											),
										),
									),
								),
								'layout_blocks_notice'  => array(
									'key'          => 'layout_blocks_notice',
									'name'         => 'notice',
									'label'        => __( 'Notice', 'creatorfund' ),
									'instructions' => __( 'This block is used to display a notice to the user.', 'creatorfund' ),
									'display'      => 'block',
									'sub_fields'   => array(
										array(
											'key'          => 'field_blocks_notice_title',
											'label'        => __( 'Title', 'creatorfund' ),
											'name'         => 'title',
											'type'         => 'text',
											'placeholder'  => __( 'Title', 'creatorfund' ),
											'instructions' => __( 'Title of the notice.', 'creatorfund' ),
										),
										array(
											'key'          => 'field_blocks_notice_content',
											'label'        => __( 'Content', 'creatorfund' ),
											'name'         => 'content',
											'type'         => 'textarea',
											'rows'         => 4,
											'placeholder'  => __( 'Content', 'creatorfund' ),
											'instructions' => __( 'Content of the notice.', 'creatorfund' ),
										),
										array(
											'key'          => 'field_blocks_notice_link',
											'label'        => __( 'Link', 'creatorfund' ),
											'name'         => 'link',
											'type'         => 'link',
											'return_format' => 'array',
											'instructions' => __( 'Link of the notice.', 'creatorfund' ),
										),
									),

								),
								'layout_blocks_network' => array(
									'key'        => 'layout_blocks_network',
									'name'       => 'network',
									'label'      => __( 'Network', 'creatorfund' ),
									'display'    => 'block',
									'sub_fields' => array(
										array(
											'key'        => 'field_blocks_network_introduction',
											'name'       => 'introduction',
											'label'      => __( 'Introduction', 'creatorfund' ),
											'type'       => 'group',
											'sub_fields' => array(
												array(
													'key'  => 'field_blocks_network_introduction_title',
													'label' => __( 'Title', 'creatorfund' ),
													'name' => 'title',
													'type' => 'text',
													'placeholder' => __( 'Title', 'creatorfund' ),
												),
												array(
													'key'  => 'field_blocks_network_introduction_content',
													'label' => __( 'Content', 'creatorfund' ),
													'name' => 'content',
													'type' => 'textarea',
													'placeholder' => __( 'Content', 'creatorfund' ),
													'rows' => 2,
													'new_lines' => '',
												),
											),
										),
										array(
											'key'         => 'field_blocks_network_title',
											'label'       => __( 'Title', 'creatorfund' ),
											'name'        => 'title',
											'type'        => 'text',
											'placeholder' => __( 'Title', 'creatorfund' ),
										),
										array(
											'key'   => 'field_blocks_network_content',
											'label' => __( 'Content', 'creatorfund' ),
											'name'  => 'content',
											'type'  => 'wysiwyg',
										),
										array(
											'key'          => 'field_blocks_network_links',
											'label'        => __( 'Links', 'creatorfund' ),
											'name'         => 'links',
											'type'         => 'repeater',
											'layout'       => 'block',
											'instructions' => __( 'Links', 'creatorfund' ),
											'sub_fields'   => array(
												array(
													'key'  => 'field_blocks_network_links_link',
													'label' => __( 'Link', 'creatorfund' ),
													'name' => 'link',
													'type' => 'link',
													'return_format' => 'array',
													'wrapper' => array( 'width' => 50 ),
												),
												array(
													'key'  => 'field_blocks_network_links_style',
													'label' => __( 'Style', 'creatorfund' ),
													'name' => 'style',
													'type' => 'select',
													'choices' => array(
														'button' => __( 'Button', 'creatorfund' ),
														'button button-red' => __( 'Button Red', 'creatorfund' ),
														'button-white' => __( 'Button White', 'creatorfund' ),
														'button-blue' => __( 'Button Blue', 'creatorfund' ),
													),
													'default_value' => 'button',
													'return_format' => 'value',
													'placeholder' => __( 'Style', 'creatorfund' ),
													'wrapper' => array( 'width' => 50 ),
												),
											),
										),
										array(
											'key'   => 'field_blocks_network_animation',
											'label' => __( 'Animation', 'creatorfund' ),
											'name'  => 'animation',
											'type'  => 'true_false',
											'default_value' => 0,
										),
										array(
											'key'          => 'field_blocks_network_image',
											'label'        => __( 'Image', 'creatorfund' ),
											'name'         => 'image',
											'type'         => 'image',
											'conditional_logic' => array(
												array(
													array(
														'field' => 'field_blocks_network_animation',
														'operator' => '!=',
														'value' => 1,
													),
												),
											),
											'return_format' => 'id',
											'preview_size' => 'medium',
										),
										array(
											'key'       => 'field_blocks_network_members',
											'label'     => __( 'Members', 'creatorfund' ),
											'name'      => 'members',
											'type'      => 'relationship',
											'post_type' => array( 'member' ),
											'filters'   => array( 'search' ),
											'return_format' => 'id',
											'conditional_logic' => array(
												array(
													array(
														'field' => 'field_blocks_network_animation',
														'operator' => '==',
														'value' => 1,
													),
												),
											),
										),
									),
								),

							),
							'button_label' => __( 'Add Block', 'creatorfund' ),
						),
					),
					'location'   => $location,
					'menu_order' => 0,
				),
			);

		}
	}
}

