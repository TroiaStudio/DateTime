<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class LanguageCsTest extends BaseTestCase
{

    public function testBasic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('en');
        $testDate = $date;

        Assert::equal('just now', $date->language->now);
        Assert::equal('second', $date->language->second);
        Assert::equal('seconds', $date->language->seconds);
        Assert::equal('minute', $date->language->minute);
        Assert::equal('minutes', $date->language->minutes);
        Assert::equal('hour', $date->language->hour);
        Assert::equal('hours', $date->language->hours);
        Assert::equal('day', $date->language->day);
        Assert::equal('days', $date->language->days);
        Assert::equal('month', $date->language->month);
        Assert::equal('months', $date->language->months);
        Assert::equal('year', $date->language->year);
        Assert::equal('years', $date->language->years);
        Assert::equal('yesterday', $date->language->yesterday);
        Assert::equal('tomorrow', $date->language->tomorrow);

        Assert::equal('a', $date->language->one_rule);
        Assert::equal('after', $date->language->before_rule);
        Assert::equal('ago', $date->language->before->verb);
        Assert::equal('after', $date->language->after->verb);

        Assert::equal('second', $date->language->before->seconds->one);
        Assert::equal('seconds', $date->language->before->seconds->two);
        Assert::equal('minute', $date->language->before->minutes->one);
        Assert::equal('minutes', $date->language->before->minutes->two);
        Assert::equal('hour', $date->language->before->hours->one);
        Assert::equal('hours', $date->language->before->hours->two);
        Assert::equal('day', $date->language->before->days->one);
        Assert::equal('days', $date->language->before->days->two);
        Assert::equal('month', $date->language->before->months->one);
        Assert::equal('months', $date->language->before->months->two);
        Assert::equal('year', $date->language->before->years->one);
        Assert::equal('years', $date->language->before->years->two);

        Assert::equal('second', $date->language->after->seconds->one);
        Assert::equal('seconds', $date->language->after->seconds->two);
        Assert::equal('seconds', $date->language->after->seconds->five);
        Assert::equal('minute', $date->language->after->minutes->one);
        Assert::equal('minutes', $date->language->after->minutes->two);
        Assert::equal('minutes', $date->language->after->minutes->five);
        Assert::equal('hour', $date->language->after->hours->one);
        Assert::equal('hours', $date->language->after->hours->two);
        Assert::equal('hours', $date->language->after->hours->five);
        Assert::equal('day', $date->language->after->days->one);
        Assert::equal('days', $date->language->after->days->two);
        Assert::equal('days', $date->language->after->days->five);
        Assert::equal('month', $date->language->after->months->one);
        Assert::equal('months', $date->language->after->months->two);
        Assert::equal('months', $date->language->after->months->five);
        Assert::equal('year', $date->language->after->years->one);
        Assert::equal('years', $date->language->after->years->two);
        Assert::equal('years', $date->language->after->years->five);
    }

}

$testCase = new LanguageCsTest();
$testCase->run();
