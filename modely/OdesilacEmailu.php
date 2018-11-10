<?php
class OdesilacEmailu
{
    public function odesli($komu, $predmet, $zprava, $od)
    {
        $hlavicka = "From: " . $od;
        $hlavicka .= "\nMIME-Version: 1.0\n";
        $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
        return mb_send_mail($komu, $predmet, $zprava, $hlavicka);
    }
}