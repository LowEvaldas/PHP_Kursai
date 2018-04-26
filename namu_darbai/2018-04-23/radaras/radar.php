<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.23
 * Time: 19:08
 */

class Radar
{
    /**
     * @var DateTime
     */
    public $date;
    /**
     * @var string
     */
    public $number;
    /**
     * @var int
     */
    public $distance;
    /**
     * @var int
     */
    public $time;

    /**
     * Radar constructor.
     * @param DateTime $date
     * @param string $number
     * @param int $distance
     * @param int $time
     */
    public function __construct(DateTime $date, string $number, int $distance, int $time)
    {
        $this->date = $date;
        $this->distance = $distance;
        $this->number = $number;
        $this->time = $time;
    }

    /**
     * Gražina greitį km/h
     * @return float
     */
    public function greitis()
    {
        return round($this->distance/$this->time*3.6, 1);
    }

}