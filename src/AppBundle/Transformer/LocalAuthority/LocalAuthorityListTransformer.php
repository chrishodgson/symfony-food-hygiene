<?php
namespace AppBundle\Transformer\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;

class LocalAuthorityListTransformer implements LocalAuthorityListTransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform(LocalAuthorityListInterface $list) : array
    {
        $transformedList = [];

        foreach ($list as $localAuthority) {
            $transformedList[$localAuthority->getName()] = $localAuthority->getLocalAuthorityId();
        }

        return $transformedList;
    }
}
