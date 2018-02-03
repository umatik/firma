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
            'name' => 'Faktury',
            'path' => 'app_invoice_list',
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
}
