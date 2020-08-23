<?php

use IW\Workshop\DateFormatter;

class DateFormatterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    
    protected function _before()
    {
        $this->dateFormatter = new DateFormatter();
        $dateTime    = new DateTime();
        $this->hour = $dateTime->format('G');
    }

    public function testIsRightPeriod()
    {
            if ($this->hour >= 0 && $this->hour < 6)
            {
                return $this->assertEquals("Night",  $this->dateFormatter->getPartOfDay());
            }

            if ($this->hour >= 6 && $this->hour < 12)
            {
                return $this->assertEquals("Morning",  $this->dateFormatter->getPartOfDay());
            }

            if ( $this->hour >= 12  && $this->hour < 18)
            {
                return $this->assertEquals("Afternoon",  $this->dateFormatter->getPartOfDay());
            }

            return $this->assertEquals("Evening",  $this->dateFormatter->getPartOfDay());

   
    }

    protected function _after()
    {
    }

}