<?php
namespace AppBundle\Entity\Establishment;

use AppBundle\Entity\BaseList;

class EstablishmentList extends BaseList implements EstablishmentListInterface
{
    /**
     * {@inheritdoc}
     */
    protected function getAllowedType(): string
    {
        return EstablishmentInterface::class;
    }

    /**
     * @param EstablishmentInterface $establishment
     * @return EstablishmentListInterface
     */
    public function add(EstablishmentInterface $establishment): EstablishmentListInterface
    {
        $this->append($establishment);

        return $this;
    }
}
