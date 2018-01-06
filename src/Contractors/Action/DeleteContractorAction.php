<?php
declare(strict_types = 1);

namespace App\Contractors\Action;

use App\Common\Action\BaseAction;
use App\Contractors\Domain\Model\ContractorModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DeleteContractorAction extends BaseAction
{
    const SUCCESSFUL_REMOVED_CONTRACTOR = 'Pomyślnie usunięto kontrahenta: %s.';

    public function __invoke(ContractorModel $contractorModel, int $contractorId): Response
    {
        $contractor = $contractorModel->getContractor($contractorId);

        if (empty($contractor)) {
            throw new NotFoundHttpException();
        }

        $contractorModel->deleteContractor($contractor);

        $this->addFlash('info', sprintf(self::SUCCESSFUL_REMOVED_CONTRACTOR, $contractor->getName()));

        return $this->redirectToRoute('app_list_contractors');
    }
}
