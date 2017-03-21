<?php
/**
 * Created by PhpStorm.
 * User: zsaki
 * Date: 2017-03-19
 * Time: 14:51
 */

namespace Gyvunas\Laukinis\Keturkojis;

use Gyvunas\Laukinis\Grupe;

class Kate
{
    private $rusis;
    private $savybes;
    private $grupe;

    /**
     * @return Grupe
     */
    public function getGrupe()
    {
        return $this->grupe;
    }

    /**
     * @param Grupe $grupe
     */
    public function setGrupe($grupe)
    {
        $this->grupe = $grupe;
    }

    public function __construct($rusis)
    {
        $this->rusis = $rusis;
        $this->savybes = [];
        //minimalus standartinis opbjektas clone metodui pademonstruoti
        $this->grupe = new Grupe();
    }

    function __destruct()
    {
        //cia tik destruktoriaus panaudojimo pavyzdys(demo).
        $this->rusis = null;
        $this->grupe = null;
    }

    public function __get($param)
    {
        if (array_key_exists($param, $this->savybes)) {
            return $this->savybes[$param];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->savybes[$name] = $value;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->savybes);
    }

    public function __unset($name)
    {
        unset($this->savybes[$name]);
    }

    public function __clone()
    {
        // kairej pusej naujas objektas - desineje klonuojamas objektas
        $this->grupe = clone $this->grupe;
    }

    public function __sleep()
    {
        //Metodas naudojamas pries serializacija, grazinamas masyvas
        return ["savybes", "rusis", "grupe"];
    }

    public function __wakeup()
    {
        $this->grupe = new Grupe();
    }

    public function __toString()
    {
        return " Laukine katė:" . $this->rusis . "savybių kiekis: " . count($this->savybes);
    }

    public function __debugInfo()
    {
        return ["rusis" => $this->rusis, "savybes" => $this->savybes, "savybiuKiekis" => count($this->savybes)];
    }

    public static function __set_state($an_array)
    {
        $obj = new Kate($an_array["rusis"]);
        foreach ($an_array["savybes"] as $name => $savybe) {
            $obj->$name = $savybe;
        }

        $obj->setGrupe($an_array['grupe']);

        return $obj;
    }

    function __call($name, $arguments)
    {
        if ($name == "garsas") {

            return "kate sako miau";
        }
        throw new \BadMethodCallException("Metodas nerastas");
    }

// metodas vykdomas nesukuriant objekto.
    public static function __callStatic($name, $arguments)
    {
        if ($name == "garsas") {

            return "kate sako miau";
        }
        throw new \BadMethodCallException("Metodas nerastas");
    }

    public function __invoke()
    {
        //naudoju, kai iskvieciu objekta kaip funkcija
        var_dump($this);
    }

}