<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class Snakecase extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^(?:\p{Ll}+_)*\p{Ll}+$/u";
    }
}
