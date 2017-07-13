# LibreWolf

LibreWolf is a version of party game called Werewolf or sometimes Mafia or Mafioso. It's a game where each of the players are given a role that only the player knows.

The story of the game is set in a Dark Ages when there was still a pinch of magic and trifle of mysticism in the world. There's horrible things happening in a small town. Villagers are being found dead in the morning. Every clue hints to werewolves, but which ones of the villagers are werewolves? Villagers have to find out the guilty ones and get rid of them by hook or by crook until it's too late.

# I only want to play!

1. Head to the [Releases section](https://github.com/Zachu/LibreWolf/releases) and print the latest .pdf file!
2. Invite lots of friends
3. At the end of the printed pdf you get a bunch of playing cards. Grab a pair of scissors and work on them, while waiting for your friends.
4. Read the game instructions while still waiting for your friends.
5. Do as the instructions tell you to and have fun while playing LibreWolf!

# Installation

@TODO

## Settings

__Size and orientation__
```
defaults:
  paperSize: a4
  orientation: portrait
```

URL: `paperSize=a4&orientation=portrait`
config.php: 
```php
'default' => [
    'paperSize'   => 'a4',
    'orientation' => 'portrait',
]
```

You can specify more options at config.php:
```php
'role_count' => [
    'a4' => [                  // paperSize
        'portrait'  => [3, 3], // number of cards in row, number of rows
        'landscape' => [4, 2], // number of cards in row, number of rows
    ],
]
```

__Language__
```
defaults:
  lang: fi
```

URL: `lang=fi`
config.php:
```php
'default'    => [
    'lang' => 'fi',
]
```

Languages are specified in lang/ directory under a language shorthand.

## Language

The directory structure is following:
```
fi
    ├───roles //Rolenames and order are specified in config.php section roles
    │       alphawolf.php
    │       bearded_lady.php
    │       blacksmith.php
    │
...
    │
    ├───rules
    └───templates //Templates can be used in role or rule files
            villager.php
            werewolf.php
```

Structure of template file:
```php
<?php return [
    'team'        => 'Villager',
    'description' => 'During a day figure out with other villagers who are the werewolves, and get rid of them before it is too late!',
];
```

Structure of role file:
```php
<?php return [
    'template' => 'villager',
    'team'     => 'Villager',
    'name'     => 'Seer',
    'description' => 'During a day figure out with other villagers who are the werewolves, and get rid of them before it is too late!',
    'special'  => 'Once a night you can see if a player is a werewolf.',
    'info'     => 'Gamemaster shows you yes-sign if your inquiry hits a werewolf.',
];
```
__team:__ Which team the role belongs to.
__name:__ The name of the role.
__special:__ A special ability of the role. Not required.
__description:__ A common goal for the role to achieve.
__template:__ Specify a template that the role file extends.
__info:__ Additional information about how the role works.

Common usage of the templates:
```php
<?php return [
    'team'        => 'Villager',
    'description' => 'During a day figure out with other villagers who are the werewolves, and get rid of them before it is too late!',
];
```

So the role file could be reduced to:
```php
<?php return [
    'template' => 'villager',
    'name'     => 'Seer',
    'special'  => 'Once a night you can see if a player is a werewolf.',
    'info'     => 'Gamemaster shows you yes-sign if your inquiry hits a werewolf.',
];
```

# Building a printable pdf

You can just print the webpage to a PDF file.

Or with Chrome or Chromium 59 installed (for headless support):
```
chromium-browser --headless --disable-gpu http://{URL_TO_LibreWolf}/
```

After checking out a certain tag, you can name the output file accordingly:
```
$ BUILDLANG="fi" && BUILDVER=$(git describe --exact-match --tags $(git log -n1 --pretty='%h')) && chromium-browser --headless --disable-gpu --print-to-pdf="dist/LibreWolf-${BUILDVER}-${BUILDLANG}.pdf" http://localhost/LibreWolf/?lang=${BUILDLANG}
```