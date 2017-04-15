<?php

/*
$guzzle = new \Guzzle\Guzzle();
$guzzle->reset();
*/

$client = new SON\Teste\Model\Client();
$client->name = "Autoload PSR-4 está funcionando!";

echo $client->name;
?>
Meu fale conosco