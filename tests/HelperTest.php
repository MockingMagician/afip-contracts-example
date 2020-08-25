<?php


use Afip\NumberGame\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{

    /**
     * @var Helper
     */
    private $helper;

    public function setUp(){
        parent::setUp();
        $this->helper = new Helper();
    }

    public function testRandomIntGiveAValueBetweenMinAndMax()
    {
        $nb = $this->helper->getRandomNumberBetween(0,100);
        self::assertLessThanOrEqual(100, $nb);
        self::assertGreaterThanOrEqual(0, $nb);
    }

    public function testRandomIntGiveAValueBetweenMinAndMaxWithInversedValue()
    {
        $nb = $this->helper->getRandomNumberBetween(100, 0);
        self::assertLessThanOrEqual(100, $nb);
        self::assertGreaterThanOrEqual(0, $nb);
    }

}
