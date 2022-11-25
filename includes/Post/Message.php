<?php // phpcs:ignore
/**
 * Message
 *
 * @package LesRapporteuses
 */

namespace LesRapporteuses\Post;

/**
 * Message
 */
class Message {

	/**
	 * Run function
	 *
	 * @access public
	 * @return void
	 */
	public function run() {
		add_action( 'init', array( $this, 'register_post_type' ), 10, 0 );

		add_filter( 'post_updated_messages', array( $this, 'updated_messages' ), 10, 1 );
	}


	/**
	 * Contact updated messages function
	 *
	 * @param array $messages Post updated messages. For defaults see $messages declarations above.
	 * @return array $message
	 * @access public
	 */
	public function updated_messages( array $messages ) : array {
		global $post;

		$post_ID     = isset( $post_ID ) ? (int) $post_ID : 0;
		$preview_url = get_preview_post_link( $post );

		/* translators: Publish box date format, see https://secure.php.net/date */
		$scheduled_date = date_i18n( __( 'M j, Y @ H:i' ), strtotime( $post->post_date ) );

		$view_link_html = sprintf(
			' <a href="%1$s">%2$s</a>',
			esc_url( get_permalink( $post_ID ) ),
			__( 'View Message', 'lesrapporteuses' )
		);

		$scheduled_link_html = sprintf(
			' <a target="_blank" href="%1$s">%2$s</a>',
			esc_url( get_permalink( $post_ID ) ),
			__( 'Preview Message', 'lesrapporteuses' )
		);

		$preview_link_html = sprintf(
			' <a target="_blank" href="%1$s">%2$s</a>',
			esc_url( $preview_url ),
			__( 'Preview Message', 'lesrapporteuses' )
		);

		$messages['agency'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Message updated.', 'lesrapporteuses' ) . $view_link_html,
			2  => __( 'Custom field updated.', 'lesrapporteuses' ),
			3  => __( 'Custom field deleted.', 'lesrapporteuses' ),
			4  => __( 'Message updated.', 'lesrapporteuses' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Message restored to revision from %s.', 'lesrapporteuses' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore
			6  => __( 'Message published.', 'lesrapporteuses' ) . $view_link_html,
			7  => __( 'Message saved.', 'lesrapporteuses' ),
			8  => __( 'Message submitted.', 'lesrapporteuses' ) . $preview_link_html,
			9  => sprintf( __( 'Message scheduled for: %s.', 'lesrapporteuses' ), '<strong>' . $scheduled_date . '</strong>' ) . $scheduled_link_html, // phpcs:ignore
			10 => __( 'Message draft updated.', 'lesrapporteuses' ) . $preview_link_html,
		);

		return $messages;
	}


	/**
	 * Register Custom Post Type
	 *
	 * @return void
	 * @access public
	 */
	public function register_post_type() : void {
		$labels = array(
			'name'                     => _x( 'Messages', 'message general name', 'lesrapporteuses' ),
			'singular_name'            => _x( 'Message', 'message singular name', 'lesrapporteuses' ),
			'add_new'                  => _x( 'Add New', 'message', 'lesrapporteuses' ),
			'add_new_item'             => __( 'Add New Messages', 'lesrapporteuses' ),
			'edit_item'                => __( 'Edit Message', 'lesrapporteuses' ),
			'new_item'                 => __( 'New Message', 'lesrapporteuses' ),
			'view_item'                => __( 'View Message', 'lesrapporteuses' ),
			'view_items'               => __( 'View Messages', 'lesrapporteuses' ),
			'search_items'             => __( 'Search Messages', 'lesrapporteuses' ),
			'not_found'                => __( 'No messages found.', 'lesrapporteuses' ),
			'not_found_in_trash'       => __( 'No messages found in Trash.', 'lesrapporteuses' ),
			'parent_item_colon'        => __( 'Parent Message:', 'lesrapporteuses' ),
			'all_items'                => __( 'All messages', 'lesrapporteuses' ),
			'archives'                 => __( 'Message Archives', 'lesrapporteuses' ),
			'attributes'               => __( 'Message Attributes', 'lesrapporteuses' ),
			'insert_into_item'         => __( 'Insert into message', 'lesrapporteuses' ),
			'uploaded_to_this_item'    => __( 'Uploaded to this message', 'lesrapporteuses' ),
			'featured_image'           => _x( 'Featured Image', 'message', 'lesrapporteuses' ),
			'set_featured_image'       => _x( 'Set featured image', 'message', 'lesrapporteuses' ),
			'remove_featured_image'    => _x( 'Remove featured image', 'message', 'lesrapporteuses' ),
			'use_featured_image'       => _x( 'Use as featured image', 'message', 'lesrapporteuses' ),
			'filter_items_list'        => __( 'Filter messages list', 'lesrapporteuses' ),
			'items_list_navigation'    => __( 'Messages list navigation', 'lesrapporteuses' ),
			'items_list'               => __( 'Messages list', 'lesrapporteuses' ),
			'item_published'           => __( 'Message published.', 'lesrapporteuses' ),
			'item_published_privately' => __( 'Message published privately.', 'lesrapporteuses' ),
			'item_reverted_to_draft'   => __( 'Message reverted to draft.', 'lesrapporteuses' ),
			'item_scheduled'           => __( 'Message scheduled.', 'lesrapporteuses' ),
			'item_updated'             => __( 'Message updated.', 'lesrapporteuses' ),
		);

		$args = array(
			'label'               => __( 'Message', 'lesrapporteuses' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'custom-fields' ),
			'taxonomies'          => array(),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-email',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => false,
			'map_meta_cap'        => true,
			'show_in_rest'        => false,
		);

		register_post_type( 'message', $args );
	}
}
