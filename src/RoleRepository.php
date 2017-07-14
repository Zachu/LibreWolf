<?php namespace zachu\LibreWolf;

use zachu\LibreWolf\Role;
use Illuminate\Contracts\Translation\Translator;

class RoleRepository implements \Iterator
{
    private $position = 0;
    protected $items;
    protected $translator;
    protected $model = Role::class;

    public function __construct(Translator $translator, array $items = [])
    {
        $this->items      = $items;
        $this->translator = $translator;
    }

    public function all()
    {
        return $this->items;
    }

    public function paginate($limit = 15, $skip = 0)
    {
        return array_slice($this->items, $skip, $limit, true);
    }

    public function find($id)
    {
        foreach ($this->items as $item) {
            if ($item->id == $id) {
                return $item;
            }
        }
    }

    public function findBy($column, $value)
    {
        $found = [];
        foreach ($this->items as $item) {
            if ($item->$column === $value) {
                $found[] = $item;
            }
        }

        return $found;
    }

    public function findByNot($column, $value)
    {
        $found = [];
        foreach ($this->items as $item) {
            if ($item->$column !== $value) {
                $found[] = $item;
            }
        }

        return $found;
    }

    public function findByIsSet($column)
    {
        $found = [];
        foreach ($this->items as $item) {
            if (isset($item->$column)) {
                $found[] = $item;
            }
        }

        return $found;
    }

    public function findByIsNotSet($column)
    {
        $found = [];
        foreach ($this->items as $item) {
            if (!isset($item->$column)) {
                $found[] = $item;
            }
        }

        return $found;
    }

    public function create($id, array $attributes = [])
    {
        $this->items[] = new $this->model($id, $this->translator, $attributes);
    }

    public function count()
    {
        return count($this->items);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
        if ($this->valid()) {
            return $this->current();
        }
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }
}
