<?php
namespace AppBundle\Controller;

use AppBundle\Form\LocalAuthority\LocalAuthoritySearchForm;
use AppBundle\Mapper\Establishment\EstablishmentQuery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FoodHygieneController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $localAuthorities = $this->getTransformedLocalAuthorityList();

        $searchForm = $this->createForm(LocalAuthoritySearchForm::class, null, [
            'localAuthorityChoices' => $localAuthorities
        ]);

        $searchFormValues = $request->request->get('appbundle_local_authority_search');

        $localAuthorityId = $searchFormValues['local_authority_id'] ?? null;

        if ($localAuthorityId) {
            $searchForm->get('local_authority_id')->setData($localAuthorityId);

            $summary = $this->getTransformedEstablishmentList($localAuthorityId);
        }

        return $this->render('food-hygene/index.html.twig', [
            'summary' => $summary ?? [],
            'local_authorities' => $localAuthorities,
            'search_form' => $searchForm->createView(),
        ]);
    }

    /**
     * @return array
     */
    private function getTransformedLocalAuthorityList(): array
    {
        $mapper = $this->get('app.food_hygene.local_authority_mapper');

        $transformer = $this->get('app.food_hygene.local_authority_list_transformer');

        $localAuthorities = $mapper->get();

        return $transformer->transform($localAuthorities);
    }

    /**
     * @param int $localAuthorityId
     * @return \AppBundle\Entity\Establishment\EstablishmentListInterface|null
     */
    private function getTransformedEstablishmentList(int $localAuthorityId)
    {
        $mapper = $this->get('app.food_hygene.establishment_mapper');

        $transformer = $this->get('app.food_hygene.establishment_list_transformer');

        $establishmentQuery = (new EstablishmentQuery)->setLocalAuthorityId($localAuthorityId);

        $establishments = $mapper->getBy($establishmentQuery);

        return $transformer->transform($establishments);
    }

}
