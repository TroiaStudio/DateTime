<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Galek\Helper;

/**
 * Description of DeviceDetect
 *
 * @author Jan
 */

class DateTime extends \DateTime
{
    public $year;
    public $month;
    public $day;
    public $hour;
    public $minute;
    public $second;

    public $longMonths = [1,3,5,7,8,10,12];
    public $shortMonths = [4,6,9,11];
    public $february = 2;

    const MINUTE = 60;
    const HOUR = 60 * self::MINUTE;
    const DAY = 24 * self::HOUR;
    const WEEK = 7 * self::DAY;


    public function __construct($time = 'now', $object = null)
    {
        parent::__construct($time, $object);
        $this->hour = $this->format('H');
        $this->minute = $this->format('i');
        $this->second = $this->format('s');
        $this->day = $this->format('d');
        $this->month = $this->format('m');
        $this->year = $this->format('Y');
    }

    public function diff($datetime2, $absolute = null)
    {
        if ($datetime2 instanceof DateTimeInterface) {

        } else {
            $datetime2 = new DateTime($datetime2);
        }
        $diff = parent::diff($datetime2, $absolute);

        return $diff->format('%y let %m měsíců %a dnů %h hodin %i minut %s sekund');
    }

    public function __toString()
    {
        return $this->format('d.m.Y H:i:s');
    }

    public function hour()
    {
        $this->hour = $this->format('H');
        return $this->hour;
    }

    public function minute()
    {
        $this->minute = $this->format('i');
        return $this->minute;
    }

    public function second()
    {
        $this->second = $this->format('s');
        return $this->second;
    }

    public function day()
    {
        $this->day = $this->format('d');
        return $this->day;
    }

    public function month()
    {
        $this->month = $this->format('m');
        return $this->month;
    }

    public function year()
    {
        $this->year = $this->format('Y');
        return $this->year;
    }

    public function date()
    {
        $this->year();
        $this->month();
        $this->day();
        $this->hour();
        $this->minute();
        $this->second();

        return $this->format('d.m.Y');
    }

}
