<?php
namespace AppBundle\Entity\Establishment;

interface EstablishmentListInterface
{
    /**
     * Add a EstablishmentInterface
     * @param EstablishmentInterface $establishment
     * @return EstablishmentListInterface
     */
    public function add(EstablishmentInterface $establishment): EstablishmentListInterface;
}
