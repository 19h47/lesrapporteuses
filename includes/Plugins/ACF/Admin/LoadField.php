<?php // phpcs:ignore
/**
 * Load Field
 *
 * @package WordPress
 * @subpackage CreatorFund/Plugins/ACF/Admin
 */

namespace CreatorFund\Plugins\ACF\Admin;

/**
 * Load Field
 */
class LoadField {
	/**
	 * Runs initialization tasks.
	 *
	 * @return void
	 */
	public function run() {
		add_filter( 'acf/load_field/name=taxonomies', array( $this, 'field_taxonomies' ) );
	}


	/**
	 * ACF load field taxonomies
	 *
	 * @param array $field Field.
	 *
	 * @return array $field
	 */
	public function field_taxonomies( array $field ) : array {

		$field['choices'] = array();

		$taxonomies = get_object_taxonomies( 'case_study', 'objects' );

		// wp_die( var_dump( $taxonomies ) );

		foreach ( $taxonomies as $key => $value ) {
			$field['choices'][ $key ] = $value->label;
		}

		return $field;
	}
}
