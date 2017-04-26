<?php
namespace AppBundle\Mapper\Establishment;

use AppBundle\Utils\IntegerTrait;

class EstablishmentQuery
{
    use IntegerTrait;

    /** @var int */
    private $localAuthorityId;

    /**
     * @return int|null
     */
    public function getLocalAuthorityId(): ?int
    {
        return $this->localAuthorityId;
    }

    /**
     * @param int $localAuthorityId
     * @return EstablishmentQuery
     */
    public function setLocalAuthorityId(int $localAuthorityId): EstablishmentQuery
    {
        $this->localAuthorityId = $localAuthorityId;

        return $this;
    }
}
