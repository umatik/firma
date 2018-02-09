<?php
declare(strict_types = 1);

namespace App\Invoice\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Invoice\Responder\AddInvoiceResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AddInvoiceAction extends BaseAction
{
    const PAGE_NAME = 'Dodaj nową fakturę';

    public function __invoke(
        AddInvoiceResponder $responder,
        MenuService $menuService,
        Request $request,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService
    ): Response {
        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'breadcrumb' => $breadcrumbService->render($route)
        ]);
    }
}
