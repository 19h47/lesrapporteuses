<?php // phpcs:ignore
/**
 * About Page Fields
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

namespace LesRapporteuses\Plugins\ACF;

/**
 * About Page Fields
 */
class AboutPageFields {
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
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => 'templates/about-page.php',
				),
			),
		);

		$fields = array(
			array(
				'key'        => 'field_about_page_hero',
				'label'      => __( 'Hero', 'lesrapporteuses' ),
				'name'       => 'hero',
				'type'       => 'group',
				'layout'     => 'block',
				'sub_fields' => array(
					array(
						'key'           => 'field_about_page_hero_image',
						'label'         => __( 'Image', 'lesrapporteuses' ),
						'name'          => 'image',
						'type'          => 'image',
						'return_format' => 'id',
					),
					array(
						'key'         => 'field_about_page_hero_title',
						'label'       => __( 'Title', 'lesrapporteuses' ),
						'name'        => 'title',
						'type'        => 'textarea',
						'placeholder' => __( 'Title', 'lesrapporteuses' ),
						'rows'        => 2,
						'new_lines'   => 'br',
					),
					array(
						'key'         => 'field_about_page_hero_content',
						'label'       => __( 'Content', 'lesrapporteuses' ),
						'name'        => 'content',
						'type'        => 'textarea',
						'placeholder' => __( 'Content', 'lesrapporteuses' ),
						'rows'        => 2,
						'new_lines'   => 'br',
					),
				),
			),
		);

		if ( function_exists( 'acf_add_local_field_group' ) ) {

			acf_add_local_field_group(
				array(
					'key'            => 'group_about_page',
					'title'          => __( 'About Page Fields', 'lesrapporteuses' ),
					'fields'         => $fields,
					'location'       => $location,
					'hide_on_screen' => $hide_on_screen,
					'menu_order'     => 0,
				)
			);

		}
	}
}
