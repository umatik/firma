<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class PostalCodeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            return;
        }

        if (!preg_match('/^[0-9]{2}-[0-9]{3}$/Du', $value)) {
            $this->context->addViolation(
                $constraint->message,
                ['%string%' => $value]
            );

            return;
        }
    }
}
