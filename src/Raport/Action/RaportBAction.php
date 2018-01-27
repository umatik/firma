<?php
declare(strict_types = 1);

namespace App\Raport\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\BreadcrumbService;
use App\Common\Domain\Service\MenuService;
use App\Common\Domain\Service\SitemapService;
use App\Raport\Responder\RaportResponder;
use Symfony\Component\HttpFoundation\Response;

final class RaportBAction extends BaseAction
{
    const PAGE_NAME = 'Raport';
    const PAGE_DESCRIPTION = 'Główny panel Twojej firmy';

    public function __invoke(
        RaportResponder $responder,
        MenuService $menuService,
        SitemapService $sitemapService,
        BreadcrumbService $breadcrumbService
    ): Response {
        $breadcumb = $breadcrumbService->render('app_raport_b');

        return $responder([
            'menuService' => $menuService,
            'pageName' => self::PAGE_NAME,
            'pageDescription' => self::PAGE_DESCRIPTION,
            'breadcrumb' => $breadcumb
        ]);
    }
}
