<?php

require_once("../lib/ContractRummy.php");

$game = new ContractRummy();

$game->shuffle();

print_r($game->deal());

?>
