<?php // phpcs:ignore
/**
 * Head
 *
 * @package WordPress
 * @subpackage LesRapporteuses/Plugins/ACF/Admin
 */

namespace LesRapporteuses\Plugins\ACF\Admin;

/**
 * Head
 *
 *
 */
class Head {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_action( 'acf/input/admin_head', array( $this, 'admin_head' ) );
	}

	/**
	 * Admin head
	 */
	public function admin_head() {
		?>
		<style type="text/css">

			.acf-fields .acf-field[data-name="images"] {
				padding: 0;
			}

			.acf-fields .acf-field[data-name="images"] .acf-fields {
				border: none;
			}

			.acf-fields .acf-field[data-name="image"] .acf-label,
			.acf-fields .acf-field[data-name="images"] .acf-label {
				display: none;
			}

			.acf-fields .acf-field[data-name="image"] .image-wrap,
			.acf-fields .acf-field[data-name="images"] .image-wrap {
				max-width: none!important;
				width: 100%;
			}

			.acf-fields .acf-field[data-name="image"] .image-wrap img {
				width: 100%;
				height: auto;
				display: block;
				max-height: none!important;
			}

			.acf-fields .acf-field[data-name="images"] .image-wrap img {
				width: 100%;
				display: block;
				object-fit: cover;
				object-position: center;
			}
		</style>
		<?php
	}
}
