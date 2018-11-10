<?php
class SpravceNavstev
{
    public function zapocitej()
    {
        Databaze::dotaz('
            INSERT INTO `zobrazeni`
            (`ip`, `datum`)
            VALUES (?, ?)
        ', array($_SERVER['REMOTE_ADDR'], time()));
    }
    
    public function zobrazeniCelkem()
    {
        $vysledek = Databaze::dotaz('
            SELECT COUNT(*) AS `pocet`
            FROM `zobrazeni`
        ');
        $data = $vysledek->fetch();
        return $data['pocet'];
    }
    
    public function zobrazeniZa($dnu)
    {
        $vysledek = Databaze::dotaz('
            SELECT COUNT(*) AS `pocet`
            FROM `zobrazeni`
            WHERE `datum` > ?
        ', array(time() - $dnu * 86400));
        $data = $vysledek->fetch();
        return $data['pocet'];
    }
    
    public function uipCelkem()
    {
        $vysledek = Databaze::dotaz('
            SELECT COUNT(DISTINCT `ip`) AS `pocet`
            FROM `zobrazeni`
        ');
        $data = $vysledek->fetch();
        return $data['pocet'];
    }
    
    public function uipZa($dnu)
    {
        $vysledek = Databaze::dotaz('
            SELECT COUNT(DISTINCT `ip`) AS `pocet`
            FROM `zobrazeni`
            WHERE `datum` > ?
        ', array(time() - $dnu * 86400));
        $data = $vysledek->fetch();
        return $data['pocet'];
    }
    
    public function vypisStatistiky()
    {
        $zabalenaData = array();
        
        $zabalenaData[] =('<table>');
        $zabalenaData[] =('<tr>
                <td>Zobrazení celkem</td>
                <td>' . $this->zobrazeniCelkem() . '</td>
            </tr>');
        $zabalenaData[] =('<tr>
                <td>UIP celkem</td>
                <td>' . $this->uipCelkem() . '</td>
            </tr>');
        $zabalenaData[] =('<tr>
                <td>Zobrazení měsíc</td>
                <td>' . $this->zobrazeniZa(30) . '</td>
            </tr>');
        $zabalenaData[] =('<tr>
                <td>UIP mesíc</td>
                <td>' . $this->uipZa(30) . '</td>
            </tr>');
        $zabalenaData[] =('<tr>
                <td>Zobrazení týden</td>
                <td>' . $this->zobrazeniZa(7) . '</td>
            </tr>');
        $zabalenaData[] =('<tr>
                <td>UIP týden</td>
                <td>' . $this->uipZa(7) . '</td>
            </tr>');
        $zabalenaData[] =('</table>');
        return $zabalenaData;
    }
}