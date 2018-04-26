<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.19
 * Time: 17:03
 */

include 'trimestras.php';

/**
 * Class Mokinys
 */
class Mokinys extends Trimestras
{
    /**
     * @var string
     */
    public $vardas;
    /**
     * @var string
     */
    public $pavarde;

    /**
     * @var
     */
    public $data;

    /**
     * Mokinys constructor.
     * @param array $dalykai
     * @param string $vardas
     * @param string $pavarde
     */
    public function __construct(array $dalykai, string $vardas, string $pavarde, DateTime $data )
    {
        parent::__construct($dalykai);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
        $this->data = $data;
    }

    /**
     * Skaičiuoja pažymių vidurkį
     * @return float|int
     */
    public function vidurkis()
    {
        return array_sum($this->dalykai) / count($this->dalykai);
    }

    /**
     * Skaičiuoja kiek mokiniui metų
     * @return int
     */
    public function metai()
    {
        return date_diff(new DateTime('now'),$this->data)->y;
    }


}