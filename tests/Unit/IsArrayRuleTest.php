<?php

namespace Aegisora\Rules\Tests\Unit;

use Aegisora\Rules\IsArrayRule;
use PHPUnit\Framework\TestCase;

class IsArrayRuleTest extends TestCase
{
    private IsArrayRule $rule;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rule = new IsArrayRule();
    }
}
