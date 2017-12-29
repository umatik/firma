<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

use Symfony\Component\Routing\RouterInterface;

final class MenuService
{
    const SUBTREE_CLASS = 'treeview';

    private $twig;
    private $router;
    private $menuItems;

    public function __construct(
        \Twig_Environment $twig,
        SitemapService $sitemapService,
        RouterInterface $router
    ) {
        $this->twig = $twig;
        $this->menuItems = $sitemapService->getSitemap();
        $this->router = $router;
    }

    public function render(): string
    {
        $this->addMenuItemClasses();
        $this->generateUrls();

        return $this->twig->render('Common/Partials/menu_partial.twig', [
            'menuItems' => $this->menuItems
        ]);
    }

    private function addMenuItemClasses(): void
    {
        foreach ($this->menuItems as $index => $menuItem) {
            $class = '';

            if ($this->hasSubtree($menuItem)) {
                $class .= self::SUBTREE_CLASS . ' ';
            }

            $this->menuItems[$index]['class'] = $class;
        }
    }

    private function hasSubtree(array $menuItem)
    {
        return !empty($menuItem['subtree']);
    }

    private function generateUrls(): void
    {
        foreach ($this->menuItems as $index => $menuItem) {
            if (empty($menuItem['path'])) {
                $this->menuItems[$index]['url'] = '#';
            } else {
                $this->menuItems[$index]['url'] = $this->router->generate($menuItem['path']);
            }

            unset($this->menuItems[$index]['path']);
        }
    }
}
