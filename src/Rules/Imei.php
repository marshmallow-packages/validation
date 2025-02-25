<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

class Imei extends Luhn
{
    /**
     * Determine if the validation rule passes.
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool
    {
        return $this->hasValidLength($value) && parent::isValid($value);
    }

    /**
     * Determine if current value has valid IMEI length
     *
     * @return bool
     */
    private function hasValidLength($value): bool
    {
        return strlen($value) === 15;
    }
}
