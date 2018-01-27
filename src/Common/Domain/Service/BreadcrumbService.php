<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

final class BreadcrumbService
{
    private $twig;
    private $sitemap;
    private $breadcrumb;

    public function __construct(
        \Twig_Environment $twig,
        SitemapService $sitemapService
    ) {
        $this->twig = $twig;
        $this->sitemap = $sitemapService->getSitemap();
        $this->breadcrumb = [];
    }

    public function render($path): string
    {
        $this->getBreadcrumbMap($path);
        return $this->twig->render('Common/Partials/breadcrumb_partial.twig', [
            'breadcrumbData' => $this->breadcrumb
        ]);
    }

    public function getBreadcrumbMap($path = null)
    {
        $menuItem = [];

        if ($path) {
            foreach ($this->sitemap as $key => $item) {
                if ($item['path'] == $path) {
                    $menuItem = $item;
                } else {
                    foreach ($item['subtree'] as $value) {
                        if ($value['path'] == $path) {
                            $menuItem = $value;
                        }
                    }
                }
            }
        }

        $this->breadcrumb = [$this->sitemap['dashboard']];

        if ($menuItem) {
            if ($menuItem['parent']) {
                $this->breadcrumb[] = $this->sitemap[$menuItem['parent']];
            }

            $this->breadcrumb[] = $menuItem;
        }
    }
}
