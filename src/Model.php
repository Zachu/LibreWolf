<?php namespace zachu\LibreWolf;

/**
 * A base class for models.
 */
class Model
{
    /**
     * Contains all the model attributes.
     * @var array
     */
    protected $attributes = [];

    /**
     * Contains list of attribute keys that
     * aren't modifiable.
     * @var array
     */
    protected $guarded = [];

    /**
     * Construct a model.
     * @param array $attributes Model attributes.
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Magic getter to handle $model->attribute queries.
     *
     * Uses get<AttributeName>Attribute accessor if defined.
     * @param  mixed  $attribute AttributeName to fetch from model.
     * @return mixed             Attribute
     */
    public function __get($attribute)
    {
        // Use accessor if such is defined
        $getterName = 'get' . ucfirst($attribute) . 'Attribute';
        if (method_exists($this, $getterName)) {
            return call_user_func([$this, $getterName]);
        }

        return $this->attributes[$attribute] ?? null;
    }

    /**
     * Magic setter to handle $model->attribute modify.
     * @param  mixed  $attribute AttributeName to modify.
     * @param  mixed  $value     Value to set the attribute.
     * @return void
     * @throws \Exception        Throws exception if modifying a guarded attribute.
     */
    public function __set($attribute, $value)
    {
        if (in_array($attribute, $guarded)) {
            throw new \Exception("Trying to modify a guarded attribute: $attribute");
        }

        // Use mutator if such is defined.
        $setterName = 'set' . ucfirst($attribute) . 'Attribute';
        if (method_exists($this, $setterName)) {
            call_user_func([$this, $setterName], $value);
        }

        $this->attributes[$attribute] = $value;
    }

    /**
     * Magic isset for checking if attribute exists.
     * @param  mixed  $attribute AttributeName to check.
     * @return boolean           true if attribute is set, false otherwise.
     */
    public function __isset($attribute)
    {
        return isset($this->attributes[$attribute]) || isset($this->$attribute);
    }
}
