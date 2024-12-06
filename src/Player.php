<?php
include_once(__DIR__ . '/Game.php');

/**
 * Player parent class
 */
class Player {
    // default player values
    protected $choices;
    protected $score = 0;
    protected $name = 'No Name';

    /**
     * constructor
     *
     * @param string $name
     * @return void
     */
    public function __construct($name) {
        $this->choices = Game::getChoices();
        $this->name = $name;
    }

    /**
     * get player name
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /*
     * increments score
     *
     * @return $this
     */
    public function addScore() {
        $this->score++;
        return $this;
    }

    /**
     * get player score
     *
     * @returns integer
     */
    public function getScore() {
        return $this->score;
    }
}
