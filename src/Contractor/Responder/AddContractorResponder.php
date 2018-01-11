<?php
declare(strict_types = 1);

namespace App\Contractor\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class AddContractorResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Contractors/add_contractor.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'form' => $data['form']->createView()
        ]));
    }
}
