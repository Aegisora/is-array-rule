<?php

namespace Aegisora\Rules\Tests\Unit;

use Aegisora\RuleContract\Models\Context;
use Aegisora\RuleContract\Models\Result;
use Aegisora\RuleContract\RuleInterface;
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

    public function testCreate(): void
    {
        self::assertInstanceOf(RuleInterface::class, IsArrayRule::create());
    }

    /**
     * @dataProvider getTestValidateProvidedData
     */
    public function testValidate(
        Context $context,
        array $expectedResult
    ): void {
        self::assertActualResultEqualsExpected(
            $this->rule->validate($context),
            $expectedResult
        );
    }

    public static function getTestValidateProvidedData(): array
    {
        return [
            'context value - empty array' => [
                'context' => Context::create([]),
                'expectedResult' => [
                    'isValid' => true,
                    'failedRuleCode' => null,
                ],
            ],
            'context value - not empty array' => [
                'context' => Context::create([1,]),
                'expectedResult' => [
                    'isValid' => true,
                    'failedRuleCode' => null,
                ],
            ],
        ];
    }

    private static function assertActualResultEqualsExpected(
        Result $result,
        array $expectedResult
    ): void {
        self::assertEquals($expectedResult['isValid'], $result->isValid());
        self::assertEquals($expectedResult['failedRuleCode'], $result->getFailedRuleCode());
    }
}
