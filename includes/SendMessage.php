<?php // phpcs:ignore
/**
 * Send message
 *
 * @author Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
 * @package LesRapporteuses
 */

namespace LesRapporteuses;

use LesRapporteuses\{ Mail };
use Timber\{ Timber };

/**
 * Class Send Message
 *
 * @author Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
 */
class SendMessage {

	/**
	 * Constructor
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'wp_ajax_nopriv_send_message', array( $this, 'ajax' ) );
		add_action( 'wp_ajax_send_message', array( $this, 'ajax' ) );
	}


	/**
	 * Ajax
	 *
	 * @author Jérémy Levron <jeremylevron@19h47.fr> (https://19h47.fr)
	 * @access public
	 */
	public function ajax() {
		check_ajax_referer( 'security', 'nonce' );

		$data = isset( $_POST ) ? $_POST : false;

		if ( ! $data ) {
			return;
		}

		$new_post = array(
			'post_title'  => $data['email'],
			'post_status' => 'publish',
			'post_type'   => 'message',
		);

		$pid = wp_insert_post( $new_post );

		add_post_meta( $pid, 'email', $data['email'], true );
		add_post_meta( $pid, 'full_name', $data['full_name'], true );
		add_post_meta( $pid, 'message', $data['message'], true );

		// Mail.
		$to[] = 'gwen@lesrapporteuses.fr';
		$to[] = 'julia@lesrapporteuses.fr';

		$headers[] = 'From: ' . $data['full_name'] . ' <contact@lesrapporteuses.fr>';
		$headers[] = 'Reply-To: ' . $data['email'];

		$context = Timber::context();

		$context['post'] = Timber::get_post( $pid );

		Mail::init()
			->to( $to )
			->subject( __( '[lesrapporteuses.fr] Contact', 'lesrapporteuses' ) )
			->message( 'partials/message.html.twig', $context )
			->headers( $headers )
			->send();

		wp_die();
	}
}
