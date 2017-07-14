<?php namespace zachu\LibreWolf;

use zachu\LibreWolf\Role;
use zachu\LibreWolf\Repository;
use Illuminate\Contracts\Translation\Translator;

class RoleRepository extends Repository
{
    protected $model = Role::class;

    protected $translator;

    public function __construct(Translator $translator, array $items = [])
    {
        parent::__construct($items);
        $this->translator = $translator;
    }

    public function create(array $attributes = [])
    {
        $this->items[] = new $this->model($this->translator, $attributes);
    }

    public function toArray()
    {
        return $this->items;
    }

    public function withItems(array $items = [])
    {
        return new self($this->translator, $items);
    }
}
