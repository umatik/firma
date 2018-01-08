<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class RegonValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        // TODO: Implement validate() method.
    }
}
