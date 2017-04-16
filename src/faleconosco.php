<?php


$guzzle = new \Guzzle\Http\Client();
$guzzle->getAllEvents();


$client = new SON\Teste\Model\Client();
$client->name = "Autoload PSR-4 está funcionando!";

echo $client->name;
?>
Meu fale conosco