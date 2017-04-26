<?php
namespace AppBundle\Utils;

trait IntegerTrait
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function isInteger($value) : bool
    {
        if (is_int($value)) {
            return true;
        } elseif (is_string($value)) {
            return ctype_digit($value);
        } else {
            return false;
        }
    }
}