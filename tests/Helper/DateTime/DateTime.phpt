<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class DateTimeTest extends BaseTestCase
{

    public function testBasicEN()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('en');
        $date->allowLeadingZero(false);

        Assert::equal('yesterday', $date->diffToText('23.08.2016'));
    }

    public function testBasicCZ()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('cs');

        Assert::equal('včera', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN2()
    {
    	$date = new \Galek\Helper\DateTime('21.08.2016');
        $date->setLanguage('en');
        $date->allowLeadingZero(false);

        Assert::equal('2 days ago', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN3()
    {
    	$date = new \Galek\Helper\DateTime('20.08.2016');
        $date->setLanguage('en');

        Assert::equal('03 days ago', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN4()
    {
    	$date = new \Galek\Helper\DateTime('19.08.2016');
        $date->setLanguage('en');
        $date->allowLeadingZero(false);

        Assert::equal('4 days ago', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN5()
    {
    	$date = new \Galek\Helper\DateTime('18.08.2016');
        $date->setLanguage('en');
        $date->allowLeadingZero(false);

        Assert::equal('5 days ago', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN6()
    {
    	$date = new \Galek\Helper\DateTime('24.08.2016');
        $date->setLanguage('en');

        Assert::equal('tomorrow', $date->diffToText('23.08.2016'));
    }

    public function testBasicEN7()
    {
    	$date = new \Galek\Helper\DateTime('25.08.2016');
        $date->setLanguage('en');

        Assert::equal('after 02 days', $date->diffToText('23.08.2016'));
    }

    public function testWithoutZeroes()
    {
    	$date = new \Galek\Helper\DateTime('06.02.2020 15:02:14');
        $date->allowLeadingZero(false);
        Assert::equal('after 3 years 5 months 14 days 15 hours 2 minutes 14 seconds', $date->diffToText('23.08.2016'));
    }

    public function testWithoutZeroesCZ()
    {
    	$date = new \Galek\Helper\DateTime('06.02.2020 15:02:14');
        $date->setLanguage('cs');
        Assert::equal('za 3 roky 5 měsíců 14 dnů 15 hodin 2 minuty 14 sekund', $date->diffToText('23.08.2016'));
    }

    public function testWithZeroes()
    {
    	$date = new \Galek\Helper\DateTime('06.02.2020 15:02:14');
        $date->allowLeadingZero();
        Assert::equal('after 03 years 05 months 14 days 15 hours 02 minutes 14 seconds', $date->diffToText('23.08.2016'));
    }

}

$testCase = new DateTimeTest();
$testCase->run();
