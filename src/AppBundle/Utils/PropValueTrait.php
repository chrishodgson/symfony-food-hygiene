<?php
namespace AppBundle\Utils;

trait PropValueTrait
{
    /**
     * @param mixed $data
     * @param string $name
     * @return mixed|null
     */
    public function getPropValue($data, string $name)
    {
        return isset($data->$name) ? $data->$name : null;
    }
}
