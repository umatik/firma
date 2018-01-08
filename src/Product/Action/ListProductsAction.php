<?php
declare(strict_types = 1);

namespace App\Product\Action;

use App\Common\Action\BaseAction;
use App\Product\Responder\ListProductsResponder;
use Symfony\Component\HttpFoundation\Response;

final class ListProductsAction extends BaseAction
{
    public function __invoke(ListProductsResponder $responder): Response
    {
        return $responder();
    }
}
