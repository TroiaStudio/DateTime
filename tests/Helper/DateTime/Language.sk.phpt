<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class LanguageCsTest extends BaseTestCase
{

    public function testBasic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('sk');
        $testDate = $date;

        Assert::equal('práve teraz', $date->language->now);
        Assert::equal('sekunda', $date->language->second);
        Assert::equal('sekundy', $date->language->seconds);
        Assert::equal('minúta', $date->language->minute);
        Assert::equal('minúty', $date->language->minutes);
        Assert::equal('hodina', $date->language->hour);
        Assert::equal('hodiny', $date->language->hours);
        Assert::equal('deň', $date->language->day);
        Assert::equal('dni', $date->language->days);
        Assert::equal('mesiac', $date->language->month);
        Assert::equal('mesiaca', $date->language->months);
        Assert::equal('rok', $date->language->year);
        Assert::equal('roky', $date->language->years);
        Assert::equal('včera', $date->language->yesterday);
        Assert::equal('zajtra', $date->language->tomorrow);

        Assert::equal('', $date->language->one_rule);
        Assert::equal('before', $date->language->before_rule);
        Assert::equal('pred', $date->language->before->verb);
        Assert::equal('za', $date->language->after->verb);

        Assert::equal('sekundou', $date->language->before->seconds->one);
        Assert::equal('sekundami', $date->language->before->seconds->two);
        Assert::equal('minútou', $date->language->before->minutes->one);
        Assert::equal('minútami', $date->language->before->minutes->two);
        Assert::equal('hodinou', $date->language->before->hours->one);
        Assert::equal('hodinami', $date->language->before->hours->two);
        Assert::equal('dňom', $date->language->before->days->one);
        Assert::equal('dni', $date->language->before->days->two);
        Assert::equal('mesiacom', $date->language->before->months->one);
        Assert::equal('mesiaci', $date->language->before->months->two);
        Assert::equal('rokom', $date->language->before->years->one);
        Assert::equal('rokmi', $date->language->before->years->two);

        Assert::equal('sekundu', $date->language->after->seconds->one);
        Assert::equal('sekundy', $date->language->after->seconds->two);
        Assert::equal('sekúnd', $date->language->after->seconds->five);
        Assert::equal('minútu', $date->language->after->minutes->one);
        Assert::equal('minúty', $date->language->after->minutes->two);
        Assert::equal('minút', $date->language->after->minutes->five);
        Assert::equal('hodinu', $date->language->after->hours->one);
        Assert::equal('hodiny', $date->language->after->hours->two);
        Assert::equal('hodín', $date->language->after->hours->five);
        Assert::equal('deň', $date->language->after->days->one);
        Assert::equal('dni', $date->language->after->days->two);
        Assert::equal('dní', $date->language->after->days->five);
        Assert::equal('mesiac', $date->language->after->months->one);
        Assert::equal('mesiaca', $date->language->after->months->two);
        Assert::equal('mesiacov', $date->language->after->months->five);
        Assert::equal('rok', $date->language->after->years->one);
        Assert::equal('roky', $date->language->after->years->two);
        Assert::equal('let', $date->language->after->years->five);
    }

}

$testCase = new LanguageCsTest();
$testCase->run();
