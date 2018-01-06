<?php
declare(strict_types = 1);

namespace App\Contractors\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractors\Domain\Model\ContractorModel;
use App\Contractors\Responder\ListContractorsResponder;

final class ListContractorsAction extends BaseAction
{
    const PAGE_NAME = 'Kontrahenci';

    public function __invoke(
        ListContractorsResponder $responder,
        MenuService $menuService,
        ContractorModel $contractorModel
    ) {
        $contractors = $contractorModel->listContractors();

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'contractors' => $contractors
        ]);
    }
}
