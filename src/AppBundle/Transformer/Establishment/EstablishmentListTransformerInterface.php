<?php
namespace AppBundle\Transformer\Establishment;

use AppBundle\Entity\Establishment\EstablishmentListInterface;

interface EstablishmentListTransformerInterface
{
    /**
     * Transforms $list into template data
     *
     * @param EstablishmentListInterface $list
     * @return array
     */
    public function transform(EstablishmentListInterface $list) : array;
}
