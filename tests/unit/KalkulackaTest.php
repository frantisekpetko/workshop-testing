<?php

use IW\Workshop\Calculator;

class KalkulackaTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->kalkulacka = new Calculator();

    }

    protected function _after()
    {
    }

    public function testScitani()
    {
        $this->assertEquals(2, $this->kalkulacka->add(1, 1));
        $this->assertEquals(1.42, $this->kalkulacka->add(3.14, -1.72), '', 0.001);
        $this->assertEquals(2/3, $this->kalkulacka->add(1/3, 1/3), '', 0.001);
    }
    
    public function testDeleni()
    {
        $this->assertEquals(2, $this->kalkulacka->divide(4, 2));
        $this->assertEquals(-1.8255813953488373, $this->kalkulacka->divide(3.14, -1.72), '', 0.001);
        $this->assertEquals(1, $this->kalkulacka->divide(1/3, 1/3));
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testDeleniVyjimka()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->kalkulacka->divide(2, 0);
    }
}