<?php
namespace AppBundle\Mapper\Establishment;

use AppBundle\Http\Request\GetRequest;
use AppBundle\Entity\Establishment\EstablishmentList;
use AppBundle\Entity\Establishment\EstablishmentListInterface;
use AppBundle\Hydrator\Establishment\EstablishmentListHydratorInterface;

class EstablishmentMapper implements EstablishmentMapperInterface
{
    /** @var EstablishmentListHydratorInterface */
    private $EstablishmentListHydrator;

    /**
     * @param EstablishmentListHydratorInterface $EstablishmentListHydrator
     */
    public function __construct(EstablishmentListHydratorInterface $EstablishmentListHydrator)
    {
        $this->EstablishmentListHydrator = $EstablishmentListHydrator;
    }

    /**
     * {@inheritDoc}
     */
    public function getBy(EstablishmentQuery $query): EstablishmentListInterface
    {
        $endpoint = 'http://api.ratings.food.gov.uk/Establishments?pageSize=0&localAuthorityId='
            . $query->getLocalAuthorityId();

        $headers = ['x-api-version' => 2];

        $request = new GetRequest($endpoint, $headers);

        $content = $request->executeAndDecode();

        return $this->EstablishmentListHydrator->hydrate($content, new EstablishmentList());
    }
}
