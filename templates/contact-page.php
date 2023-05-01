<?php
/**
 * Template Name: Contact page
 *
 * @package LesRapporteuses
 */

$data                  = Timber::context();
$data['post']          = Timber::get_post();
$data['post']->modules = array( 'contact-page' );

Timber::render( 'pages/contact-page.html.twig', $data );
