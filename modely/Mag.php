<?php
class Mag extends Bojovnik
{
    public $mana;
    
    protected $maxMana;
    
    public function __construct($jmeno, $maxZivot, $utok, $obrana, $maxMana)
    {
        $this->jmeno = $jmeno;
        $this->zivot = $maxZivot;
        $this->maxZivot = $maxZivot;
        $this->utok = $utok;
        $this->obrana = $obrana;
        $this->mana = $maxMana;
        $this->maxMana = $maxMana;
    }
    
    public function utoc($souper)
    {
        if ($this->mana == $this->maxMana)
        {
            $uder = $this->utok*2;
            $uder = $uder + rand(1, 6);
            $souper->branSe($uder);
            $this->nastavZpravu("$this->jmeno útočí magií za $uder hp");
            $this->mana = 0;
        }
        else
        {
            $uder = $this->utok + rand(1, 6);
            $this->nastavZpravu("$this->jmeno útočí úderem za $uder hp");
            $souper->branSe($uder);
            $this->regenerujManu();
        }
    }
    
    public function regenerujManu()
    {
        
        $this->mana += $this->maxMana / 4;
        if ($this->mana > $this->maxMana)
            $this->mana = $this->maxMana;
    }
    
    protected function ukazatel($text, $sirka, $vyska, $hodnota, $maximum, $barva)
    {
        return '
        <div style="border: 1px solid; ' . $barva . '; width:' . ($sirka + 10) . 'px; height: ' . ($vyska + 10) . 'px;">
            <div style="background: ' . $barva . '; width:' .  round(($hodnota / $maximum) * $sirka) . 'px; height: ' . $vyska . 'px; color: white; padding: 5px;">' . htmlspecialchars($text) . '</div>
        </div>';
    }
    public function __toString()
    {
        return $this->ukazatel($this->jmeno, 100, 15, $this->zivot, $this->maxZivot, 'red') . $this->ukazatel('', 100, 15, $this->mana, $this->maxMana, 'blue');
    }
}