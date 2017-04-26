<?php
namespace AppBundle\Hydrator\LocalAuthority;

use AppBundle\Entity\LocalAuthority\LocalAuthority;
use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;
use AppBundle\Utils\PropValueTrait;

class LocalAuthorityListHydrator implements LocalAuthorityListHydratorInterface
{
    use PropValueTrait;

    /** @var LocalAuthorityHydratorInterface */
    private $localAuthorityHydrator;

    /**
     * @param LocalAuthorityHydratorInterface $localAuthorityHydrator
     */
    public function __construct(LocalAuthorityHydratorInterface $localAuthorityHydrator)
    {
        $this->localAuthorityHydrator = $localAuthorityHydrator;
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate($data, LocalAuthorityListInterface $list): LocalAuthorityListInterface
    {
        $localAuthoritiesData = $this->getPropValue($data, 'authorities');

        if ($localAuthoritiesData) {
            foreach ($localAuthoritiesData as $localAuthorityData) {
                $localAuthority = $this->localAuthorityHydrator->hydrate($localAuthorityData, new LocalAuthority());
                $list->add($localAuthority);
            }
        }

        return $list;
    }
}
