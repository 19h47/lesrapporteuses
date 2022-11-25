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

$data          = Timber::context();
$data['post']  = array();
$data['posts'] = Timber::get_posts(
	array(
		'post_type'      => 'case_study',
		'posts_per_page' => -1,
		'tax_query'      => array(
			array(
				'taxonomy' => 'case_study_cat',
				'terms'    => $queried_object->term_id,
			),
		),
	)
);

$data['post']['title'] = $queried_object->name;


Timber::render( $templates, $data );
