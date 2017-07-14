<?php
require 'vendor/autoload.php';

use zachu\LibreWolf\RoleRepository;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Config\Repository as Config;

$app = [];

// Load config file
$app['config'] = new Config(include 'config.php');

// Initialize Translator for localisation
$fileloader        = new FileLoader(new Filesystem, 'lang');
$app['translator'] = new Translator($fileloader, 'fi');

// Populate role repository
$app['roles'] = new RoleRepository($app['translator']);
foreach ($app['config']->get('roles') as $role) {
    $app['roles']->create(['id' => $role]);
}

// App
foreach ($app['roles']->findByIsSet('name') as $role) {
    var_dump([$role->name, $role->team, $role->description, $role->special, $role->info]);
}
