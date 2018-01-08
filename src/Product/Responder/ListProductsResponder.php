<?php
declare(strict_types = 1);

namespace App\Product\Responder;

use App\Common\Responder\BaseResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListProductsResponder extends BaseResponder
{
    public function __invoke(array $data = []): Response
    {
        return new Response();
    }
}
