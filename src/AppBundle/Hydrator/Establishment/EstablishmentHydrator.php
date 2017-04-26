<?php
namespace AppBundle\Hydrator\Establishment;

use AppBundle\Entity\Establishment\EstablishmentInterface;
use AppBundle\Entity\Establishment\EstablishmentScore;
use AppBundle\Utils\PropValueTrait;

class EstablishmentHydrator implements EstablishmentHydratorInterface
{
    use PropValueTrait;

    /**
     * {@inheritdoc}
     */
    public function hydrate($data, EstablishmentInterface $establishment) : EstablishmentInterface
    {
        $localAuthorityBusinessID = $this->getPropValue($data, 'LocalAuthorityBusinessID');
        $ratingValue = $this->getPropValue($data, 'RatingValue');

        if ($localAuthorityBusinessID) {
            $establishment->setLocalAuthorityBusinessID($localAuthorityBusinessID);
        }

        if ($ratingValue) {
            $establishment->setRatingValue($ratingValue);
        }

        return $establishment;
    }
}
