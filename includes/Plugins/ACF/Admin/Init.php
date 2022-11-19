<?php // phpcs:ignore
/**
 * Init
 *
 * @package WordPress
 * @subpackage CreatorFund/Plugins/ACF/Admin
 */

namespace CreatorFund\Plugins\ACF\Admin;

/**
 * Init
 */
class Init {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/init', array( $this, 'add_options_theme' ) );
	}

		/**
		 * Add options pages
		 */
	public function add_options_theme() {
		$parent = acf_add_options_page(
			array(
				'page_title' => __( 'Theme Settings', 'creatorfund' ),
				'capability' => 'edit_posts',
				'icon_url'   => 'dashicons-admin-settings',
				'redirect'   => true,
			)
		);

		$home = acf_add_options_page(
			array(
				'page_title'  => __( 'Home', 'creatorfund' ),
				'menu_title'  => __( 'Home', 'creatorfund' ),
				'parent_slug' => $parent['menu_slug'],
			)
		);

		$funds = acf_add_options_page(
			array(
				'page_title'  => __( 'Fund', 'creatorfund' ),
				'menu_title'  => __( 'Fund', 'creatorfund' ),
				'parent_slug' => $parent['menu_slug'],
			)
		);
	}
}
