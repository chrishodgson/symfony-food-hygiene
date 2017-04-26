<?php
namespace AppBundle\Hydrator\Establishment;

use AppBundle\Entity\Establishment\EstablishmentInterface;

interface EstablishmentHydratorInterface
{
    /**
     * Hydrate a EstablishmentInterface
     *
     * @param mixed $data
     * @param EstablishmentInterface $establishment
     * @return EstablishmentInterface
     */
    public function hydrate($data, EstablishmentInterface $establishment): EstablishmentInterface;
}
