<?php
declare(strict_types = 1);

namespace App\Page\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Page\Domain\Model\PageModel;
use App\Page\Responder\GetPageResponder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class GetPageAction extends BaseAction
{
    const PAGE_NAME = 'Strona';

    public function __invoke(
        GetPageResponder $responder,
        MenuService $menuService,
        PageModel $pageModel,
        string $pageSlug
    ): Response {
        $page = $pageModel->getPage($pageSlug);

        if (empty($page)) {
            throw new NotFoundHttpException();
        }

        return $responder([
            'menuService' => $menuService,
            'pageName' => $page->getTitle(),
            'page' => $page
        ]);
    }
}
