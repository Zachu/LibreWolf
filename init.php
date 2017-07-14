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
 * Initialize Translator for localisation
 */
if (isset($_GET['lang']) && is_dir(__DIR__ . '/lang/' . $_GET['lang'])) {
    $language = strtolower($_GET['lang']);
} else {
    $language = strtolower($app['config']->get('default.lang'));
}
$fileloader        = new FileLoader(new Filesystem, 'lang');
$app['translator'] = new Translator($fileloader, $language);

/**
 * Initialize templating engine
 */
$app['templating'] = new BladeInstance('views', 'cache');

/**
 * Populate role repository
 */
$app['roles'] = new RoleRepository($app['translator']);
foreach ($app['config']->get('roles') as $role) {
    $app['roles']->create(['id' => $role]);
}
