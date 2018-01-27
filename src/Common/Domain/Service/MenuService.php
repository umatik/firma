<?php
declare(strict_types = 1);

namespace App\Common\Domain\Service;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RequestStack;

final class MenuService
{
    const SUBTREE_CLASS = 'treeview';

    private $twig;
    private $router;
    private $menuItems;
    protected $requestStack;

    public function __construct(
        \Twig_Environment $twig,
        SitemapService $sitemapService,
        RouterInterface $router,
        RequestStack $requestStack
    ) {
        $this->twig = $twig;
        $this->menuItems = $sitemapService->getMenumap();
        $this->router = $router;
        $this->requestStack = $requestStack;
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
        $request = $this->requestStack->getCurrentRequest();
        $path = $request->get('_route');

        foreach ($this->menuItems as $index => $menuItem) {
            $url = empty($menuItem['path']) ? '#' : $this->router->generate($menuItem['path']);
            $this->menuItems[$index]['url'] = $url;

            $activeMenu = $path == $menuItem['path'] ? 'active' : '';
            $this->menuItems[$index]['active'] = $activeMenu;

            if ($this->hasSubtree($menuItem)) {
                foreach ($menuItem['subtree'] as $subIndex => $subItem) {
                    $url = empty($subItem['path']) ? '#' : $this->router->generate($subItem['path']);
                    $this->menuItems[$index]['subtree'][$subIndex]['url'] = $url;

                    if ($path == $subItem['path']) {
                        $this->menuItems[$index]['active'] = 'active';
                        $this->menuItems[$index]['subtree'][$subIndex]['subtreeActive'] = 'active';
                    } else {
                        $this->menuItems[$index]['subtree'][$subIndex]['subtreeActive'] = '';
                    }
                }
            }
        }
    }
}
