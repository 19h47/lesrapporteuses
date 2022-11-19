<?php // phpcs:ignore
/**
 * Front Page Fields
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

namespace LesRapporteuses\Plugins\ACF;

/**
 * Front Page Fields
 */
class FrontPageFields {
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

		$hide_on_screen = array( 'the_content', 'featured_image' );

		$location = array(
			array(
				array(
					'param'    => 'page_type',
					'operator' => '==',
					'value'    => 'front_page',
				),
			),
		);

		$fields = array(
			array(
				'key'        => 'field_front_page_hero',
				'label'      => __( 'Hero', 'lesrapporteuses' ),
				'name'       => 'hero',
				'type'       => 'group',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'           => 'field_front_page_hero_image',
						'label'         => __( 'Image', 'lesrapporteuses' ),
						'name'          => 'image',
						'type'          => 'image',
						'return_format' => 'id',
					),
					array(
						'key'         => 'field_front_page_hero_title',
						'label'       => __( 'Title', 'lesrapporteuses' ),
						'name'        => 'title',
						'type'        => 'textarea',
						'placeholder' => __( 'Title', 'lesrapporteuses' ),
						'rows'        => 2,
					),
					array(
						'key'         => 'field_front_page_hero_content',
						'label'       => __( 'Content', 'lesrapporteuses' ),
						'name'        => 'content',
						'type'        => 'textarea',
						'placeholder' => __( 'Content', 'lesrapporteuses' ),
						'rows'        => 2,
					),
					array(
						'key'        => 'field_front_page_images',
						'label'      => __( 'Images', 'lesrapporteuses' ),
						'name'       => 'images',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'           => 'field_front_page_images_0',
								'label'         => __( 'Image', 'lesrapporteuses' ),
								'name'          => 0,
								'type'          => 'image',
								'wrapper'       => array(
									'width' => 50,
								),
								'return_format' => 'id',
								'library'       => 'all',
								'preview_size'  => 'medium',
							),
							array(
								'key'           => 'field_front_page_images_1',
								'label'         => 'image',
								'name'          => 1,
								'type'          => 'image',
								'wrapper'       => array(
									'width' => 50,
								),
								'return_format' => 'if',
								'library'       => 'all',
								'preview_size'  => 'medium',
							),
						),
					),
					array(
						'key'        => 'field_front_page_colors',
						'label'      => __( 'Colors', 'lesrapporteuses' ),
						'name'       => 'colors',
						'type'       => 'group',
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'     => 'field_front_page_colors_0',
								'label'   => __( 'Color', 'lesrapporteuses' ),
								'name'    => 0,
								'type'    => 'color_picker',
								'wrapper' => array(
									'width' => 100 / 3,
								),
							),
							array(
								'key'     => 'field_front_page_colors_1',
								'label'   => __( 'Color', 'lesrapporteuses' ),
								'name'    => 1,
								'type'    => 'color_picker',
								'wrapper' => array(
									'width' => 100 / 3,
								),
							),
							array(
								'key'     => 'field_front_page_colors_2',
								'label'   => __( 'Color', 'lesrapporteuses' ),
								'name'    => 2,
								'type'    => 'color_picker',
								'wrapper' => array(
									'width' => 100 / 3,
								),
							),
						),
					),
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'      => 'group_front_page',
					'title'    => __( 'Front Page Fields', 'lesrapporteuses' ),
					'fields'   => $fields,
					'location' => $location,
				)
			);

		}
	}
}
