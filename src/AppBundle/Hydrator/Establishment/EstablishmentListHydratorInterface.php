<?php
namespace AppBundle\Hydrator\Establishment;

use AppBundle\Entity\Establishment\EstablishmentListInterface;

interface EstablishmentListHydratorInterface
{
    /**
     * Hydrate a EstablishmentListInterface
     *
     * @param $data
     * @param EstablishmentListInterface $list
     * @return EstablishmentListInterface
     */
    public function hydrate($data, EstablishmentListInterface $list): EstablishmentListInterface;
}
