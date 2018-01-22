<?php
declare(strict_types = 1);

namespace App\Settings\Domain\ValueObject;

final class CompanyDetails
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
