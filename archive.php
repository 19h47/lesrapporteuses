<?php
/**
 * Archive
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 * @since 0.0.0
 */

use Timber\{ Timber };

$templates = array( 'pages/archive-page.html.twig' );

$queried_object = get_queried_object();

$args = array(
	'post_type'      => 'case_study',
	'posts_per_page' => -1,
);


$data = Timber::context();

$data['post']          = array();
$data['post']['title'] = __( 'Case Studies', 'lesrapporteuses' );

if ( $queried_object && property_exists( $queried_object, 'term_id' ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'case_study_cat',
			'terms'    => $queried_object->term_id,
		),
	);

	$data['post']['title'] = $queried_object->name;
}

$data['posts'] = Timber::get_posts( $args );




Timber::render( $templates, $data );
