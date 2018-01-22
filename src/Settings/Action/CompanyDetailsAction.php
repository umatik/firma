<?php
declare(strict_types = 1);

namespace App\Settings\Action;

use App\Common\Action\BaseAction;
use App\Common\Domain\Service\MenuService;
use App\Settings\Domain\Dictionary\Setting;
use App\Settings\Domain\Form\CompanyDetailsType;
use App\Settings\Domain\Service\SettingManager;
use App\Settings\Responder\CompanyDetailsResponder;
use Symfony\Component\HttpFoundation\Response;

final class CompanyDetailsAction extends BaseAction
{
    public function __invoke(
        CompanyDetailsResponder $responder,
        MenuService $menuService,
        SettingManager $settingManager
    ): Response {
        $form = $this->createForm(CompanyDetailsType::class);

        $settingManager->getSetting(Setting::KEY_COMPANY_DETAILS_NAME);

        return $responder([
            'menuService' => $menuService,
            'form' => $form
        ]);
    }
}
