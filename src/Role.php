<?php namespace zachu\LibreWolf;

use zachu\LibreWolf\TranslatedModel;
use Illuminate\Translation\Translator;

/**
 * Class Role represents a player role in LibreWolf.
 */
class Role extends TranslatedModel
{
    protected $translated = [
        'name', // Name of the role.
        'description', // Winning goal of the role.
        'special', // Special attributes or powers of the role.
        'team', // Which team the role plays for.
        'info', // Additional information for the gamemaster.
    ];

    protected $translationPrefix = 'role_';

    public function __construct(string $id, Translator $translator, array $attributes = [])
    {
        parent::__construct($attributes, $translator);
        $this->translationGroup = $id;
    }
}
