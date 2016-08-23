<?php

require_once __DIR__ . '/BaseTestCase.php';

use Tester\Assert;
use \Galek\Helper\DateTime;

class LanguageCsTest extends BaseTestCase
{

    public function testBasic()
    {
    	$date = new \Galek\Helper\DateTime('22.08.2016');
        $date->setLanguage('ru');
        $testDate = $date;

        Assert::equal('сейчас', $date->language->now);
        Assert::equal('второй', $date->language->second);
        Assert::equal('секунды', $date->language->seconds);
        Assert::equal('Минутка', $date->language->minute);
        Assert::equal('минута', $date->language->minutes);
        Assert::equal('час', $date->language->hour);
        Assert::equal('Часы', $date->language->hours);
        Assert::equal('день', $date->language->day);
        Assert::equal('Дни', $date->language->days);
        Assert::equal('месяц', $date->language->month);
        Assert::equal('месяц', $date->language->months);
        Assert::equal('год', $date->language->year);
        Assert::equal('лет', $date->language->years);
        Assert::equal('вчера', $date->language->yesterday);
        Assert::equal('Завтра', $date->language->tomorrow);

        Assert::equal('', $date->language->one_rule);
        Assert::equal('before', $date->language->before_rule);
        Assert::equal('перед', $date->language->before->verb);
        Assert::equal('за', $date->language->after->verb);

        Assert::equal('второй', $date->language->before->seconds->one);
        Assert::equal('секунды', $date->language->before->seconds->two);
        Assert::equal('минута', $date->language->before->minutes->one);
        Assert::equal('минут', $date->language->before->minutes->two);
        Assert::equal('час', $date->language->before->hours->one);
        Assert::equal('Часы', $date->language->before->hours->two);
        Assert::equal('день', $date->language->before->days->one);
        Assert::equal('Дни', $date->language->before->days->two);
        Assert::equal('месяц', $date->language->before->months->one);
        Assert::equal('месяц', $date->language->before->months->two);
        Assert::equal('год', $date->language->before->years->one);
        Assert::equal('Полет', $date->language->before->years->two);

        Assert::equal('второй', $date->language->after->seconds->one);
        Assert::equal('секунды', $date->language->after->seconds->two);
        Assert::equal('секунды', $date->language->after->seconds->five);
        Assert::equal('минута', $date->language->after->minutes->one);
        Assert::equal('минута', $date->language->after->minutes->two);
        Assert::equal('минута', $date->language->after->minutes->five);
        Assert::equal('час', $date->language->after->hours->one);
        Assert::equal('Часы', $date->language->after->hours->two);
        Assert::equal('час', $date->language->after->hours->five);
        Assert::equal('день', $date->language->after->days->one);
        Assert::equal('Дни', $date->language->after->days->two);
        Assert::equal('Дни', $date->language->after->days->five);
        Assert::equal('месяц', $date->language->after->months->one);
        Assert::equal('месяц', $date->language->after->months->two);
        Assert::equal('месяц', $date->language->after->months->five);
        Assert::equal('год', $date->language->after->years->one);
        Assert::equal('лет', $date->language->after->years->two);
        Assert::equal('лет', $date->language->after->years->five);
    }

}

$testCase = new LanguageCsTest();
$testCase->run();
