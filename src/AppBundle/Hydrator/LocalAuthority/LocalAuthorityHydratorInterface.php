<?php
namespace AppBundle\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;

interface LocalAuthorityHydratorInterface
{
    /**
     * Hydrate a LocalAuthorityInterface
     *
     * @param mixed $data
     * @param LocalAuthorityInterface $localAuthority
     * @return LocalAuthorityInterface
     */
    public function hydrate($data, LocalAuthorityInterface $localAuthority): LocalAuthorityInterface;
}
