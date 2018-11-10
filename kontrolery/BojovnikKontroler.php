<?php
class BojovnikKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        
        
        $this->hlavicka['titulek'] = 'Bojovnik';
        $this->pohled = 'bojovnik';
     //   $this->data['galerie'] = $vystup;
    }
}