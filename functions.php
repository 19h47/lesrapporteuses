<?php
/**
 * Les Rapporteuses functions and definitions
 *
 * @package WordPress
 * @subpackage LesRapporteuses
 */

// Autoloader.
require_once get_template_directory() . '/vendor/autoload.php';

Timber\Timber::init();
LesRapporteuses\Init::run_services();
