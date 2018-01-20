<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Contractor\Domain\Model\ContractorFactory;
use App\Contractor\Responder\ListContractorsResponder;

final class ListContractorsAction extends BaseAction
{
    const PAGE_NAME = 'Kontrahenci';

    public function __invoke(
        ListContractorsResponder $responder,
        MenuService $menuService,
        ContractorFactory $contractorFactory
    ) {
        $contractors = $contractorFactory->create()->list();

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'contractors' => $contractors
        ]);
    }
}
