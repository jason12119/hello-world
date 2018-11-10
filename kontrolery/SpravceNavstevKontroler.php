<?php
class SpravceNavstevKontroler extends Kontroler
{
    
public function zpracuj($parametry)
{
    Databaze::pripoj('localhost', 'root', '', 'mvc_db');
    $spravceNavstev = new SpravceNavstev();
    $spravceNavstev->zapocitej();
    $navstevy = $spravceNavstev->vypisStatistiky();
    $this->hlavicka['titulek'] = 'Pocitadlo Navstev';
    $this->pohled = 'pocitadloNavstev';
    $this->data['navstevy'] = $navstevy;
}

}