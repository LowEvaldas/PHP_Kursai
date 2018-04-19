<?php
/**
 * Created by PhpStorm.
 * User: Vartotojas
 * Date: 2018.04.19
 * Time: 17:03
 */

include 'trimestras.php';

class Mokinys extends Trimestras
{
    public $vardas;
    public $pavarde;

    public function __construct(array $dalykai, string $vardas, string $pavarde )
    {
        parent::__construct($dalykai);
        $this->vardas = $vardas;
        $this->pavarde = $pavarde;
    }

    // Sudedam atskirų dalykų pažymius į masyvus su raktu-dalyko pavadinimu
    public function sudeti()
    {
        $dalykupaz = [];
        for ($i=0; $i<count($this->dalykai); $i++)
        {
            foreach ($this->dalykai as $key=>$dalykas){

                if (isset($dalykupaz)){
                    $dalykupaz[$key] += $dalykas[$i];
                    var_dump($dalykupaz[$key]);
                }
            }
        }


        $this->vidurkis($dalykupaz);
    }

    /*
     * Vieno dalyko vidurkio skaičiavimas
     */
    public function vidurkis(array $pazymiai)
    {
        $vidurkiai = [];
        foreach ($pazymiai as $key => $pazsum){
                $vidurkiai[] = $pazsum / count($this->dalykai[$key]);
        }
        $this->rikiuoti($vidurkiai);
    }

    public function rikiuoti(array $v){
        sort($v);
        var_dump ($v);
    }
}