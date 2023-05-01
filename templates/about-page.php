<?php
/**
 * Template Name: About page
 *
 * @package LesRapporteuses
 */

use Timber\{ Timber };

$data                  = Timber::context();
$data['post']          = Timber::get_post();

Timber::render( 'pages/about-page.html.twig', $data );
