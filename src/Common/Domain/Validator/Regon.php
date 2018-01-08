<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;

final class Regon extends Constraint
{
    public $message = 'invalid.regon_number';
}
