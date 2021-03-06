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
            'name' => 'Nowy produkt',
            'path' => 'app_product_add',
            'icon' => '',
            'parent' => 'product_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'product_get' => [
            'name' => 'Dane produktu',
            'path' => 'app_product_get',
            'icon' => '',
            'parent' => 'product_list',
            'isMenuItem' => false,
            'subtree' => [],
        ],
        'invoice_list' => [
            'name' => 'Faktury',
            'path' => 'app_invoice_list',
            'icon' => 'fa-briefcase',
            'isMenuItem' => true,
            'parent' => '',
            'subtree' => [],
        ],
        'invoice_add' => [
            'name' => 'Nowa faktura',
            'path' => 'app_invoice_add',
            'icon' => '',
            'isMenuItem' => false,
            'parent' => 'invoice_list',
            'subtree' => [],
        ],
        'invoice_get' => [
            'name' => 'Dane faktury',
            'path' => 'app_invoice_get',
            'icon' => '',
            'isMenuItem' => false,
            'parent' => 'invoice_list',
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
                    'path' => '',
                    'icon' => 'a',
                    'parent' => 'raport',
                ],
                [
                    'name' => 'ALAMAKOTA',
                    'path' => '',
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

    public function getSiteItem($path): array
    {
        $sitemap = $this->getSitemap();
        $item = [];

        if ($path) {
            foreach ($sitemap as $key => $value) {
                if ($this->hasSubtree($value['subtree'])) {
                    $item = $this->getSubtree($value['subtree'], $path);
                } elseif ($value['path'] == $path) {
                    $item = $value;
                }
            }
        }

        return $item;
    }

    private function hasSubtree(array $menuItem)
    {
        return !empty($menuItem['subtree']);
    }

    private function getSubtree(array $subtree, $path): array
    {
        $menuItem = [];

        foreach ($subtree as $value) {
            if ($value['path'] == $path) {
                $menuItem = $value;
            }
        }

        return $menuItem;
    }
}
