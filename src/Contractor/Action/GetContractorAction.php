<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractor\Domain\Form\ContractorType;
use App\Contractor\Domain\Model\ContractorModel;
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
        ContractorModel $contractorModel,
        Request $request,
        int $contractorId
    ): Response {
        $contractor = $contractorModel->getContractor($contractorId);

        if (empty($contractor)) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(ContractorType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contractorModel->saveContractor($contractor);

            $this->addFlash('info', self::SUCCESSFUL_UPDATED_CONTRACTOR_MESSAGE);

            return $this->redirectToRoute('app_contractor_get', [
                'contractorId' => $contractor->getId()
            ]);
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form
        ]);
    }
}
