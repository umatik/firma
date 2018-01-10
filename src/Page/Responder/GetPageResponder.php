<?php
declare(strict_types = 1);

namespace App\Page\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class GetPageResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Page/get_page.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName'],
            'page' => $data['page']
        ]));
    }
}
