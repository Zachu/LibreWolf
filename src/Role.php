<?php namespace zachu\LibreWolf;

use zachu\LibreWolf\TranslatedModel;
use Illuminate\Translation\Translator;

/**
 * Class Role represents a player role in LibreWolf.
 */
class Role extends TranslatedModel
{
    protected $guarded = [
        'id',
    ];

    protected $translated = [
        'name', // Name of the role.
        'description', // Winning goal of the role.
        'special', // Special attributes or powers of the role.
        'team', // Which team the role plays for.
        'info', // Additional information for the gamemaster.
    ];

    protected $translationPrefix = 'role_';

    public function __construct(Translator $translator, array $attributes = [])
    {
        parent::__construct($attributes, $translator);
        if (!isset($this->id)) {
            throw new \Exception("Attribute id is required");
        }

        $this->translationGroup = $this->id;
    }
}
