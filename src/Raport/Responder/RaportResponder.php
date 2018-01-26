<?php
declare(strict_types = 1);

namespace App\Raport\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class RaportResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Raport/raport.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'pageDescription' => $data['pageDescription'],
            'breadcrumbData' => $data['breadcrumbData']
        ]));
    }
}
