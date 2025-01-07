<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class Slug extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^[a-z0-9]+(?:-[a-z0-9]+)*$/i";
    }
}
