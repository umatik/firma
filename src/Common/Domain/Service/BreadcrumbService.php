<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

final class BreadcrumbService
{
    private $twig;
    private $sitemap;

    public function __construct(
        \Twig_Environment $twig,
        SitemapService $sitemapService
    ) {
        $this->twig = $twig;
        $this->sitemapService = $sitemapService;
        $this->sitemap = $sitemapService->getSitemap();
    }

    public function render($path): string
    {
        return $this->twig->render('Common/Partials/breadcrumb_partial.twig', [
            'breadcrumbData' => $this->getBreadcrumbMap($path)
        ]);
    }

    public function getBreadcrumbMap($path = null): array
    {
        $menuItem = [];

        if ($path) {
            $menuItem = $this->sitemapService->getSiteItem($path);
        }

        $breadcrumb = [$this->sitemap['dashboard']];

        if ($menuItem) {
            if ($menuItem['parent']) {
                $breadcrumb[] = $this->sitemap[$menuItem['parent']];
            }

            $breadcrumb[] = $menuItem;
        }

        return $breadcrumb;
    }
}
