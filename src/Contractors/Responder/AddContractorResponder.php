<?php
declare(strict_types = 1);

namespace App\Contractors\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class AddContractorResponder extends BaseResponder
{
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Contractors/add_contractor.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => $data['pageName']
        ]));
    }
}
