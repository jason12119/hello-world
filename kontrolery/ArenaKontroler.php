<?php

class ArenaKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $bojovnik1 = new Bojovnik('Aragorn', 30, 3, 2);
        $bojovnik2 = new Mag('Gandalf', 27, 3, 2, 4);
        $arena = new Arena($bojovnik1, $bojovnik2);
        $uvedeni = $arena->uvedeni();
        $souboj = $arena->souboj();
       
        
        $this->hlavicka['titulek'] = 'Arena';
        $this->pohled = 'arena';
        $this->data['uvedeni'] = $uvedeni;
        $this->data['souboj'] = $souboj;        
    }
}