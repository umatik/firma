<?php
declare(strict_types = 1);

namespace App\Settings\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class CompanyDetailsResponder extends BaseResponder
{
    const PAGE_NAME = 'Ustawienia';
    const DESCRIPTION = 'Dane firmy';

    public function __invoke(array $data = []): Response
    {
        return new Response($this->twig->render('Settings/company_details.twig', [
            'menu' => $data['menuService']->render(),
            'pageName' => self::PAGE_NAME,
            'description' => self::DESCRIPTION,
            'form' => $data['form']->createView()
        ]));
    }
}
