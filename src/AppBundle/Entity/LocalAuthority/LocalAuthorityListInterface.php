<?php
namespace AppBundle\Entity\LocalAuthority;

interface LocalAuthorityListInterface
{
    /**
     * Add a LocalAuthorityInterface
     * @param LocalAuthorityInterface $localAuthority
     * @return LocalAuthorityListInterface
     */
    public function add(LocalAuthorityInterface $localAuthority): LocalAuthorityListInterface;
}
