<?php

namespace Aegisora\Rules;

use Aegisora\RuleContract\Models\Context;
use Aegisora\RuleContract\Models\Result;
use Aegisora\RuleContract\Rule;

class IsArrayRule extends Rule
{
    public static function create(): self
    {
        return new self();
    }

    protected function executeValidate(Context $context): Result
    {
        return is_array($context->getValue()) ? $this->getDefaultValidResult() : $this->getDefaultInvalidResult();
    }
}
