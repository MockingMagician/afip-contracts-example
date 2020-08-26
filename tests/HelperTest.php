<?php


use Afip\NumberGame\Helper;
use PHPUnit\Framework\TestCase;

/**
 * @property Helper helper
 */
class HelperTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->helper = new Helper();
    }

    public function provideDataForRandomGenerator()
    {
        return [
            [0, 100],
            [10, 10],
            [100, 150],
            [-100, 100],
        ];
    }

    /**
     * @dataProvider provideDataForRandomGenerator
     * @param $min
     * @param $max
     * @throws Exception
     */
    public function testGetRandomNumberBetween($min, $max)
    {
        self::assertGreaterThanOrEqual($min, $this->helper->getRandomNumberBetween($min, $max));
        self::assertLessThanOrEqual($max, $this->helper->getRandomNumberBetween($min, $max));
    }

    public function provideDataForOutput()
    {
        return [
            ['that'],
            ['an other output'],
        ];
    }

    /**
     * @dataProvider provideDataForOutput
     * @param $toOutput
     */
    public function testOutput($toOutput)
    {
        $this->expectOutputString($toOutput);
        $this->helper->output($toOutput);
    }
}
