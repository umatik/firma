<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

final class SitemapService
{
    private $sitemap = [
        'Dashboard' => [
            'list' => [
                'name' => 'Dashboard',
                'path' => 'app_dashboard',
                'icon' => 'fa-dashboard',
                'subtree' => []
            ]
        ],
        'Kontrahenci' => [
            'list' => [
                'name' => 'Lista kontrahentów',
                'path' => 'app_contractor_list',
                'icon' => 'fa-group',
                'subtree' => []
            ],
            'add' => [
                'name' => 'Nowy kontrahent',
                'path' => 'app_contractor_add',
                'icon' => 'fa-group',
                'subtree' => []
            ],
            'get' => [
                'name' => 'Edycja danych kontrahenta',
                'path' => 'app_contractor_get',
                'icon' => 'fa-group',
                'subtree' => []
            ],
        ],
        'Produkty' => [
            'list' => [
                'name' => 'Lista produktów',
                'path' => 'app_product_list',
                'icon' => 'fa-briefcase',
                'subtree' => []
            ],
            'add' => [
                'name' => 'Nowy produkt',
                'path' => 'app_product_add',
                'icon' => 'fa-briefcase',
                'subtree' => []
            ],
            'get' => [
                'name' => 'Edycja danych produktu',
                'path' => 'app_product_get',
                'icon' => 'fa-briefcase',
                'subtree' => []
            ],
        ],
        'Raporty' => [
            'list' => [
                'name' => 'Raporty',
                'path' => '',
                'icon' => 'fa-database',
                'subtree' => [
                    [
                        'name' => 'JPK',
                        'path' => '',
                        'icon' => '',
                    ]
                ],
            ]
        ]
    ];

    public function getSitemap(): array
    {
        return $this->sitemap;
    }

    public function getPagemap($index): array
    {
        $map = $this->getSitemap();
        return $map[$index];
    }

    public function getMenumap(): array
    {
        $sitemap = $this->getSitemap();
        $map = [];

        foreach ($sitemap as $key => $value) {
            $map[] = [
                'name' => $key,
                'path' => $value['list']['path'],
                'icon' => $value['list']['icon'],
                'subtree' => $value['list']['subtree']
            ];
        }

        return $map;
    }
}
