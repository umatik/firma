<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;

final class PostalCode extends Constraint
{
    public $message = 'This value %string% is not a valid postal code.';
}
