<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Exception\NotFoundException;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Contractor\Domain\Form\ContractorType;
use App\Contractor\Domain\Model\ContractorFactory;
use App\Contractor\Responder\GetContractorResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetContractorAction extends BaseAction
{
    const PAGE_NAME = 'Podgląd kontrahenta';
    const SUCCESSFUL_UPDATED_CONTRACTOR_MESSAGE = 'Pomyślnie zaktualizowano kontrahenta.';

    public function __invoke(
        GetContractorResponder $responder,
        MenuService $menuService,
        ContractorFactory $contractorFactory,
        Request $request,
        int $contractorId,
        SitemapService $sitemapService
    ): Response {
        $contractorModel = $contractorFactory->create();
        $siteMap = $sitemapService->getPagemap(1);

        try {
            $contractor = $contractorModel->getById($contractorId);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(ContractorType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractorModel->save($contractor);

            $this->addFlash('info', self::SUCCESSFUL_UPDATED_CONTRACTOR_MESSAGE);

            return $this->redirectToRoute('app_contractor_get', [
                'contractorId' => $contractor->getId()
            ]);
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form,
            'siteMap' => $siteMap
        ]);
    }
}
