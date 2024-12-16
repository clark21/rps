<?php
include_once(__DIR__ . '/PlayerInterface.php');
include_once(__DIR__ . '/Game.php');

/**
 * Player parent class
 */
class Player implements PlayerInterface{
    // default player values
    protected $choices = [];
    protected $score = 0;
    protected $name = 'No Name';
    protected $hand = null;
    

    /**
     * constructor
     *
     * @param string $name
     * @return void
     */
    public function __construct(String $name, String $hand = null) {
        $this->name = $name;
        $this->hand = $hand;
        $this->choices = Game::getChoices();
        if ($this->hand && !in_array($this->hand, $this->choices)) {
            throw new \Exception(sprintf('Invalid hand value', $this->hand));
        }
        
    }

    public function play() {
        if ($this->hand) {
            return $this->hand;
        }

        return $this->choices[array_rand($this->choices)];
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
