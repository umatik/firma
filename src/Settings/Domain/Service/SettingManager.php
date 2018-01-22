<?php
declare(strict_types = 1);

namespace App\Settings\Domain\Service;

use App\Settings\Domain\Dictionary\Setting;
use App\Settings\Domain\Repository\SettingRepository;

final class SettingManager
{
    private $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getSetting(string $key): ?string
    {
        if (!defined(Setting::class . '::' . $key)) {
            throw new \OutOfBoundsException();
        }

        return $this->settingRepository
            ->findOneBy([
                'key' => $key
            ])
            ->getValue();
    }

    public function getSettings(array $settings): array
    {
        $response = [];
        foreach ($settings as $setting) {
            $response[$setting] = $this->getSetting($setting);
        }

        return $response;
    }
}
