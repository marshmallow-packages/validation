<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRule;

class Htmlclean extends AbstractRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param mixed $value
     * @return bool
     */
    public function isValid(mixed $value): bool
    {
        return (strip_tags($value) == $value);
    }
}
