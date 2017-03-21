<?php
/**
 * Created by PhpStorm.
 * User: zsaki
 * Date: 2017-03-21
 * Time: 00:18
 */

namespace Gyvunas\Laukinis;

class Grupe
{
    public $pavadinimas;

    static function __set_state($an_array)
    {
        $obj = new Grupe();
        $obj->pavadinimas = $an_array['pavadinimas'];

        return $obj;
    }
}