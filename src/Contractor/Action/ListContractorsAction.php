<?php
declare(strict_types = 1);

namespace App\Contractor\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Contractor\Domain\Model\ContractorFactory;
use App\Contractor\Responder\ListContractorsResponder;
use Symfony\Component\HttpFoundation\Request;

final class ListContractorsAction extends BaseAction
{
    public function __invoke(
        ListContractorsResponder $responder,
        MenuService $menuService,
        ContractorFactory $contractorFactory,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService,
        Request $request
    ) {
        $contractors = $contractorFactory->create()->list();
        $route = $request->get('_route');
        $siteItem = $sitemapService->getSiteItem($route);

        return $responder([
            'menuService' => $menuService,
            'pageName' => $siteItem['name'],
            'contractors' => $contractors,
            'breadcrumb' => $breadcrumbService->render($route)
        ]);
    }
}
