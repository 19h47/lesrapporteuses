<?php
/**
 * Single Case Study
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 * @since 0.0.0
 */

use Timber\{ Timber };

$templates = array( 'pages/single-case-study.html.twig' );
$data      = Timber::context();

Timber::render( $templates, $data );
