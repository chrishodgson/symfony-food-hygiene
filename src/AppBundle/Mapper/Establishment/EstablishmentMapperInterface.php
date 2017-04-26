<?php
namespace AppBundle\Mapper\Establishment;

use AppBundle\Entity\Establishment\EstablishmentListInterface;

interface EstablishmentMapperInterface
{
    /**
     * Get an EstablishmentListInterface using a EstablishmentQuery
     * @param EstablishmentQuery $query
     * @return EstablishmentListInterface|null
     */
    public function getBy(EstablishmentQuery $query): ?EstablishmentListInterface;
}
