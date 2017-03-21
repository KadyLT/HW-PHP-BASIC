<?php
/**
 * Created by PhpStorm.
 * User: zsaki
 * Date: 2017-03-19
 * Time: 14:36
 */

use Gyvunas\Laukinis\Keturkojis\Kate;

require_once __DIR__ . '/vendor/autoload.php';


$kate = new Kate("tigras"); // kontruktorius
$kate->svoris = 400; // __set
$kate->amzius = 10; //__set

$katesGarsas = $kate->garsas(); //__call method

$katesKlasesGarsas = Kate::garsas(); //__callStatic

$katesSvoris = $kate->svoris; //__get

if (isset($kate->amzius)) { //__isset
    unset($kate->amzius); //__unset
}

$serializuotas = serialize($kate); // __sleep

$kate2 = unserialize($serializuotas); //__wakeup

$kateKaipString = (string)$kate; // __toString

$kate3 = clone $kate; // __clone

var_dump($kate); // __debugInfo

$kate(); //__invoke

eval('$kate4 = ' . var_export($kate, true) . ';');
