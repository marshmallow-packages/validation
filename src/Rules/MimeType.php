<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Rules;

use Marshmallow\Validation\AbstractRegexRule;

class MimeType extends AbstractRegexRule
{
    protected function pattern(): string
    {
        return "/^(multipart|application|audio|image|message|text|video|font|example|model)\/([-+.\w]+)$/i";
    }
}
