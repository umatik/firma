<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Contractor\Domain\Entity\Contractor;
use App\Contractor\Domain\Form\ContractorType;
use App\Contractor\Domain\Model\ContractorFactory;
use App\Contractor\Responder\AddContractorResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddContractorAction extends BaseAction
{
    const SUCCESSFUL_CONTRACTOR_ADD_MESSAGE = 'Pomyślnie dodano kontrahenta.';

    public function __invoke(
        AddContractorResponder $responder,
        MenuService $menuService,
        Request $request,
        ContractorFactory $contractorFactory,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService
    ): Response {
        $contractor = new Contractor();
        $form = $this->createForm(ContractorType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractorFactory->create()->save($contractor);

            $this->addFlash('info', self::SUCCESSFUL_CONTRACTOR_ADD_MESSAGE);

            return $this->redirectToRoute('app_contractor_get', [
                'contractorId' => $contractor->getId()
            ]);
        }

        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'form' => $form,
            'breadcrumb' => $breadcrumbService->render($route)
        ]);
    }
}
