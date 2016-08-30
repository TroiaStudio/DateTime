<?php

/**
 * @package Galek\Helper
 * @subpackage DateTime
 *
 * @copyright Copyright (C) 2016 Jan Galek
 * @license GPL-3 https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @description Extensions
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Galek\Helper;

use Galek\Helper\DateTime\DateTimeLanguages;

/**
 * Description of DateTime
 *
 * @author Jan Galek
 */

class DateTime extends \DateTime
{
    const TIME_NOW = 0;
    const TIME_BEFORE = 1;
    const TIME_AFTER = 2;
    const ALLOW_SECONDS = true;

    public $language;
    public $t;

    private $tomorrowOrYesterday = false;
    private $allow_zero_before = true;
    private $onlyOne = true;

    public function __construct($time = 'now', $object = null)
    {
        if ($object === null) {
            parent::__construct($time);
        } else {
            parent::__construct($time, $object);
        }
        $this->setLanguage('en');
    }

    public function setLanguage($lang = 'en')
    {
        ($lang == 'cs' ? $this->allowLeadingZero(0) : '');
        $language = $this->load($lang);
        $this->language = $language;
        return $this;
    }

    public function allowLeadingZero($value = true)
    {
        $this->allow_zero_before = $value;
    }

    public function diffToText($datetime2 = null, $absolute = null)
    {
        if ($datetime2 !== null) {
            $datetime2 = new DateTime($datetime2);
        }
        $diff = parent::diff($datetime2, $absolute);

        $date1 = new \DateTime($this->format('Y-m-d H:i:s'));
        $date2 = new \DateTime($datetime2->format('Y-m-d H:i:s'));

        $resultDiff = $this->testDiffrent($date1, $date2);
        $time = $resultDiff['time'];
        $text_before = $resultDiff['before'];
        $text_after = $resultDiff['after'];

        if ($time === 0) {
            return $text_before;
        }

        $y = $this->textSelector($time, 'years', 'y', $diff->y);
        $m = $this->textSelector($time, 'months', 'm', $diff->m);
        $d = $this->textSelector($time, 'days', 'd', $diff->d, ($diff->m == 0 && $diff->y == 0));
        $h = $this->textSelector($time, 'hours', 'h', $diff->h);
        $i = $this->textSelector($time, 'minutes', 'i', $diff->i);
        $s = $this->textSelector($time, 'seconds', 's', $diff->s);

        $test = $this->tomorrowOrYesterday;
        $this->tomorrowOrYesterday = false;

        if ($test && $diff->m == 0 && $diff->y == 0) {
            $text_before = '';
            $text_after = '';
            $y = trim($y);
            $m = trim($m);
            $d = trim($d);
            $h = trim($h);
            $i = trim($i);
            $s = trim($s);
            $result = $d;
        } else {
            $result = $text_before.$y.$m.$d.$h.$i.$s.$text_after;
        }

        $result = preg_replace('!\s+!', ' ', trim($result));

        return $diff->format($result);
    }

    private function load($lang)
    {
        $file = __DIR__.'/DateTime/languages/'.$lang.'.json';
        return json_decode(file_get_contents($file));
    }

    private function testDiffrent($time1, $time2)
    {
        if ($time1 > $time2) {
            $time = self::TIME_AFTER;
            $text_before = $this->language->after->verb.' ';
            $text_after = '';
        } elseif ($time1 < $time2) {
            $time = self::TIME_BEFORE;
            $text_before = ($this->language->before_rule == 'before' ? $this->language->before->verb.' ' : '');
            $text_after =  ($this->language->before_rule != 'before' ? ' '.$this->language->before->verb : '');
        } else {
            $time = self::TIME_NOW;
            $text_before = $this->language->now;
            $text_after = '';
        }

        return array('time' => $time, 'before' => $text_before, 'after' => $text_after);
    }

    private function textSelector($time, $type = 'minutes', $pre = 'y', $number = 0, $change = false)
    {
        $result = '';
        if ($this->allow_zero_before) {
            $pre = strtoupper($pre);
        }

        if ($time === self::TIME_BEFORE) {
            $selector = $this->language->before;
            $newSelector = $selector->$type->one;
            if ($number == 1) {
                if ($type == 'days') {
                    $this->tomorrowOrYesterday = true;
                    $newSelector = ($change ? $this->language->yesterday : "%$pre ".$selector->$type->one);
                }
                $result = ($type != 'days' ? $this->language->one_rule.' ' : '').$newSelector;
            } elseif ($number > 0) {
                $result = "%$pre ".$selector->$type->two;
            }
        } else {
            $selector = $this->language->after;
            $newSelector = $selector->$type->one;
            if ($number == 1) {
                if ($type == 'days') {
                    $this->tomorrowOrYesterday = true;
                    $newSelector = ($change ? $this->language->tomorrow : "%$pre ".$selector->$type->one);
                }
                $result = ($type != 'days' ? $this->language->one_rule.' ' : '').$newSelector;
            } elseif ($number > 1 && $number <= 4) {
                $result = "%$pre ".$selector->$type->two;
            } elseif ($number > 0) {
                $result = "%$pre ".$selector->$type->five;
            }
        }
        return $result.' ';
    }
}
