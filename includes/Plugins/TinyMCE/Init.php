<?php // phpcs:ignore
/**
 * Class Init
 *
 * @package WordPress
 * @subpackage CreatorFund\Plugins\TinyMCE
 */

namespace CreatorFund\Plugins\TinyMCE;

/**
 * Init
 *
 * @see https://gist.github.com/phillip-communify/31f91cb7ccc19c02a662c9cc2e427746
 */
class Init {

	/**
	 * Runs initialization tasks.
	 *
	 * @access public
	 */
	public function run() {
		// Custom theme colors
		$this->custom_colors = array(
			'11283E' => __( 'Very dark blue', 'creatorfund' ),
			'FFFCF7' => __( 'Very pale (mostly white) orange', 'creatorfund' ),
			'FF8A7C' => __( 'Very light red', 'creatorfund' ),
			'DDDDDD' => __( 'Very light gray', 'creatorfund' ),
			'292F36' => __( 'Very dark grayish blue', 'creatorfund' ),
		);

		add_filter( 'tiny_mce_before_init', array( $this, 'tiny_mce_before_init' ), 10, 2 );
		add_action( 'admin_head', array( $this, 'admin_head' ), 10, 0 );
		add_action( 'admin_footer', array( $this, 'set_colors' ), 10, 0 );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'set_colors' ), 10, 0 );
	}


	/**
	 * Customize TinyMCE text color picker.
	 * Filter: tiny_mce_before_init
	 *
	 * @see https://developer.wordpress.org/reference/hooks/tiny_mce_before_init/
	 *
	 * @param  array  $mceInit An array with TinyMCE config.
	 * @param string $editor_id Unique editor identifier, e.g. 'content'. Accepts 'classic-block' when called from block editor's Classic block.
	 *
	 * @return array
	 */
	public function tiny_mce_before_init( array $mceInit, string $editor_id ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.VariableNotSnakeCase

		/**
		 * Array to hold custom colors.
		 * Note that this not an associative array.
		 * Each color takes up two array elements.
		 */
		$colors_custom = array();

		foreach ( $this->custom_colors as $color => $label ) {
			$colors_custom[] = $color;
			$colors_custom[] = $label;
		}

		/**
		 * I like the custom colors to take up the entire
		 * first row. However, if there are only a few colors,
		 * the color picker becomes too narrow and tall,
		 * so this adds blank squares to help stretch it out.
		 * This block can be removed if you don't want placeholders
		 */
		$_num_of_cols = 8;
		while ( count( $colors_custom ) / 2 < $_num_of_cols ) {
			$colors_custom[] = '_hide';
			$colors_custom[] = '';
		}

		/**
		 * Original colors.
	 *
		 * @see wp-includes/js/timemce/langs/wp-langs-en.js
		 */
		$colors_original = array(
			'000000',
			'Black',
			'993300',
			'Burnt orange',
			'333300',
			'Dark olive',
			'003300',
			'Dark green',
			'003366',
			'Dark azure',
			'000080',
			'Navy Blue',
			'333399',
			'Indigo',
			'333333',
			'Very dark gray',
			'800000',
			'Maroon',
			'FF6600',
			'Orange',
			'808000',
			'Olive',
			'008000',
			'Green',
			'008080',
			'Teal',
			'0000FF',
			'Blue',
			'666699',
			'Grayish blue',
			'808080',
			'Gray',
			'FF0000',
			'Red',
			'FF9900',
			'Amber',
			'99CC00',
			'Yellow green',
			'339966',
			'Sea green',
			'33CCCC',
			'Turquoise',
			'3366FF',
			'Royal blue',
			'800080',
			'Purple',
			'999999',
			'Medium gray',
			'FF00FF',
			'Magenta',
			'FFCC00',
			'Gold',
			'FFFF00',
			'Yellow',
			'00FF00',
			'Lime',
			'00FFFF',
			'Aqua',
			'00CCFF',
			'Sky blue',
			'993366',
			'Brown',
			'C0C0C0',
			'Silver',
			'FF99CC',
			'Pink',
			'FFCC99',
			'Peach',
			'FFFF99',
			'Light yellow',
			'CCFFCC',
			'Pale green',
			'CCFFFF',
			'Pale cyan',
			'99CCFF',
			'Light sky blue',
			'CC99FF',
			'Plum',
			'FFFFFF',
			'White',
		);

		// Create complete colors array with custom and original colors
		$colors = array_merge( $colors_custom, $colors_original );

		/**
		 * Begin textcolor parameters for TinyMCE plugin.
	 *
		 * @link https://www.tinymce.com/docs/plugins/textcolor/
		 */
		$mceInit['textcolor_map'] = wp_json_encode( $colors );

		/**
		 * Colors are displayed in a grid of columns and rows.
		 * Set the number of columns to match the number of custom colors,
		 * this way our colors make up the first row so they're easier to identify quickly.
		 * Halve the count since each color has two array entries.
		 */
		$mceInit['textcolor_cols'] = count( $colors_custom ) / 2;

		// Set number of rows
		$mceInit['textcolor_rows'] = ceil( ( ( count( $colors ) / 2 ) + 1 ) / $mceInit['textcolor_cols'] );

		return $mceInit;
	}


	/**
	 * Adjust TinyMCE custom color styling grid
	 * Action: admin_head
	 *
	 * @see https://developer.wordpress.org/reference/hooks/admin_head/
	 */
	public function admin_head() { ?>
	<style type="text/css">
		/* Add padding after first row */
		.mce-colorbutton-grid tr:first-of-type td {
			padding-bottom: 10px;
		}

		/* Hide the filler blocks */
		.mce-colorbutton-grid tr:first-of-type td div[data-mce-color="#_hide"] {
			visibility: hidden;
		}

		/* Fix spacing issue with the "transparent" block */
		.mce-colorbtn-trans div {
			line-height: 11px !important;
		}
	</style>
				<?php
	}


	/**
	 * Customize Iris color picker.
	 * Inspired by @link https://wordpress.org/plugins/iris-color-picker-enhancer/
	 * Action: admin_footer, customize_controls_print_footer_scripts
	 */
	public function set_colors() {

		if ( wp_script_is( 'wp-color-picker', 'enqueued' ) ) :
			?>
		<script type="text/javascript">
			jQuery.wp.wpColorPicker.prototype.options = {
				palettes: [
			<?php
			foreach ( array_keys( $this->custom_colors ) as $color ) {
				echo "'#$color',";
			}
			?>
				]
			};
		</script>
			<?php
		endif;
	}
}
