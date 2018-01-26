<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

final class SitemapService
{
    private $sitemap = [
        'dashboard' => [
            'name' => 'Dashboard',
            'path' => 'app_dashboard',
            'icon' => 'fa-dashboard',
            'parent' => '',
            'isMenuItem' => true,
            'subtree' => [],
        ],
        'contractor_list' => [
            'name' => 'Kontrahenci',
            'path' => 'app_contractor_list',
            'icon' => 'fa-group',
            'parent' => '',
            'isMenuItem' => true,
            'subtree' => [],
        ],
        'contractor_add' => [
            'name' => 'Nowy kontrahent',
            'path' => 'app_contractor_add',
            'icon' => '',
            'parent' => 'contractor_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'contractor_get' => [
            'name' => 'Dane kontrahenta',
            'path' => 'app_contractor_get',
            'icon' => '',
            'parent' => 'contractor_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'product_list' => [
            'name' => 'Produkty',
            'path' => 'app_product_list',
            'icon' => 'fa-briefcase',
            'parent' => '',
            'isMenuItem' => true,
            'subtree' => [],
        ],
        'product_add' => [
            'name' => 'Produkty',
            'path' => 'app_product_add',
            'icon' => '',
            'parent' => 'product_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'product_get' => [
            'name' => 'Produkty',
            'path' => 'app_product_get',
            'icon' => '',
            'parent' => 'product_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'raport' => [
            'name' => 'Raporty',
            'path' => '',
            'icon' => 'fa-database',
            'parent' => '',
            'isMenuItem' => true,
            'subtree' => [
                [
                    'name' => 'JPK',
                    'path' => 'app_raport_b',
                    'icon' => 'a',
                    'parent' => 'raport',
                ],
                [
                    'name' => 'ALAMAKOTA',
                    'path' => 'app_raport_a',
                    'icon' => '',
                    'parent' => 'raport',
                ]
            ],
        ],
    ];

    public function getSitemap(): array
    {
        return $this->sitemap;
    }

    public function getBreadcrumbMap($path)
    {
        $sitemap = $this->getSitemap();
        $menuItem = [];

        foreach ($sitemap as $key => $item) {
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

        $breadcrumb = [$sitemap['dashboard']];

        if ($menuItem['parent']) {
            $breadcrumb[] = $sitemap[$menuItem['parent']];
        }

        $breadcrumb[] = $menuItem;

        return $breadcrumb;
    }

    public function getMenumap(): array
    {
        $map = [];
        $sitemap = $this->getSitemap();

        foreach ($sitemap as $key => $item) {
            if ($item['isMenuItem']) {
                $map[] = $item;
            }
        }

        return $map;
    }
}
