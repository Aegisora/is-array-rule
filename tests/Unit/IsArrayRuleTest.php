<?php

namespace Aegisora\Rules\Tests\Unit;

use Aegisora\RuleContract\Models\Result;
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

    private static function assertActualResultEqualsExpected(
        Result $result,
        array $expectedResult
    ): void {
        self::assertEquals($expectedResult['isValid'], $result->isValid());
        self::assertEquals($expectedResult['failedRuleCode'], $result->getFailedRuleCode());
    }
}
