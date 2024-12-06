<?php
include_once (__DIR__ . '/PlayerInterface.php');
include_once (__DIR__ . '/Player.php');

/**
 * Player One Class
 *
 */
class PlayerOne extends Player implements PlayerInterface {
    /**
     * play method
     *
     * @returns string
     */
    public function play() {
        // always choose rock
        // 0 = rock
        // 1 = paper
        // 2 = scissor
        // check Game.php for choices reference
        
        $choice = 0;
        return $this->choices[$choice];
    }
}
