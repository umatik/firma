<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractor\Domain\Model\ContractorModel;
use App\Contractor\Responder\ListContractorsResponder;

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
