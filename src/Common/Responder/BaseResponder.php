<?php
declare(strict_types = 1);

namespace App\Common\Responder;

use Symfony\Component\HttpFoundation\Response;

abstract class BaseResponder
{
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    abstract public function __invoke(array $data = []): Response;
}
