<?php
declare(strict_types = 1);

namespace App\Contractor\Action\Ajax;

use App\Common\Action\AbstractAjaxAction;
use App\Contractor\Domain\Model\ContractorFactory;
use App\Contractor\Responder\Ajax\ContractorListResponder;
use Symfony\Component\HttpFoundation\Response;

final class ContractorListAction extends AbstractAjaxAction
{
    public function __invoke(
        ContractorListResponder $responder,
        ContractorFactory $contractorFactory
    ): Response {
        return $responder([
            'contractors' => $contractorFactory->create()->list()
        ]);
    }
}
