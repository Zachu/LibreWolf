<?php require 'init.php';

echo $app['templating']->render('layout', [
    'roles' => $app['roles'],
]);
