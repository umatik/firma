<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Exception\NotFoundException;
use App\Contractor\Domain\Model\ContractorFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DeleteContractorAction extends BaseAction
{
    const SUCCESSFUL_REMOVED_CONTRACTOR = 'Pomyślnie usunięto kontrahenta: %s.';

    public function __invoke(ContractorFactory $contractorFactory, int $contractorId): Response
    {
        $contractorModel = $contractorFactory->create();
        try {
            $contractor = $contractorModel->getById($contractorId);
        } catch (NotFoundException $e) {
            throw new NotFoundHttpException();
        }

        $contractorModel->delete($contractor);

        $this->addFlash('info', sprintf(self::SUCCESSFUL_REMOVED_CONTRACTOR, $contractor->getName()));

        return $this->redirectToRoute('app_contractor_list');
    }
}
