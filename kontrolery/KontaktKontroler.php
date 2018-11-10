<?php
class KontaktKontroler extends Kontroler
{
    public function zpracuj($parametry)
    {
        $this->hlavicka = array(
            'titulek' => 'Kontaktni formular',
            'klicova_slova' => 'kontakt, email, formular',
            'popis' => 'Kontaktni formular naseho webu'
        );
        
        if (isset($_POST["email"]))
        {
            if ($_POST['rok'] == date("Y"))
            {
                $odesilacEmailu = new OdesilacEmailu();
                $odesilacEmailu->odesli("abe219seznam.cz", "Email z localhostu", $_POST['zprava'], $_POST['email']);
            }
        }
        $this->pohled = 'kontakt';
    }
}