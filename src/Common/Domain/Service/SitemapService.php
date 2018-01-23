<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

final class SitemapService
{
    private $sitemap = [
        [
            'name' => 'Dashboard',
            'path' => 'app_dashboard',
            'icon' => 'fa-dashboard',
            'subtree' => [],
        ],
        [
            'name' => 'Kontrahenci',
            'path' => 'app_contractor_list',
            'icon' => 'fa-group',
            'subtree' => [],
        ],
        [
            'name' => 'Produkty',
            'path' => 'app_product_list',
            'icon' => 'fa-briefcase',
            'subtree' => [],
        ],
        [
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
        ],
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






    private function x(){

        $test = [
            'Kontrahenci' => [
                'lista' => [
                    'name' => 'Lista kontrahentów',
                    'path' => 'app_contractor_list',
                    'icon' => 'fa-group',
                    'subtree' => [],
                    ],
                'nowy' => [
                    'name' => 'Nowy kontrahent',
                    'path' => 'app_contractor_list',
                    'icon' => 'fa-group',
                    'subtree' => [],
                    ],
                'edycja' => [
                    'name' => 'Edycja kontrahenta',
                    'path' => 'app_contractor_list',
                    'icon' => 'fa-group',
                    'subtree' => [],
                    ],
                ]
            ];
    }










}
