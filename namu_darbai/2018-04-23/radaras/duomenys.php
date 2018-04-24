<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.23
 * Time: 19:09
 */

include 'radar.php';

$masinos = [
    new Radar(new DateTime('2014-05-05 15:42:00'),'fho553', 1000,100  ),
    new Radar(new DateTime('2014-05-02 05:42:00'),'foo553', 3500,420  ),
    new Radar(new DateTime('2010-05-05 15:42:00'),'hho553', 4500,510  ),
    new Radar(new DateTime('2004-02-05 15:42:00'),'pho553', 5500,220  ),
];