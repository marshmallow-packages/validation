<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class Bic extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^[A-Za-z]{4} ?[A-Za-z]{2} ?[A-Za-z0-9]{2} ?([A-Za-z0-9]{3})?$/";
    }
}
