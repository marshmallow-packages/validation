<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class Camelcase extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^(?:\p{Lu}?\p{Ll}+)(?:\p{Lu}\p{Ll}+)*$/u";
    }
}
