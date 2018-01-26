<?php
declare(strict_types = 1);

namespace App\Dashboard\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class DashboardResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Dashboard/dashboard.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'pageDescription' => $data['pageDescription']
        ]));
    }
}
