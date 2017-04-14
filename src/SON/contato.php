<?php

$guzzle = new \Guzzle\Guzzle();
$guzzle->reset();

$client = new SON\Model\Client();
$client->name = "Autoload PSR-0 está funcionando!";

echo $client->name;

?>

Meu fale conosco