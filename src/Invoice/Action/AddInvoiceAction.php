<?php
declare(strict_types = 1);

namespace App\Invoice\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Invoice\Responder\AddInvoiceResponder;
use Symfony\Component\HttpFoundation\Response;

final class AddInvoiceAction extends BaseAction
{
    const PAGE_NAME = 'Dodaj nową fakturę';

    public function __invoke(
        AddInvoiceResponder $responder,
        MenuService $menuService
    ): Response {

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
        ]);
    }
}
