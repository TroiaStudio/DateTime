<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class Test
{

    public function basic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        //var_dump($date->diff('23.08.2016'));
        return $date->diff('23.08.2016');
    }

    public function basic2()
    {
    	$date = new \Galek\Helper\DateTime('06.02.2020 15:02:14');
        return $date->diff('23.08.2016');
    }

}

$testCase = new Test();
echo $testCase->basic();
echo $testCase->basic2();
