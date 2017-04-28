<?php
require_once 'functions.php';
$config = include 'config.php';

$lang = $_GET['lang'] ?? $config['default']['lang'];

$roles       = get_roles($lang, $config);
$paperSize   = $_GET['paperSize'] ?? $config['default']['paperSize'];
$orientation = $_GET['orientation'] ?? $config['default']['orientation'];
$role_count  = get_role_count($config, $paperSize, $orientation);
