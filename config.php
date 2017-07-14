<?php return [
    'roles'           => [
        'farmer',
        'butcher',
        'blacksmith',
        'seer',
        'werewolf',
        'hunter',
        'healer',
        'werewolf2',
        'witch',
        'cupid',
        'lunatic',
        'medium',
        'diseased',
        'alphawolf',
        'pacifist',
        'knight',
        'werecub',
        'troublemaker',
        'bearded_lady',
        'wolfman',
        'senior',
        'child',
        'lone_wolf',
        'freemason',
        'freemason2',
        'lovers',
    ],

    'night_phases'    => [
        ['medium'],
        ['seer'],
        ['werewolf', 'werewolf2', 'werecub', 'alphawolf', 'lone_wolf'],
        ['hunter'],
        ['witch'],
        ['healer'],
    ],

    'skip_role_cards' => ['lovers'],
    'skip_role_rules' => ['werewolf2', 'freemason2'],

    'role_count'      => [
        'a4' => [
            'portrait'  => [3, 3],
            'landscape' => [4, 2],
        ],
    ],

    'default'         => [
        'paperSize'   => 'a4',
        'orientation' => 'portrait',
        'lang'        => 'fi',
    ],
];
