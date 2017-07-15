<?php
/**
 * This file is the bootstrap file for creating LibreWolf content.
 */
require 'vendor/autoload.php';

use zachu\LibreWolf\RoleRepository;
use duncan3dc\Laravel\BladeInstance;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Config\Repository as Config;

$app = [];

/**
 * Initialize configuration
 */
$app['config'] = new Config(include 'config.php');

/**
 * Parse user provided configuration
 */
// Language
if (isset($_GET['lang']) && is_dir(__DIR__ . '/lang/' . $_GET['lang'])) {
    $app['locale'] = strtolower($_GET['lang']);
} else {
    $app['locale'] = strtolower($app['config']->get('default.lang'));
}

// Paper size
if (isset($_GET['paperSize']) && $app['config']->has('role.card_count.' . $_GET['paperSize'])) {
    $app['paperSize'] = strtolower($_GET['paperSize']);
} else {
    $app['paperSize'] = strtolower($app['config']->get('default.paperSize'));
}

// Paper orientation
if (isset($_GET['orientation']) && in_array($_GET['orientation'], ['portrait', 'landscape'])) {
    $app['orientation'] = strtolower($_GET['orientation']);
} else {
    $app['orientation'] = strtolower($app['config']->get('default.orientation'));
}

// Calculate fetch the role card dimensions
$app['role_card_count'] = $app['config']->get('role_card_count.' . $app['paperSize'] . '.' . $app['orientation']);

/**
 * Initialize Translator for localisation
 */
{
    $fileloader = new FileLoader(new Filesystem, 'lang');
}

$app['translator'] = new Translator($fileloader, $app['locale']);

/**
 * Initialize templating engine
 */
$app['template'] = new BladeInstance('views', 'cache');
$app['template']->addPath('lang/' . $app['translator']->getLocale());

/**
 * Populate role repository
 */
$app['roles'] = new RoleRepository($app['translator']);
foreach ($app['config']->get('roles') as $role) {
    $app['roles']->create(['id' => $role]);
}
