<?php
namespace AppBundle\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;

interface LocalAuthorityListHydratorInterface
{
    /**
     * Hydrate a LocalAuthorityListInterface
     *
     * @param $data
     * @param LocalAuthorityListInterface $list
     * @return LocalAuthorityListInterface
     */
    public function hydrate($data, LocalAuthorityListInterface $list): LocalAuthorityListInterface;
}
