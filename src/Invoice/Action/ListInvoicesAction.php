<?php
declare(strict_types = 1);

namespace App\Invoice\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Invoice\Domain\Model\InvoiceModel;
use App\Invoice\Responder\ListInvoicesResponder;

final class ListInvoicesAction extends BaseAction
{
    const PAGE_NAME = 'Faktury';

    public function __invoke(
        ListInvoicesResponder $responder,
        MenuService $menuService,
        InvoiceModel $model
    ) {
        $invoices = $model->listInvoices();

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'invoices' => $invoices
        ]);
    }
}
