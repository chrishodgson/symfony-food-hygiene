<?php
namespace AppBundle\Entity\LocalAuthority;

use AppBundle\Entity\BaseList;

class LocalAuthorityList extends BaseList implements LocalAuthorityListInterface
{
    /**
     * {@inheritdoc}
     */
    protected function getAllowedType(): string
    {
        return LocalAuthorityInterface::class;
    }

    /**
     * @param LocalAuthorityInterface $localAuthority
     * @return LocalAuthorityListInterface
     */
    public function add(LocalAuthorityInterface $localAuthority): LocalAuthorityListInterface
    {
        $this->append($localAuthority);

        return $this;
    }
}
