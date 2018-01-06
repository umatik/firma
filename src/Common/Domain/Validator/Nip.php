<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;

final class Nip extends Constraint
{
    public $message = 'invalid.nip_number';
}
