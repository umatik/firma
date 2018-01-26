<?php
declare(strict_types = 1);

namespace App\Contractor\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListContractorsResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Contractors/list_contractors.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'contractors' => $data['contractors'],
            'breadcrumbData' => $data['breadcrumbData']
        ]));
    }
}
