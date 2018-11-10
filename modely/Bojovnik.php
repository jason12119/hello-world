<?php

/*  _____ _______         _                      _
 * |_   _|__   __|       | |                    | |
 *   | |    | |_ __   ___| |___      _____  _ __| | __  ___ ____
 *   | |    | | '_ \ / _ \ __\ \ /\ / / _ \| '__| |/ / / __|_  /
 *  _| |_   | | | | |  __/ |_ \ V  V / (_) | |  |   < | (__ / /
 * |_____|  |_|_| |_|\___|\__| \_/\_/ \___/|_|  |_|\_(_)___/___|
 *
 * IT ZPRAVODAJSTVÍ  <>  PROGRAMOVÁNÍ  <>  HW A SW  <>  KOMUNITA
 *
 * Tento zdrojový kód je součástí výukových seriálů na
 * IT sociální síti WWW.ITNETWORK.CZ
 *
 * Kód spadá pod licenci prémiového obsahu a vznikl díky podpoře
 * našich členů. Je určen pouze pro osobní užití a nesmí být šířen.
 */

/**
 * Reprezentuje bojovníka do arény
 */
class Bojovnik {
    /**
     * @var string Jméno bojovníka
     */
    public $jmeno;
    /**
     * @var int Život v HP
     */
    protected $zivot;
    /**
     * @var int Maximální život
     */
    protected $maxZivot;
    /**
     * @var int Útok v HP
     */
    protected $utok;
    /**
     * @var int Obrana v HP
     */
    protected $obrana;
    /**
     * @var string Poslední zpráva
     */
    protected $zprava = '';

    /**
     * Inicializuje instanci
     * @param string $jmeno Jméno bojovníka
     * @param int $maxZivot Maximální život bojovníka
     * @param int $utok Útok bojovníka
     * @param int $obrana Obrana bojovníka
     */
    public function __construct($jmeno, $maxZivot, $utok, $obrana)
    {
        $this->jmeno = $jmeno;
        $this->zivot = $maxZivot;
        $this->maxZivot = $maxZivot;
        $this->utok = $utok;
        $this->obrana = $obrana;
    }

    /**
     * Provede útok na soupeře
     * @param Bojovnik $souper Soupeř bojovník
     */
    public function utoc($souper)
    {
        $uder = $this->utok + rand(1, 6);
        $this->nastavZpravu("$this->jmeno útočí s úderem za $uder hp");
        $souper->branSe($uder);
    }

    /**
     *  Brání se proti úderu soupeře
     * @param int $uder Úder soupeře v HP
     */
    public function branSe($uder)
    {
        $zraneni = $uder - ($this->obrana + rand(1, 6));
        if ($zraneni > 0)
        {
            $this->zivot -= $zraneni;
            $this->zprava = "$this->jmeno utrpěl poškození $zraneni hp";
            if ($this->zivot <= 0)
            {
                $this->zivot = 0;
                $this->zprava .= " a zemřel";
            }
        } else
            $this->zprava = "$this->jmeno odrazil útok";
    }

    /**
     * Zjistí, zda je bojovník naživu
     * @return True, pokud je naživu, jinak false
     */
    public function nazivu()
    {
        return ($this->zivot > 0);
    }

    /**
     * Nastaví zprávu o útoku či obraně, kterou může objekt, který bojovníka obsluhuje, vypsat
     * @param $zprava string Zpráva o posledním útoku či obraně
     */
    protected function nastavZpravu($zprava)
    {
        $this->zprava = $zprava;
    }

    /**
     * Vrátí poslední zprávu, kterou může objekt, který bojovníka obsluhuje, vypsat
     * @return string Zpráva o posledním útoku či obraně
     */
    public function vratPosledniZpravu()
    {
        return $this->zprava;
    }

    /**
     * Vrátí HTML kód grafického ukazatele
     * @param $text string Text na ukazateli
     * @param $sirka int Šířka ukazatele v pixelech
     * @param $vyska int Výška ukazatele v pixelech
     * @param $hodnota int Hodnota, kteoru ukazatel ukazuje
     * @param $maximum int Maximální hodnota
     * @param $barva string Barva ukazatele
     * @return string HTML kód s hotovým ukazatelem
     */
    protected function ukazatel($text, $sirka, $vyska, $hodnota, $maximum, $barva)
    {
        return '
        <div style="border: 1px solid ' . $barva . '; width:' . ($sirka + 10) . 'px; height: ' . ($vyska + 10) . 'px;">
            <div style="background: ' . $barva . '; width:' .  round(($hodnota / $maximum) * $sirka) . 'px; height: ' . $vyska . 'px; color: white; padding: 5px;">' . htmlspecialchars($text) . '</div>
        </div>';
    }

    /**
     * Vrátí HTML reprezentaci bojovníka
     * @return string Řetězec s grafickou reprezentací života
     */
    public function __toString()
    {
        return $this->ukazatel($this->jmeno, 100, 15, $this->zivot, $this->maxZivot, 'red');
    }
}