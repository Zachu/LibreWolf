<?php require 'init.php';

echo $app['template']->render('layout', [
    'roles'           => $app['roles'],
    'language'        => $app['translator']->getLocale(),
    'template'        => $app['template'],
    'skip_role_cards' => $app['config']->get('skip_role_cards'),
    'skip_role_rules' => $app['config']->get('skip_role_rules'),
    'role_card_count' => $app['role_card_count'],
    'night_phases'    => $app['config']->get('night_phases'),
]);
