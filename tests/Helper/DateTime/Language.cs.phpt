<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class LanguageCsTest extends BaseTestCase
{

    public function testBasic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('cs');
        $testDate = $date;

        Assert::equal('právě teď', $date->language->now);
        Assert::equal('vteřina', $date->language->second);
        Assert::equal('vteřiny', $date->language->seconds);
        Assert::equal('minuta', $date->language->minute);
        Assert::equal('minuty', $date->language->minutes);
        Assert::equal('hodina', $date->language->hour);
        Assert::equal('hodiny', $date->language->hours);
        Assert::equal('den', $date->language->day);
        Assert::equal('dny', $date->language->days);
        Assert::equal('měsíc', $date->language->month);
        Assert::equal('měsíce', $date->language->months);
        Assert::equal('rok', $date->language->year);
        Assert::equal('roky', $date->language->years);
        Assert::equal('včera', $date->language->yesterday);
        Assert::equal('zítra', $date->language->tomorrow);

        Assert::equal('', $date->language->one_rule);
        Assert::equal('before', $date->language->before_rule);
        Assert::equal('před', $date->language->before->verb);
        Assert::equal('za', $date->language->after->verb);

        Assert::equal('sekundou', $date->language->before->seconds->one);
        Assert::equal('sekundami', $date->language->before->seconds->two);
        Assert::equal('minutou', $date->language->before->minutes->one);
        Assert::equal('minutami', $date->language->before->minutes->two);
        Assert::equal('hodinou', $date->language->before->hours->one);
        Assert::equal('hodinami', $date->language->before->hours->two);
        Assert::equal('dnem', $date->language->before->days->one);
        Assert::equal('dny', $date->language->before->days->two);
        Assert::equal('měsícem', $date->language->before->months->one);
        Assert::equal('měsíci', $date->language->before->months->two);
        Assert::equal('rokem', $date->language->before->years->one);
        Assert::equal('lety', $date->language->before->years->two);

        Assert::equal('sekundu', $date->language->after->seconds->one);
        Assert::equal('sekundy', $date->language->after->seconds->two);
        Assert::equal('sekund', $date->language->after->seconds->five);
        Assert::equal('minutu', $date->language->after->minutes->one);
        Assert::equal('minuty', $date->language->after->minutes->two);
        Assert::equal('minut', $date->language->after->minutes->five);
        Assert::equal('hodinu', $date->language->after->hours->one);
        Assert::equal('hodiny', $date->language->after->hours->two);
        Assert::equal('hodin', $date->language->after->hours->five);
        Assert::equal('den', $date->language->after->days->one);
        Assert::equal('dny', $date->language->after->days->two);
        Assert::equal('dnů', $date->language->after->days->five);
        Assert::equal('měsíc', $date->language->after->months->one);
        Assert::equal('měsíce', $date->language->after->months->two);
        Assert::equal('měsíců', $date->language->after->months->five);
        Assert::equal('rok', $date->language->after->years->one);
        Assert::equal('roky', $date->language->after->years->two);
        Assert::equal('let', $date->language->after->years->five);
    }

}

$testCase = new LanguageCsTest();
$testCase->run();
