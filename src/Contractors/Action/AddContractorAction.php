<?php
declare(strict_types = 1);

namespace App\Contractors\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractors\Domain\Entity\Contractor;
use App\Contractors\Domain\Form\ContractorType;
use App\Contractors\Domain\Model\ContractorModel;
use App\Contractors\Responder\AddContractorResponder;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddContractorAction extends BaseAction
{
    const PAGE_NAME = 'Dodaj kontrahenta';
    const SUCCESSFUL_CONTRACTOR_ADD_MESSAGE = 'Pomyślnie dodano kontrahenta.';

    public function __invoke(
        AddContractorResponder $responder,
        MenuService $menuService,
        Request $request,
        ContractorModel $contractorModel
    ): Response {
        $contractor = new Contractor();
        $form = $this->createForm(ContractorType::class, $contractor);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contractorModel->save($contractor);
            $this->addFlash('info', self::SUCCESSFUL_CONTRACTOR_ADD_MESSAGE);

            return $this->redirectToRoute('app_get_contractor', [
                'id' => $contractor->getId()
            ]);
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'form' => $form
        ]);
    }
}