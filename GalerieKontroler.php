<?php
class GalerieKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $Galerie = new Galerie('pics', 5);
        $Galerie->nacti();
        $vystup = $Galerie->zabal();
        
       $this->hlavicka['titulek'] = 'Galerie';
       $this->pohled = 'galerie';
       $this->data['galerie'] = $vystup;
    }
    
}