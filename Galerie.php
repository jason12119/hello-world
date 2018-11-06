<?php
class Galerie
{
    private $slozka;
    private $sloupcu;
    private $soubory = array();
    
    public function __construct($slozka, $sloupcu)
    {
        $this->slozka = $slozka;
        $this->sloupcu = $sloupcu;
    }
    
    public function nacti()
    {
        $slozka = dir($this->slozka);
        
        while($polozka = $slozka->read())
        {
            if (strpos($polozka, '_nahled.'))
            {
                $this->soubory[] = $polozka;
            }
        }
        $slozka->close();
    }
    
  /*  public function zabal()
    {
        $zabalenaData = array();
        $sloupec = 0;
        $iterace = 0;
        foreach ($this->soubory as $soubor)
            {
                $zabalenaData[$iterace]['nahledy'][] = $this->slozka .'/'. $soubor;
                $zabalenaData[$iterace]['obrazky'][] = $this->slozka .'/'. str_replace('_nahled.', '.', $soubor); 
             
             if($sloupec == $this->sloupcu)
             {
                 $iterace++;
                 $sloupec = 0;
             }
             $sloupec++;
            }
            return $zabalenaData;
        }
    */
        public function zabal()
        {
            $zabalenaData = array();
            $sloupec = 0;
            $iterace = 0;
            $zabalenaData['sloupcu'][0] = $this->sloupcu;
            
            foreach ($this->soubory as $soubor)
            {
                $zabalenaData['nahledy'][] = $this->slozka .'/'. $soubor;
                $zabalenaData['obrazky'][] = $this->slozka .'/'. str_replace('_nahled.', '.', $soubor);
                $zabalenaData['iterace'][0] = $iterace;               
                
                if($sloupec == $this->sloupcu)
                {
                    $iterace++;
                    $sloupec = 0;
                }
                $sloupec++;
            }
            return $zabalenaData;
        }
        
    }
