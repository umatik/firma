<?php
declare(strict_types = 1);

namespace App\Invoice\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Invoice\Domain\Model\InvoiceModel;
use App\Invoice\Responder\ListInvoicesResponder;
use Symfony\Component\HttpFoundation\Request;

final class ListInvoicesAction extends BaseAction
{
    const PAGE_NAME = 'Faktury';

    public function __invoke(
        ListInvoicesResponder $responder,
        MenuService $menuService,
        InvoiceModel $model,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService,
        Request $request
    ) {
        $invoices = $model->listInvoices();

        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'invoices' => $invoices,
            'breadcrumb' => $breadcrumbService->render($route)
        ]);
    }
}
