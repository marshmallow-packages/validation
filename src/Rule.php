<?php

declare(strict_types=1);

namespace Marshmallow\Validation;

interface Rule
{
    /**
     * Checks if the given value is valid in the scope of the current rule
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool;
}
