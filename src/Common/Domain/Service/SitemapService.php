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
        [
            'name' => 'Ustawienia',
            'path' => '',
            'icon' => 'fa-wrench',
            'subtree' => [
                [
                    'name' => 'Dane firmy',
                    'path' => 'app_settings_company_details',
                    'icon' => '',
                ],
                [
                    'name' => 'Konta bankowe',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Osoby wystawiające',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Jednostki miary',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Metody płatności',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Szablony numeracji',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Poczta',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Ustawienia wydruku',
                    'path' => '',
                    'icon' => ''
                ],
                [
                    'name' => 'Zaawansowane',
                    'path' => '',
                    'icon' => ''
                ],
            ]
        ],
    ];

    public function getSitemap(): array
    {
        return $this->sitemap;
    }
}
