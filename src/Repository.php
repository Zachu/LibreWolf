<?php namespace zachu\LibreWolf;

class Repository implements \Iterator
{
    protected $items;

    protected $model;

    private $position = 0;

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function create(array $attributes = [])
    {
        $this->items[] = new $this->model($attributes);
    }

    public function current()
    {
        return $this->items[$this->position];
    }

    public function filter(callable $filter)
    {
        $filtered = [];
        foreach ($this->items as $item) {
            if ($filter($item)) {
                $filtered[] = $item;
            }
        }

        return $this->withItems($filtered);
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

        return $this->withItems($found);
    }

    public function findByIsNotSet($column)
    {
        $found = [];
        foreach ($this->items as $item) {
            if (!isset($item->$column)) {
                $found[] = $item;
            }
        }

        return $this->withItems($found);
    }

    public function findByIsSet($column)
    {
        $found = [];
        foreach ($this->items as $item) {
            if (isset($item->$column)) {
                $found[] = $item;
            }
        }

        return $this->withItems($found);
    }

    public function findByNot($column, $value)
    {
        $found = [];
        foreach ($this->items as $item) {
            if ($item->$column !== $value) {
                $found[] = $item;
            }
        }

        return $this->withItems($found);
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

    public function nth(int $index)
    {
        return $this->items[$index] ?? null;
    }

    public function paginate($limit = 15, $skip = 0)
    {
        return $this->withItems(array_slice($this->items, $skip, $limit));
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function toArray()
    {
        return $this->items;
    }

    public function valid()
    {
        return isset($this->items[$this->position]);
    }

    private function withItems(array $items = [])
    {
        return new self($items);
    }
}
