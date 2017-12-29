<?php
declare(strict_types = 1);

namespace App\Dashboard\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use Symfony\Component\HttpFoundation\Response;

final class DashboardAction extends BaseAction
{
    public function __invoke(MenuService $menuService): Response
    {
        return $this->render('Dashboard/dashboard.twig', [
            'menu' => $menuService->render()
        ]);
    }
}
