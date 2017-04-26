<?php
namespace AppBundle\Mapper\LocalAuthority;

use AppBundle\Http\Request\GetRequest;
use AppBundle\Entity\LocalAuthority\LocalAuthorityList;
use AppBundle\Entity\LocalAuthority\LocalAuthorityListInterface;
use AppBundle\Hydrator\LocalAuthority\LocalAuthorityListHydratorInterface;

class LocalAuthorityMapper implements LocalAuthorityMapperInterface
{
    /** @var LocalAuthorityListHydratorInterface */
    private $localAuthorityListHydrator;

    /**
     * @param LocalAuthorityListHydratorInterface $localAuthorityListHydrator
     */
    public function __construct(LocalAuthorityListHydratorInterface $localAuthorityListHydrator)
    {
        $this->localAuthorityListHydrator = $localAuthorityListHydrator;
    }

    /**
     * {@inheritDoc}
     */
    public function get(): LocalAuthorityListInterface
    {
        $endpoint = 'http://api.ratings.food.gov.uk/Authorities/basic';

        $headers = ['x-api-version' => 2];

        $request = new GetRequest($endpoint, $headers);

        $content = $request->executeAndDecode();

        return $this->localAuthorityListHydrator->hydrate($content, new LocalAuthorityList());
    }
}
