<?php
declare(strict_types = 1);

namespace App\Product\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class AddProductResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response(
            $this->twig->render('Product/add_product.twig', [
                'menu' => $data['menuService']->render(),
                'pageName' => $data['pageName'],
                'form' => $data['form']->createView(),
                'breadcrumb' => $data['breadcrumb']
            ]
        ));
    }
}
