<?php
namespace AppBundle\Entity\Establishment;

class Establishment implements EstablishmentInterface
{
    /** @var string $localAuthorityBusinessID */
    private $localAuthorityBusinessID;

    /** @var string $ratingValue */
    private $ratingValue;

    /**
     * {@inheritdoc}
     */
    public function getLocalAuthorityBusinessID(): ?string
    {
        return $this->localAuthorityBusinessID;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocalAuthorityBusinessID(string $localAuthorityBusinessID): EstablishmentInterface
    {
        $this->localAuthorityBusinessID = $localAuthorityBusinessID;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRatingValue(): ?string
    {
        return $this->ratingValue;
    }

    /**
     * {@inheritdoc}
     */
    public function setRatingValue(string $ratingValue): EstablishmentInterface
    {
        $this->ratingValue = $ratingValue;

        return $this;
    }
}
