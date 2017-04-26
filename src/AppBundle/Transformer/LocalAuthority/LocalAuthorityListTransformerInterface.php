<?php
namespace AppBundle\Transformer\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;

interface LocalAuthorityListTransformerInterface
{
    /**
     * Transforms $list into template data
     *
     * @param LocalAuthorityListInterface $list
     * @return array
     */
    public function transform(LocalAuthorityListInterface $list) : array;
}
