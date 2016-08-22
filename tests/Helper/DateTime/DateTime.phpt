<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class DateTimeTest extends BaseTestCase
{

    public function testBasic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $testDate = $date;

        Assert::equal('2016', $date->year());
        Assert::equal('22.08.2016', $testDate->date());
        Assert::equal('22', $testDate->day());
        Assert::equal('dd', $date->diff('23.08.2016'));
    }

}

$testCase = new DateTimeTest();
$testCase->run();
