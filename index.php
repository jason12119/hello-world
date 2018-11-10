<?php

// Nastavení interního kódování pro funkce pro práci s řetězci
mb_internal_encoding("UTF-8");

// Callback pro automatické načítání tříd controllerů a modelů
function autoloadFunkce($trida)
{
    // Končí název třídy řetězcem "Kontroler" ?
    if (preg_match('/Kontroler$/', $trida))
        require("kontrolery/" . $trida . ".php");
        else
            require("modely/" . $trida . ".php");
}

// Registrace callbacku (Pod starým PHP 5.2 je nutné nahradit fcí __autoload())
spl_autoload_register("autoloadFunkce");

// Vytvoření routeru a zpracování parametrů od uživatele z URL
$smerovac = new SmerovacKontroler();
$smerovac->zpracuj(array($_SERVER['REQUEST_URI']));
$smerovac->vypisPohled();