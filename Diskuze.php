<?php
class Diskuze 
{
    
    
   /** public function __construct($host, $uzivatel, $heslo, $databaze)
    {
       Databaze::pripoj($host, $uzivatel, $heslo, $databaze);
    } **/
    
    public function odesliData($jmeno, $zprava)
    {
        if ($jmeno != NULL && $zprava != NULL)
        {
        Databaze::dotaz
        ('INSERT INTO `diskuze` 
        (`id`, `uzivatel`, `zprava`, `datum`) 
        VALUES 
        (NULL, ?, ?, NULL)', array($jmeno, $zprava));
        header('Location:diskuze');
        exit;
        }
    }
    
    public function vratData()
    {
      //  $sql = ('SELECT `id`, `zprava`, `uzivatel`, `datum` FROM `diskuze` LIMIT ?');
      //  $number = 10;
        $data = Databaze::dotaz('SELECT `uzivatel`, `zprava`, `datum` FROM `diskuze` LIMIT 10');
        $diskuze = $data->fetchAll(PDO::FETCH_ASSOC); 
        return $diskuze;
    }
}

