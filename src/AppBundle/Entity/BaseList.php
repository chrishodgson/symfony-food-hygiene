<?php
namespace AppBundle\Entity;

use ArrayIterator;

abstract class BaseList implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $list = [];

    /**
     * @return string
     */
    abstract protected function getAllowedType(): string;

    /**
     * @param mixed $item
     * @return self
     */
    public function append($item): self
    {
        $this->validate($item);

        $this->list[] = $item;

        return $this;
    }

    /**
     * @param $item
     * @throws \InvalidArgumentException
     * @return void
     */
    private function validate($item): void
    {
        $type = $this->getAllowedType();

        if(!$item instanceof $type){
            throw new \InvalidArgumentException('The list can only contain type: ' . $type);
        }
    }

    /**
     * @return array
     */
    public function get(): array
    {
        return $this->list;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->list);
    }
}
