<?php
namespace AppBundle\Mapper\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;

interface LocalAuthorityMapperInterface
{
    /**
     * Get a LocalAuthorityListInterface
     * @return null|LocalAuthorityListInterface
     */
    public function get(): ?LocalAuthorityListInterface;
}
