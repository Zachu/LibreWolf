<?php namespace zachu\LibreWolf;

use zachu\LibreWolf\Model;
use Illuminate\Translation\Translator;

/**
 * A model that has translated unmodifiable attributes.
 */
class TranslatedModel extends Model
{
    /**
     * List of attribute names that are translated.
     * @var array
     */
    protected $translated = [];

    /**
     * Translation group where to search the translations (e.g. a filename).
     * @var string
     */
    protected $translationGroup;

    /**
     * Prefix for model translation groups (e.g. files).
     * @var string
     */
    protected $translationPrefix;

    /**
     * Translator to handle the translations.
     * @var Illuminate\Translation\Translator
     */
    protected $translator;

    /**
     * Construct a model that has translations.
     * @param array                             $attributes Model attributes.
     * @param Illuminate\Translation\Translator $translator
     */
    public function __construct(array $attributes = [], Translator $translator)
    {
        parent::__construct($attributes);
        $this->translator = $translator;
    }

    /**
     * Magic getter to get an attribute or a translated attribute.
     * @param  mixed  $attribute AttributeName to fetch from model.
     * @return mixed             Attribute
     */
    public function __get($key)
    {
        if (in_array($key, $this->translated)) {
            return $this->translator->get($this->getTranslationKey($key));
        }

        return parent::__get($key);
    }

    /**
     * Magic isset to check if a attribute or translation exists.
     * @param  mixed  $attribute AttributeName to check.
     * @return boolean           true if attribute is set, false otherwise.
     */
    public function __isset($key)
    {
        if (in_array($key, $this->translated)) {
            return $this->translator->has($this->getTranslationKey($key));
        }

        return parent::__isset($key);
    }

    /**
     * Magic setter for modifying attributes.
     * Can not modify translated attributes.
     *
     * @param  mixed  $attribute AttributeName to modify.
     * @param  mixed  $value     Value to set the attribute.
     * @return void
     * @throws \Exception        Throws exception if modifying a translated attribute.
     */
    public function __set($key, $value)
    {
        if (in_array($key, $this->translated)) {
            throw new \Exception("Trying to modify a translated attribute: $attribute");
        }

        parent::__set($key, $value);
    }

    /**
     * Combines $translationPrefix, $translationGroup and a selected $key
     * to a string for the translator.
     * @param  string $key A key to translate.
     * @return string      Translation for the key.
     */
    public function getTranslationKey($key)
    {
        return ($this->translationPrefix ?? '') .
            (isset($this->translationGroup) ? $this->translationGroup . '.' : '') .
            $key;
    }
}
