<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class Semver extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^(0|[1-9]\d*)\.(0|[1-9]\d*)\.(0|[1-9]\d*)" .
            "(?:-((?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)" .
            "(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?" .
            "(?:\+([0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/";
    }
}
