<?php

require_once("../lib/ContractRummy.php");

$game = new ContractRummy();
$game->shuffle();

echo "<pre>";
echo "Total cards in deck: " . $game->total() . "\n";
print_r($game->deal());
echo "Total cards in deck: " . $game->total();
echo "</pre>";

?>
