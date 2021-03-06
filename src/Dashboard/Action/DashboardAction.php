<?php
declare(strict_types = 1);

namespace App\Dashboard\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Dashboard\Responder\DashboardResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class DashboardAction extends BaseAction
{
    const PAGE_NAME = 'Dashboard';
    const PAGE_DESCRIPTION = 'Główny panel Twojej firmy';

    public function __invoke(
        DashboardResponder $responder,
        MenuService $menuService,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService,
        Request $request
    ): Response {
        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'pageDescription' => self::PAGE_DESCRIPTION,
            'breadcrumb' => $breadcrumbService->render('')
        ]);
    }
}
