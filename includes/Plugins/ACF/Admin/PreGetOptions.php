<?php // phpcs:ignore
/**
 * Pre Get Options
 *
 * @package WordPress
 * @subpackage CreatorFund/Plugins/ACF/Admin
 */

namespace CreatorFund\Plugins\ACF\Admin;

/**
 * Pre Get Options
 */
class PreGetOptions {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_filter(
			'pre_option_options_sticky_funds',
			function() {
				return get_option( 'sticky_funds' );
			}
		);

		add_action(
			'update_option',
			function( $option, $old_value, $value ) {

				if ( 'options_sticky_funds' === $option ) {
					update_option( 'sticky_funds', $value );
				}
			},
			10,
			3
		);
	}
}
