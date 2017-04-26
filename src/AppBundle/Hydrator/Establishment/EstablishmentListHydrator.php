<?php
namespace AppBundle\Hydrator\Establishment;

use AppBundle\Entity\Establishment\Establishment;
use AppBundle\Entity\Establishment\EstablishmentListInterface;
use AppBundle\Utils\PropValueTrait;

class EstablishmentListHydrator implements EstablishmentListHydratorInterface
{
    use PropValueTrait;

    /** @var EstablishmentHydratorInterface */
    private $establishmentHydrator;

    /**
     * @param establishmentHydratorInterface $establishmentHydrator
     */
    public function __construct(EstablishmentHydratorInterface $establishmentHydrator)
    {
        $this->establishmentHydrator = $establishmentHydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate($data, EstablishmentListInterface $list): EstablishmentListInterface
    {
        $establishmentsData = $this->getPropValue($data, 'establishments');

        if ($establishmentsData) {
            foreach ($establishmentsData as $establishmentData) {
                $establishment = $this->establishmentHydrator->hydrate($establishmentData, new Establishment());
                $list->add($establishment);
            }
        }

        return $list;
    }
}
