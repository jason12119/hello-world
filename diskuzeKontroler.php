<?php
class diskuzeKontroler extends Kontroler 
{
    public function zpracuj($parametry)
    {
        Databaze::pripoj('localhost', 'root', '', 'mvc_db_i');
        $diskuze = new Diskuze();
        $returnDiskuze = $diskuze->vratData();
        $diskuze->odesliData($_POST['jmeno'], $_POST['zprava']);
        // tady musi byt metoda z modelu ktera posla zpravu a jmeno do databaze
        $this->hlavicka['titulek'] = 'Diskuze';
        $this->pohled = 'diskuze';
        $this->data['diskuze'] = $returnDiskuze;
      //  $this->data['vardump'] = var_dump($returnDiskuze);
    }
    
 
}