<?php
declare(strict_types = 1);

namespace App\Common\Responder;

use Symfony\Component\HttpFoundation\Response;

abstract class BaseResponder
{
    abstract public function __invoke(array $data = []): Response;
}
