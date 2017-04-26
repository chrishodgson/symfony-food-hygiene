<?php
namespace AppBundle\Entity\Establishment;

interface EstablishmentInterface
{
    /**
     * Get the Local Authority Business ID
     * @return null|string
     */
    public function getLocalAuthorityBusinessID(): ?string;

    /**
     * Set the Local Authority Business ID
     * @param string $localAuthorityBusinessID
     * @return self
     */
    public function setLocalAuthorityBusinessID(string $localAuthorityBusinessID): EstablishmentInterface;

    /**
     * Get the Rating Value
     * @return null|string
     */
    public function getRatingValue(): ?string;

    /**
     * Set the Rating Value
     * @param string $ratingValue
     * @return self
     */
    public function setRatingValue(string $ratingValue): EstablishmentInterface;
}
