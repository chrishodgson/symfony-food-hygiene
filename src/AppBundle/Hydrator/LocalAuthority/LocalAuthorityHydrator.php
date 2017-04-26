<?php
namespace AppBundle\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityInterface;
use AppBundle\Utils\PropValueTrait;

class LocalAuthorityHydrator implements LocalAuthorityHydratorInterface
{
    use PropValueTrait;

    /**
     * {@inheritdoc}
     */
    public function hydrate($data, LocalAuthorityInterface $localAuthority) : LocalAuthorityInterface
    {
        $localAuthorityId = $this->getPropValue($data, 'LocalAuthorityId');
        $name = $this->getPropValue($data, 'Name');

        if ($localAuthorityId) {
            $localAuthority->setLocalAuthorityId($localAuthorityId);
        }

        if ($name) {
            $localAuthority->setName($name);
        }

        return $localAuthority;
    }
}
