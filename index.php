<?php

include_once (__DIR__ . '/src/Game.php');

$player1 = new Player('Clark', 'rock'); // uses rock only
$player2 = new Player('Charles'); // uses rock, paper and scissor

$game = new Game();

$game->addPlayer($player1);
$game->addPlayer($player2);

$rounds = 100;
$game->start($rounds);

// display result
echo "===========================================================\n";
echo sprintf("%s scores %s in %s rounds\n", ucwords($player1->getName()), $player1->getScore(), $rounds);
echo sprintf("%s scores %s in %s rounds\n", ucwords($player2->getName()), $player2->getScore(), $rounds);
echo sprintf("This game resulted in %s draw(s) within %s rounds\n", $game->getDrawResult(), $rounds);
echo "===========================================================\n\n";

