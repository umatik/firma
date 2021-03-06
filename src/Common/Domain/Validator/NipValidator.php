<?php
declare(strict_types = 1);

namespace App\Common\Domain\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class NipValidator extends ConstraintValidator
{
    const NIP_LENGTH = 10;

    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            return;
        }

        $nip = preg_replace('/[ -]/im', '', $value);
        $length = strlen($nip);

        if ($length !== self::NIP_LENGTH) {
            $this->context->addViolation(
                $constraint->message,
                ['%string%' => $value]
            );

            return;
        }
    }
}
