<?php
include_once (__DIR__ . '/Player.php');
include_once (__DIR__ . '/PlayerInterface.php');

/**
 * Player Two Class
 *
 */
class PlayerTwo extends Player implements PlayerInterface {
    /**
     * play method
     *
     * @returns string
     */
    public function play() {
        
        // 0 = rock
        // 1 = paper
        // 2 = scissor
        // check Game.php for choices reference
        
        $choice = rand(0, 2); // random choice
        
        return $this->choices[$choice];
    }
}
