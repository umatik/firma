<?php
declare(strict_types = 1);

namespace App\Invoice\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListInvoicesResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Invoice/list_invoices.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'invoices' => $data['invoices']
        ]));
    }
}
