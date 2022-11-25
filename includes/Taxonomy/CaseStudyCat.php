<?php // phpcs:ignore
/**
 * Case Study Cat
 *
 * PHP version 7.3.8
 *
 * @author  Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
 * @package LesRapporteuses
 */

namespace LesRapporteuses\Taxonomy;

/**
 * Case Study Cat class
 */
class CaseStudyCat {


	/**
	 * Runs initialization tasks.
	 *
	 * @access public
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}


	/**
	 * Register taxonomy
	 *
	 * @return void
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'                       => _x( 'Categories', 'case study category general name', 'lesrapporteuses' ),
			'singular_name'              => _x( 'Category', 'case study category singular name', 'lesrapporteuses' ),
			'search_items'               => __( 'Search Categories', 'lesrapporteuses' ),
			'all_items'                  => __( 'All Categories', 'lesrapporteuses' ),
			'popular_items'              => __( 'Popular Categories', 'lesrapporteuses' ),
			'parent_item'                => __( 'Parent Category', 'lesrapporteuses' ),
			'parent_item_colon'          => __( 'Parent Category:', 'lesrapporteuses' ),
			'edit_item'                  => __( 'Edit Category', 'lesrapporteuses' ),
			'view_item'                  => __( 'View Category', 'lesrapporteuses' ),
			'update_item'                => __( 'Update Category', 'lesrapporteuses' ),
			'add_new_item'               => __( 'Add New Category', 'lesrapporteuses' ),
			'new_item_name'              => __( 'New Category Name', 'lesrapporteuses' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'lesrapporteuses' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'lesrapporteuses' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'lesrapporteuses' ),
			'not_found'                  => __( 'No categories found.', 'lesrapporteuses' ),
			'no_terms'                   => __( 'No Categories', 'lesrapporteuses' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'lesrapporteuses' ),
			'items_list'                 => __( 'Categories list', 'lesrapporteuses' ),
			/* translators: Category heading when selecting from the most used terms. */
			'most_used'                  => _x( 'Most Used', 'project category', 'lesrapporteuses' ),
			'back_to_items'              => __( '&larr; Back to Categories', 'lesrapporteuses' ),
		);

		$rewrite = array(
			'slug'       => 'case-study-categories',
			'with_front' => true,
		);

		$args = array(
			'labels'              => $labels,
			'rewrite'             => $rewrite,
			'hierarchical'        => true,
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_quick_edit'  => false,
			'show_admin_column'   => true,
			'show_in_rest'        => true,
			'show_in_graphql'     => true,
			'graphql_single_name' => 'caseStudyCategory',
			'graphql_plural_name' => 'caseStudyCategories',
		);

		register_taxonomy( 'case_study_cat', array( 'case_study' ), $args );
	}
}
