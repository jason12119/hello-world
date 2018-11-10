
<?php
class Arena{
    
    protected $bojovnik1;    
    protected $bojovnik2;
    
    public function __construct($bojovnik1, $bojovnik2)
    {
        $this->bojovnik1 = $bojovnik1;
        $this->bojovnik2 = $bojovnik2;
    }
    
    public function uvedeni()
    {
        $uvedeni = array();
        $uvedeni[] = 'V dnesnim souboji se proti sobe postavi '.$this->bojovnik1->jmeno .' a '.$this->bojovnik2->jmeno.'.';
        $uvedeni[] = '<br>';
        $uvedeni[] = 'Necht souboj zapocne!';
        $uvedeni[] = '<br>';
        $uvedeni[] = '--------------------------------------------------------------------------------';
        $uvedeni[] = '<br>';
        return $uvedeni;
    }
    
    public function souboj()
    {
        $zpravySouboje = array();
        while ($this->bojovnik1->nazivu() && $this->bojovnik2->nazivu())
        {
            $this->bojovnik1->utoc($this->bojovnik2);
            $zpravySouboje[] = $this->bojovnik1->vratPosledniZpravu();
            
            $zpravySouboje[] =  $this->bojovnik2->vratPosledniZpravu();
            
           $zpravySouboje[] .= $this->bojovnik1;
           $zpravySouboje[] .= $this->bojovnik2;
            
            
            if ($this->bojovnik2->nazivu())
            {           
            $this->bojovnik2->utoc($this->bojovnik1);
            $zpravySouboje[] =  $this->bojovnik2->vratPosledniZpravu();           
            $zpravySouboje[] = $this->bojovnik1->vratPosledniZpravu();
            
            $zpravySouboje[] .= $this->bojovnik1;
          $zpravySouboje[] .= $this->bojovnik2;
            
            
            }
        }
        
        if ($this->bojovnik1->nazivu())
            $vitez = $this->bojovnik1->jmeno;
        else 
            $vitez = $this->bojovnik2->jmeno;
        
            $zpravySouboje[] = 'Souboj je u konce. Vitezem je '.$vitez.'.';
            return $zpravySouboje;
    }
    
}